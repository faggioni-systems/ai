<?php

use App\Github\GithubDataProvider;
use Livewire\Volt\Component;

new class extends Component {
    public array $availableRepos = [];
    public string $context = '';
    public string $selectedRepo = '';
    public string $issueContext = '';

    public function mount(): void
    {
        $github = new GithubDataProvider();
        $this->availableRepos = $github->getRepositories();
        $con = new \App\OpenAI\OpenAIDataProvider();
        dd($con->getResponse('create a task for changing the favicon from the website'));
    }

    public function onSubmitForm()
    {

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
                <flux:select.option wire:key="{{ $availableRepo['id'] }}">{{ $availableRepo['fullName'] }}</flux:select.option>
            @endforeach
        </flux:select>

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
