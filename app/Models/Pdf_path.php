<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf_path extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'path',       
        'year',
        'month',
    ];
}
