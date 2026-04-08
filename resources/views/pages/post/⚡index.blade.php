<?php

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use App\Models\Post;

new #[Title('Posts')] class extends Component
{
    use WithPagination;

    #[Computed]
    public function posts()
    {
        return Post::latest()->paginate(5);
    }

//    public function edit($id)
//    {
//        $this->dispatch('edit-post', id: $id);
//    }
};
?>

<div class="max-w-7xl mx-auto space-y-4">
    <flux:heading size="xl" class="text-zinc-900 dark:text-white">Posts</flux:heading>
    <flux-subheading class="text-zinc-600 dark:text-zinc-400">Manage your posts</flux-subheading>
    <flux:separator variant="subtle"/>

    <flux:modal.trigger name="create-post">
        <flux:button variant="primary" color="fuchsia">Create Post</flux:button>
    </flux:modal.trigger>

    <livewire:post.create/>

    <livewire:post.edit/>

    {{-- Display Flash Message --}}
    <x-flash-message />

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-zinc-100 dark:bg-zinc-700 border-b border-zinc-200 dark:border-zinc-800">
                <tr>
                    <th class="px-6 py-4 text-left">Title</th>
                    <th class="px-6 py-4 text-left">Content</th>
                    <th class="px-6 py-4 text-left">Created</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800 bg-white dark:bg-zinc-950">
                @forelse($this->posts as $post)
                <tr wire:key="post-{{ $post->id }}" class="hover:bg-zinc-50 dark:hover:bg-zinc-900/50 transition">
                    <td class="px-6 py-4 font-medium text-zinc-900 dark:text-white">
                        {{ $post->title }}
                    </td>

                    <td class="px-6 py-4 text-zinc-600 dark:text-zinc-200 truncate max-w-md">
                        {{ Str::limit($post->content, 20, '...') }}
                    </td>

                    <td class="px-6 py-4 text-sm text-zinc-200">
                        {{ $post->created_at->diffForHumans() }}
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-2">
                            <flux:button
                                variant="primary"
                                color="amber"
                                wire:click="$dispatch('edit-post', {id: {{ $post->id }}})">
                                Edit
                            </flux:button>

                            <flux:button
                                variant="danger"
                                wire:click="$dispatch('confirm-delete', {id: {{ $post->id }}})">
                                Delete
                            </flux:button>
                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-zinc-500 dark:text-zinc-400">
                            No posts found.
                        </td>

                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- Pagination Link --}}
    <div>
        {{ $this->posts->links() }}
    </div>

</div>
