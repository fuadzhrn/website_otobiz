<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_badge_text',
        'hero_title',
        'hero_description',
        'hero_image',
        'hero_primary_button_text',
        'hero_primary_button_link',
        'hero_secondary_button_text',
        'hero_secondary_button_link',
        'value_section_title',
        'value_section_description',
        'summary_section_title',
        'summary_section_description',
        'stats_section_title',
        'stats_section_description',
        'cta_title',
        'cta_description',
        'cta_button_text',
        'cta_button_link',
    ];
}
