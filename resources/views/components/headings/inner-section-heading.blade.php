@props([
    'title' => '',
    'subTitle' => ''
])
<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ $title }}</flux:heading>
    @if($subTitle)
        <flux:subheading size="lg" class="mb-6">{{ $subTitle }}</flux:subheading>
    @endif
    <flux:separator variant="subtle" />
</div>
