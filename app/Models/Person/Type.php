<?php

namespace App\Models\Person;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['name'])]
class Type extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'people_types';

}
