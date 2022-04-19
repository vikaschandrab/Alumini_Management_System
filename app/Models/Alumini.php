<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumini extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $fillable = [
        'aluminiId','UserId_fk','regNumber','departmentId_fk','companyName','jobDesignation','jobExperiance','isActive','created_at','updated_at',
    ];
}
