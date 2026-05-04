<?php

use Livewire\Attributes\On;
use Livewire\Component;
use App\Livewire\Forms\PersonForm;
use App\Models\Person;

new class extends Component
{
    public PersonForm $form;

    #[On('edit-person')]
    public function editPerson($id)
    {
        $person = Person::findOrFail($id);
        $this->form->setPerson($person);
        Flux::modal('edit-person')->show();
    }

    public function updatePerson()
    {
        $this->form->update();
        Flux::modal('edit-person')->close();
        session()->flash('warning', 'Person updated successfully');
        $this->redirectRoute('people', navigate: true);
    }
};
?>

<div>
    <flux:modal
        name="edit-person"
        class="md:w-lg"
    >
        <form class="space-y-8" wire:submit.prevent="updatePerson">
            {{-- header --}}
            <div class="space-y-2">
                <flux:heading size="lg" class="text-shadow-zinc-900 dark:text-white">
                    Update Person
                </flux:heading>

                <flux:text class="text-shadow-zinc-600 dark:text-shadow-zinc-400">
                    Modify your person details below.
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

            {{-- Footer --}}
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-200 dark:border-zinc-800">
                <flux:modal.close>
                    <flux:button variant="primary">
                        Cancel
                    </flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="primary" color="lime">
                    Update Person
                </flux:button>
            </div>

        </form>
    </flux:modal>
</div>
