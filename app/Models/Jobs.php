<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    public $timestamps=false;

    protected $fillable = [ 'jobsId', 'aluminiId_fk', 'website', 'experiance', 'position', 'company', 'vacancies', 'referal', 'created_at','updated_at'
    ];
}
