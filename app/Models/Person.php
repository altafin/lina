<?php

namespace App\Models;

use App\Models\Person\Type;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Table('people')]
#[Fillable(['name', 'type_id'])]
class Person extends Model
{
    use SoftDeletes;

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

}
