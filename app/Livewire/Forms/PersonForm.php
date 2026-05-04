<?php

namespace App\Livewire\Forms;

use App\Models\Person;
use App\Models\Person\Type;
use Livewire\Form;

class PersonForm extends Form
{
    public ?Person $person = null;
    public string $name = '';
    public string $type_id = '';

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

    public function setPerson(Person $person)
    {
        $this->person = $person;
        $this->name = $person->name;
        $this->type_id = $person->type_id;
    }

    public function store()
    {
        $this->validate();
        $type = Type::find($this->type_id);
        $type->people()->create($this->only(['name']));

//        Person::create($this->only(['name', 'type_id']));

//        Person::create([
//            'name' => $this->name,
//            'type_id' => $this->type
//        ]);
        $this->reset();
    }

    public function update()
    {
        $this->validate();
        $this->person->update($this->only(['name']));

//        $type = Type::find($this->type_id);
//        $type->people()->update($this->only(['name']));
    }

}
