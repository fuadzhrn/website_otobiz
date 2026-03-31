<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'intro_kicker',
        'intro_section_title',
        'intro_description',
        'intro_subtext',
        'vision_section_title',
        'vision_section_subtitle',
        'vision_title',
        'vision_description',
        'mission_section_title',
        'values_section_kicker',
        'values_section_title',
        'values_section_description',
    ];
}
