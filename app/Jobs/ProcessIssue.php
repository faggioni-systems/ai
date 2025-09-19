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
    private OpenAIDataProvider $openAIDataProvider;
    private GithubDataProvider $githubDataProvider;

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
        $response = $this->openAIDataProvider->getResponse(
            $this->processIssueDTO->context
        );
        $issue = $this->githubDataProvider->createIssue(
            new GithubCreateIssueParamsDTO(
                repo: $this->processIssueDTO->repo,
                title: $response->output->first()->content[0]->text,
                body: collect($response->output)->pluck('content')->flatten()->pluck('text')->join("\n")
            )
        );
    }
}
