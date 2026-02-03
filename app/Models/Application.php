<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
        //use HasFactory;
        protected $fillable = [
        'name',
        'email',
        'phone',
        'college',
        'degree',
        // ADD THESE:
        'last_exam_appeared',
        'cgpa',
        'domain',
        'skills',
        'resume_path',
        'status',
        'interview_batch_id',
        
    ];

    public const STATUS_APPLIED   = 'applied';
    public const STATUS_INTERVIEW = 'interview';
    public const STATUS_SELECTED  = 'selected';

    public static function statuses(): array
    {
        return [
            self::STATUS_APPLIED   => 'Applied',
            self::STATUS_INTERVIEW => 'Interview',
            self::STATUS_SELECTED  => 'Selected',
        ];
    }
    
    // Add 'interview_batch_id' to your $fillable array
    public function interviewBatch()
    {
        return $this->belongsTo(InterviewBatch::class);
    }
}
