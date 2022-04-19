<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectRequest extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $fillable = [
        'aluminiId_fk','studentsId_fk','projectId_fk','requestInfo','replyInfo','replayStatus','created_at','updated_at'
    ];
}
