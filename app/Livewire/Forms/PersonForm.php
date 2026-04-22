<?php

namespace App\Livewire\Forms;

use App\Models\Person;
use Livewire\Form;

class PersonForm extends Form
{
    public string $name = '';
    public string $type = '';

    protected function rules()
    {
        return[
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
        ];
    }

    public function store()
    {
        $this->validate();
        Person::create([
            'name' => $this->name,
            'type_id' => $this->type
        ]);
        $this->reset();
    }

}
