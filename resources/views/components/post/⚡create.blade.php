<?php

use Livewire\Component;
use App\Livewire\Forms\PostForm;
use Flux\Flux;

new class extends Component
{
    public PostForm $form;

    public function save()
    {
        $this->form->store();
        Flux::modal('create-post')->close();

        session()->flash('success', 'Post created successfully');
        $this->redirectRoute('posts', navigate: true);
    }
};
?>

<div>
    <flux:modal
        name="create-post"
        class="w-full max-w-4xl"
        x-on:close="
            $el.querySelector('form').reset();
            $el.querySelectorAll('[data-flux-error]').forEach(el => el.textContent = '');
            $el.querySelectorAll('[data-invalid]').forEach(el => el.removeAttribute('data-invalid'));
            $el.querySelectorAll('[aria-invalid]').forEach(el => el.setAttribute('aria-invalid', 'false'));
        "
    >
        <form class="space-y-8" wire:submit.prevent="save">
            {{-- Modal Header --}}
            <div class="space-y-2">
                <flux:heading size="lg" class="text-zinc-900 dark:text-white">
                    Create Post
                </flux:heading>

                <flux:text class="text-zinc-600 dark:text-zinc-400">
                    Add a new post to your blog or update feed.
                </flux:text>
            </div>
            {{-- Form Fields --}}
            <div class="space-y-6 mt-6">
                <flux:input
                    label="Title"
                    placeholder="Enter post title..."
                    wire:model="form.title"
                    class="dark:bg-zinc-900"
                />

                <flux:textarea
                    label="Content"
                    placeholder="Write your post content here..."
                    rows="6"
                    wire:model="form.content"
                    class="dark:bg-zinc-900"
                />
            </div>
            {{-- Modal Footer --}}
            <div class="flex items-center justify-end gap-3 mt-6 border-t border-zinc-200 dark:border-zinc-800">
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
