<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_badge_one',
        'hero_badge_two',
        'hero_badge_three',
        'hero_title',
        'hero_description',
        'hero_primary_button_text',
        'hero_primary_button_link',
        'hero_secondary_button_text',
        'hero_secondary_button_link',
        'registration_section_title',
        'registration_section_description',
        'registration_form_note',
        'registration_checkbox_text',
        'selection_section_title',
        'selection_section_description',
        'selection_section_note',
        'sales_section_title',
        'sales_section_description',
        'cta_title',
        'cta_description',
        'cta_primary_button_text',
        'cta_primary_button_link',
        'cta_secondary_button_text',
        'cta_secondary_button_link',
    ];
}
