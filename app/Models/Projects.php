<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [
        'aluminiId_fk','title','description','guide','achievements','projectYear','created_at','updated_at'
    ];
}
