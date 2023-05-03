<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form extends Model
{
    use HasFactory;

    protected $fillable = [
        "full_name",
        "roll",
        "student_id",
        "dob",
        "fathers_name",
        "mothers_name",
        "department",
        "semester",
        "blood",
        "country",
        "language",
        "phone",
        "email",
        "gender",
        "hobby",
        "file"
    ];

    protected $table = 'form';
}
