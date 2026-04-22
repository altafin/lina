<?php

namespace App\Models\Person;

use App\Models\Person;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Table('people_types')]
#[Fillable(['name'])]
class Type extends Model
{
    use HasFactory, SoftDeletes;

    public function people(): HasMany
    {
        return $this->hasMany(Person::class);
    }

}
