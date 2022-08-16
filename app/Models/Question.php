<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = ['options' => 'array'];
}
