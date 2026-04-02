<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinFormField extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_key',
        'label',
        'field_type',
        'placeholder',
        'options_json',
        'sort_order',
        'is_required',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'options_json' => 'array',
            'sort_order' => 'integer',
            'is_required' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}
