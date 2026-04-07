<?php

use Livewire\Component;

new class extends Component
{

}
?>

<div>
    <flux:modal name="create-post" class="md:w-150">
        <form class="space-y-8">
            {{-- Modal Header --}}]
            <div class="space-y-2">
                <flux:heading size="lg" class="text-zinc-900 dark:text-white">
                    Create Post
                </flux:heading>

                <flux:text class="text-zinc-600 dark:text-zinc-400">
                    Add a new post to your blog or update feed.
                </flux:text>
            </div>
            {{-- Form Fields --}}
            <div class="space-y-6">
                <flux:input
                    label="Title"
                    placeholder="Enter post title..."
                    class="dark:bg-zinc-900"
                />

                <flux:textarea
                    label="Content"
                    placeholder="Write your post content here..."
                    rows="6"
                    class="dark:bg-zinc-900"
                />
            </div>
            {{-- Modal Footer --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200 dark:border-zinc-800">
                <flux:modal.close>
                    <flux:button variant="primary">
                        Cancel
                    </flux:button>
                </flux:modal.close>

                <flux:button
                    type="submit"
                    variant="primary"
                    color="lime"
                >
                    Save Post
                </flux:button>
            </div>
        </form>
    </flux:modal>
</div>



//CÓDIGO ANTIGO DA CLASSE 07/04/2-26
/*
use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Post')] class extends Component
{
    public string $title = '';
    public string $content = '';

    public function savePost(): void
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
        <form wire:submit="savePost" class="my-6 w-full space-y-6">
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
*/
