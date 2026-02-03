<x-mail::message>
# Hello {{ $application->name }},

Your internship application has been shortlisted! We are pleased to invite you for an interview.

**Interview Details:**
* **Date:** {{ \Carbon\Carbon::parse($batch->interview_date)->format('d M Y') }}
* **Time:** {{ \Carbon\Carbon::parse($batch->interview_time)->format('h:i A') }}
* **Location:** {{ $batch->location }}

Please bring a hard copy of your resume and valid ID proof.

Thanks,
{{ config('app.name') }}
</x-mail::message>