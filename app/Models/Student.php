<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $fillable = [
        'studentsId','UserId_fk','StudentregNumber','departmentId_fk','isActive','created_at','updated_at',
    ];
}
