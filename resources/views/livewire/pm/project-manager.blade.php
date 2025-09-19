<?php

use App\Github\GithubDataProvider;
use Livewire\Volt\Component;
use App\Jobs\DTOs\ProcessIssueDTO;
use App\Jobs\ProcessIssue;
use Masmerise\Toaster\Toaster;
use Livewire\Attributes\Validate;

new class extends Component {
    public array $availableRepos = [];

    #[Validate('required')]
    public string $selectedRepo;

    #[Validate('required')]
    public string $title;

    #[Validate('required|min:3')]
    public string $context;


    public function mount(): void
    {
        $github = new GithubDataProvider();
        $this->availableRepos = $github->getRepositories();
    }

    public function onSubmitForm()
    {
        $this->validate();

        $data = new ProcessIssueDTO(
            $this->selectedRepo,
            $this->title,
            $this->context
        );
        ProcessIssue::dispatch($data);
        Toaster::success("Issues is being created, please wait a moment and refresh the Github Issue page.");
        $this->resetState();
    }

    public function resetState(): void
    {
        $this->reset('context');
        $this->reset('title');
    }

}; ?>

<section class="w-full">
    <x-headings.inner-section-heading
        title="Project Manager"
        subTitle="Create issues real easy"
    />

    <form method="POST" wire:submit="onSubmitForm" class="mt-6 space-y-6">
        <flux:select
            wire:model="selectedRepo"
            :label="__('Select repository')"
            placeholder="Choose repo..."
            required
        >
            @foreach($this->availableRepos as $availableRepo)
                <flux:select.option wire:key="{{ $availableRepo['id'] }}" value="{{ $availableRepo['name']  }}">{{ $availableRepo['fullName'] }}</flux:select.option>
            @endforeach
        </flux:select>

        <flux:input
            wire:model="title"
            :label="__('Whats your Issue title?')"
            type="text"
            required
        />

        <flux:textarea
            wire:model="context"
            :label="__('What is the issue about?')"
            type="password"
            required
         />
        <div class="flex items-center gap-4">
            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full" data-test="update-password-button">
                    {{ __('Save') }}
                </flux:button>
            </div>
            <x-action-message class="me-3" on="password-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</section>
