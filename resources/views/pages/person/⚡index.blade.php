<?php

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;
use App\Models\Person;
use Livewire\WithPagination;

new #[Title('People')] class extends Component
{
    use WithPagination;

    #[Computed]
    public function people()
    {
        return Person::with('type')->latest()->paginate(5);
    }
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
    <livewire:person.edit/>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-zinc-100 dark:bg-zinc-700 border-b border-zinc-200 dark:border-zinc-800">
            <tr>
                <th class="px-6 py-4 text-left">Name</th>
                <th class="px-6 py-4 text-left">Type</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
            </thead>

            <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800 bg-white dark:bg-zinc-950">
            @forelse($this->people as $person)
                <tr wire:key="person-{{ $person->id }}" class="hover:bg-zinc-50 dark:hover:bg-zinc-900/50 transition">
                    <td class="px-6 py-4 font-medium text-zinc-900 dark:text-white">
                        {{ $person->name }}
                    </td>

                    <td class="px-6 py-4 text-zinc-600 dark:text-zinc-200 truncate max-w-md">
                        {{ $person->type->name }}
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex justify-end gap-2">
                            <flux:button
                                variant="primary"
                                color="amber"
                                wire:click="$dispatch('edit-person', {id: {{ $person->id }}})">
                                Edit
                            </flux:button>

                            <flux:button
                                variant="danger"
                                wire:click="$dispatch('confirm-delete', {id: {{ $person->id }}})">
                                Delete
                            </flux:button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-zinc-500 dark:text-zinc-400">
                        No people found.
                    </td>

                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

</div>
