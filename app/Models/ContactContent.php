<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_title',
        'hero_description',
        'hero_small_button_text',
        'hero_small_button_link',
        'contact_form_title',
        'contact_form_description',
        'contact_form_submit_text',
        'contact_form_checkbox_text',
        'locations_section_title',
        'support_section_title',
        'support_section_description',
        'support_highlight_text',
        'closing_strip_text',
        'closing_strip_button_text',
        'closing_strip_button_link',
    ];
}
