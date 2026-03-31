<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MekanismeContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_kicker',
        'hero_badge_one',
        'hero_badge_two',
        'hero_badge_three',
        'hero_title',
        'hero_description',
        'hero_primary_button_text',
        'hero_primary_button_link',
        'hero_secondary_button_text',
        'hero_secondary_button_link',
        'subnav_title_optional',
        'business_section_kicker',
        'business_section_title',
        'business_section_description',
        'flow_section_kicker',
        'flow_section_title',
        'flow_section_description',
        'flow_note_text',
        'terms_section_kicker',
        'terms_section_title',
        'terms_section_description',
        'faq_section_kicker',
        'faq_section_title',
        'faq_section_description',
        'cta_kicker',
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
