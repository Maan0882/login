<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InterviewBatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_name', 
        'interview_date', 
        'interview_time', 
        'location'
    ];


    // Relationship: One batch has many applications
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
