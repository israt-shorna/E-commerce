<?php

namespace App\Jobs;

use App\Mail\SendEmailTest;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $user;
    public function __construct(User $userObject)
    {
        $this->user=$userObject;
       
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
       
      Mail::to($this->user->email)->send(new SendEmailTest());
      
    }
}
