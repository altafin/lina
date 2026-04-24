<?php

use Livewire\Component;
use App\Livewire\Forms\PersonForm;

new class extends Component
{
    public PersonForm $form;
    public function save()
    {
        $this->form->store();
        Flux::modal('create-person')->close();
        $this->redirectRoute('people', navigate: true);
    }
};
?>

<div>
    <flux:modal name="create-person" class="md:w-150">
        <form class="space-y-8" wire:submit.prevent="save">
            {{-- Modal Header --}}
            <div class="space-y-2">
                <flux:heading size="lg" class="text-zinc-900 dark:text-white">
                    Create Person
                </flux:heading>

                <flux:text class="text-zinc-600 dark:text-zinc-400">
                    Add a new person to your system or update.
                </flux:text>
            </div>
            {{-- Form Fields --}}
            <div class="space-y-6">
                <flux:input
                    label="Name"
                    placeholder="Enter name..."
                    wire:model="form.name"
                    class="dark:bg-zinc-900"
                />
            </div>

            <div class="space-y-6">
                <flux:select
                    label="Type"
                    placeholder="Choose type..."
                    wire:model="form.type_id"
                    class="dark:bg-zinc-900"
                >
                    <flux:select.option value="1">Física</flux:select.option>
                    <flux:select.option value="2">Jurídica</flux:select.option>
                </flux:select>
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
                    Save Person
                </flux:button>
            </div>
        </form>
    </flux:modal>
</div>
