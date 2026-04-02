<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinSalesContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'contact_label',
        'contact_value',
        'button_text',
        'button_link',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }
}
