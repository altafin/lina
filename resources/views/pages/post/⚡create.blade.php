<?php

use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Post')] class extends Component
{
    public string $title = '';

    public string $content = '';

    public function save()
    {
        $this->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        dd($this->title, $this->content);
    }
};
?>

<section class="w-full">
{{--    @include('partials.settings-heading')--}}
    <flux:heading class="sr-only">{{ __('Profile settings') }}</flux:heading>
    <x-pages::settings.layout :heading="__('Post')" :subheading="__('cadastro de Post')">
        <form wire:submit="save" class="my-6 w-full space-y-6">
            <flux:input wire:model="title" :label="__('Title')" type="text" required autofocus autocomplete="title" />

            <div>
                <flux:textarea wire:model="content" :label="__('Content')" type="textarea" required autofocus autocomplete="content" />
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full" data-test="update-profile-button">
                        {{ __('Save Post') }}
                    </flux:button>
                </div>
                <x-action-message class="me-3" on="post-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>
    </x-pages::settings.layout>
</section>
