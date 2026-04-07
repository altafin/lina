<?php

use Livewire\Component;

new class extends Component
{
    //
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
</div>
