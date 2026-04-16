<?php

namespace App\Livewire\Forms;

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

}
