<?php

use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('People')] class extends Component
{
    //
};
?>

<div class="max-w-7xl mx-auto space-y-4">
    <flux:heading size="xl" class="text-zinc-900 dark:text-white">People</flux:heading>
    <flux-subheading class="text-zinc-600 dark:text-zinc-400">Manage your people</flux-subheading>
    <flux:separator variant="subtle"/>

    <flux:modal.trigger name="create-person">
        <flux:button variant="primary" color="fuchsia">Create Person</flux:button>
    </flux:modal.trigger>

    <livewire:person.create/>
</div>
