<?php
namespace App\Jobs;

use Mail;
use App\Mail\VerifyEmail; // Import your Mailable class
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user; // Change from $created to $user

    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user; // Assign user to the property
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \Log::info('Processing job for user: ' . $this->user->email);
        Mail::to($this->user->email)->send(new VerifyEmail($this->user)); // Use $this->user
    }
}
