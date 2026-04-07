<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <flux:modal name="create-post" class="w-full max-w-4xl">
        <form class="space-y-8">
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
