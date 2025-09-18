<?php

namespace App\Jobs;

use App\Jobs\DTOs\ProcessIssueDTO;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessIssue implements ShouldQueue
{
    use Queueable;
    private ProcessIssueDTO $processIssueDTO;

    /**
     * Create a new job instance.
     */
    public function __construct(ProcessIssueDTO $data)
    {
        $this->processIssueDTO = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
