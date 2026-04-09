<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductContent extends Model
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
        'hero_trust_text',
        'packages_section_kicker',
        'packages_section_title',
        'packages_section_description',
        'packages_section_note',
        'units_section_kicker',
        'units_section_title',
        'units_section_description',
        'specs_section_kicker',
        'specs_section_title',
        'specs_section_description',
        'simulation_section_kicker',
        'simulation_section_title',
        'simulation_section_description',
        'simulation_disclaimer',
        'cta_title',
        'cta_description',
        'cta_primary_button_text',
        'cta_primary_button_link',
        'cta_secondary_button_text',
        'cta_secondary_button_link',
        'cta_third_button_text',
        'cta_third_button_link',
    ];
}
