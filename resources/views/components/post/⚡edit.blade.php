<?php

use Livewire\Component;
use App\Livewire\Forms\PostForm;
use Livewire\Attributes\On;
use App\Models\Post;

new class extends Component
{
    public PostForm $form;

    #[On('edit-post')]
    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        $this->form->setPost($post);
        Flux::modal('edit-post')->show();
    }

    public function updatePost()
    {
        $this->form->update();
        Flux::modal('edit-post')->close();
        session()->flash('warning', 'Post updated successfully');
        $this->redirectRoute('posts', navigate: true);
    }

    #[On('confirm-delete')]
    public function confirmdelete($id)
    {
        $post = Post::findOrFail($id);
        $this->form->setPost($post);
        Flux::modal('delete-post')->show();
    }

    public function deletePost()
    {
        $this->form->post->delete();
        Flux::modal('delete-post')->close();
        session()->flash('success', 'Post deleted successfully');
        $this->redirectRoute('posts', navigate: true);
    }

};
?>

<div>
    <flux:modal
        name="edit-post"
        class="md:w-lg"
    >
        <form class="space-y-8" wire:submit.prevent="updatePost">
            {{-- header --}}
            <div class="space-y-2">
                <flux:heading size="lg" class="text-shadow-zinc-900 dark:text-white">
                    Update Post
                </flux:heading>

                <flux:text class="text-shadow-zinc-600 dark:text-shadow-zinc-400">
                    Modify your post details below.
                </flux:text>
            </div>

            {{-- Form Fields --}}
            <div class="space-y-6">
                <flux:input
                    label="Title"
                    wire:model="form.title"
                    placeholder="Enter a title..."
                    wire:dirty.class="ring-1 ring-yellow-400"
                    class="dark:bg-zinc-900"
                />

                <flux:textarea
                    label="Content"
                    wire:model="form.content"
                    placeholder="Write your post content..."
                    rows="6"
                    wire:dirty.class="ring-1 ring-yellow-400"
                    class="dark:bg-zinc-900"
                />

                <div
                    wire:show="$dirty"
                    class="text-yellow-500 text-sm"
                >
                    You have unsaved changes...
                </div>
            </div>

            {{-- Footer --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200 dark:border-zinc-800">
                <flux:modal.close>
                    <flux:button variant="primary">
                        Cancel
                    </flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="primary" color="lime">
                    Update Post
                </flux:button>
            </div>

        </form>
    </flux:modal>

    {{-- Delete Post Modal --}}
    <flux:modal name="delete-post" class="md:w-40">
        <div class="space-y-4">
            {{-- Header --}}
            <flux:heading size="lg" class="text-zinc-900 dark:text-white">
                Delete Post?
            </flux:heading>

            <flux:text class="text-zinc-600 dark:text-zinc-400">
                This action cannot be undone. Are you sure you want to delete this post?
            </flux:text>

            {{-- Footer --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200 dark:border-zinc-800">
                <flux:modal.close>
                    <flux:button variant="primary">
                        Cancel
                    </flux:button>
                </flux:modal.close>

                <flux:button variant="danger" wire:click="deletePost">
                    Delete Post
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
