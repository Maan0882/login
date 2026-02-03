<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InterviewScheduledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $batch;

    public function __construct($application, $batch)
    {
        $this->application = $application;
        $this->batch = $batch;
    }

    public function build()
    {
        return $this->subject('Interview Scheduled - TechStrota Internship')
                    ->markdown('emails.interview-schedule'); // We will create this view next
    }
    public function content(): Content
    {
        return new Content(
            // Ensure this string matches your ACTUAL folder and filename
            view: 'emails.interview-schedule', 
        );
    }
}