<?php

namespace App\Jobs;

use App\Enums\MailStatus;
use App\Models\Mail;
use Illuminate\Contracts\Broadcasting\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\Attributes\WithoutRelations;

class ProcessMail implements ShouldQueue, ShouldBeUnique
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        #[WithoutRelations]
        public Mail $mail
    )
    {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->mail->update([
            'status' => MailStatus::Sent,
        ]);
    }
}
