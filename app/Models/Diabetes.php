<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diabetes extends Model
{
    use HasFactory;

    protected $table = 'diabetes';
    protected $fillable = ['pregnancies','glucose', 'blood_pressure','skin_thickness', 'insulin', 'BMI', 'diabetes_pedigree_function', 'age', 'Outcome'];

}
