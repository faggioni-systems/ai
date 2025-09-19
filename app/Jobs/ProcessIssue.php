<?php

namespace App\Jobs;

use App\Github\DTOs\GithubCreateIssueParamsDTO;
use App\Github\GithubDataProvider;
use App\Jobs\DTOs\ProcessIssueDTO;
use App\OpenAI\OpenAIDataProvider;
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
        $openAIDataProvider = new OpenAIDataProvider();
        $githubDataProvider = new GithubDataProvider();

        $response = $openAIDataProvider->getResponse(
            $this->processIssueDTO->context
        );
        $issue = $githubDataProvider->createIssue(
            new GithubCreateIssueParamsDTO(
                repo: $this->processIssueDTO->repo,
                title: $this->processIssueDTO->title,
                body: collect($response->output)->pluck('content')->flatten()->pluck('text')->join("\n")
            )
        );
    }
}
