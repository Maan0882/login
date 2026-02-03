<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InterviewBatch;
use App\Models\InternshipApplication;
use App\Mail\InterviewScheduledMail;
use Illuminate\Support\Facades\Mail;

class InterviewBatchController extends Controller
{
    public function store(Request $request)
    {
        $batch = InterviewBatch::create([
            'title' => $request->title,
            'interview_date' => $request->interview_date,
            'interview_time' => $request->interview_time,
            // 'mode' => $request->mode,
            // 'meeting_link' => $request->meeting_link,
            'location' => $request->location,
        ]);

        // Assign selected interns
        $applications = InternshipApplication::whereIn('id', $request->application_ids)->get();

        foreach ($applications as $application) {

            $application->update([
                'interview_batch_id' => $batch->id,
                'status' => 'interview_scheduled'
            ]);

            // Send Email Automatically
            Mail::to($application->email)
                ->send(new InterviewScheduledMail($application, $batch));
        }

        return response()->json([
            'message' => 'Interview Batch Created & Emails Sent Successfully'
        ]);
    }
}
