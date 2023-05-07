<!DOCTYPE html>
<html>
<head>
    <title>Diabetes Predictor</title>
</head>
<body>
    <h1>Diabetes Predictor</h1>

    <form action="{{ url('/predict') }}" method="post">
        @csrf
        <p>
            <label for="pregnancies">Number of Pregnancies:</label>
            <input type="number" name="pregnancies" id="pregnancies" required>
        </p>
        <p>
            <label for="glucose">Glucose Level:</label>
            <input type="number" name="glucose" id="glucose" required>
        </p>
        <p>
            <label for="blood_pressure">Blood Pressure:</label>
            <input type="number" name="blood_pressure" id="blood_pressure" required>
        </p>
        <p>
            <label for="skin_thickness">Skin Thickness:</label>
            <input type="number" name="skin_thickness" id="skin_thickness" required>
        </p>
        <p>
            <label for="insulin">Insulin Level:</label>
            <input type="number" name="insulin" id="insulin" required>
        </p>
        <p>
            <label for="BMI">BMI:</label>
            <input type="number" step="0.01" name="BMI" id="BMI" required>
        </p>
        <p>
            <label for="diabetes_pedigree_function">Diabetes Pedigree Function:</label>
            <input type="number" step="0.01" name="diabetes_pedigree_function" id="diabetes_pedigree_function" required>
        </p>
        <p>
            <label for="age">Age:</label>
            <input type="number" name="age" id="age" required>
        </p>
        <button type="submit">Predict</button>
    </form>
{{-- 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Submit form via AJAX
        $('form').submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    alert('Prediction: ' + response.prediction + '\nAccuracy: ' + response.accuracy.toFixed(2));
                },
                error: function() {
                    alert('Error: Could not make prediction.');
                }
            });
        });
    </script> --}}
</body>
</html>
