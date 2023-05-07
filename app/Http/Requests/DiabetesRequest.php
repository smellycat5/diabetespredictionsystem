<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pregnancy'=> 'required',
            'glucose' => 'required',
            'blood_pressure' => 'required',
            'diabetes' => 'required',
            'BMI'=> 'required',
            'skin_thickness'=> 'required',
            'insulin'=> 'required',
            'age'=> 'required'
        ];
    }
}
