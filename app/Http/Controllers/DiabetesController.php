<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diabetes;
use App\Services\DiabetesService;
use Phpml\Classification\DecisionTree;
use Phpml\Dataset\CsvDataset;
use Phpml\Metric\Accuracy;
use Phpml\ModelManager;
use Phpml\CrossValidation\StratifiedRandomSplit;



class DiabetesController extends Controller
{
    public function index()
    {
        return view('diabetes');
    }

    
    public function predict(Request $request)
    {
        // Retrieve user input from request
        $input = [
            (float)$request->input('pregnancies'),
            (float)$request->input('glucose'),
            (float)$request->input('blood_pressure'),
            (float)$request->input('skin_thickness'),
            (float)$request->input('insulin'),
            (float)$request->input('BMI'),
            (float)$request->input('diabetes_pedigree_function'),
            (float)$request->input('age'),
        ];

        // Load Pima Indian Diabetes dataset
        $dataset = new CsvDataset(storage_path('app/diabetes.csv'), 8, true);

        // Split dataset into training and testing sets
        $split = new StratifiedRandomSplit($dataset, 0.2);
        $trainingSet = $split->getTrainSamples();
        $trainingLabels = $split->getTrainLabels();
        $testingSet = $split->getTestSamples();
        $testingLabels = $split->getTestLabels();

        // Train the CART model on the training set
       
        $classifier = new DecisionTree; 
        $classifier->train($trainingSet, $trainingLabels);

        // Predict label for user's data
        $prediction = $classifier->predict([$input]);

        // Calculate accuracy of model on testing set
        $predictedLabels = $classifier->predict($testingSet);
        $accuracy = Accuracy::score($testingLabels, $predictedLabels);

        // Save the trained model for future use
        $modelManager = new ModelManager();
        $modelManager->saveToFile($classifier, storage_path('app/diabetes.model'));

        // Return prediction and accuracy as JSON response
        $records = $request->all();
        $records['Outcome'] = $prediction[0];
        DiabetesService::addRecord($records);
        return view('result', [
            'prediction' => $prediction[0],
            'accuracy' => $accuracy,
        ]);
    }

  

}
