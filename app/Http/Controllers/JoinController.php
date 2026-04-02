<?php

namespace App\Http\Controllers;

use App\Models\JoinContent;
use App\Models\JoinFormField;
use App\Models\JoinSalesContact;
use App\Models\JoinSalesHighlight;
use App\Models\JoinSelectionStep;

class JoinController extends Controller
{
    public function index()
    {
        $joinContent = JoinContent::query()->first();

        if (!$joinContent) {
            $joinContent = (object) [
                'hero_badge_one' => 'Proses Terarah',
                'hero_badge_two' => 'Konsultasi Profesional',
                'hero_badge_three' => 'Sistem Transparan',
                'hero_title' => 'Mulai Langkah Anda Menjadi Mitra OTOBIZ',
                'hero_description' => 'Isi formulir pendaftaran, pahami proses seleksi, dan konsultasikan kebutuhan Anda bersama tim OTOBIZ untuk memulai kemitraan kendaraan produktif.',
                'hero_primary_button_text' => 'Isi Formulir',
                'hero_primary_button_link' => '#gabung-form',
                'hero_secondary_button_text' => 'Konsultasi Sekarang',
                'hero_secondary_button_link' => '#gabung-sales',
                'registration_section_title' => 'Form Pendaftaran',
                'registration_section_description' => 'Lengkapi data Anda untuk memulai proses konsultasi dan pendaftaran kemitraan bersama OTOBIZ.',
                'registration_form_note' => 'Data Anda akan diproses oleh tim OTOBIZ untuk tahap konsultasi awal.',
                'registration_checkbox_text' => 'Saya setuju untuk dihubungi oleh tim OTOBIZ terkait konsultasi dan proses kemitraan.',
                'selection_section_title' => 'Proses Seleksi',
                'selection_section_description' => 'Tahapan setelah mendaftar untuk memulai kemitraan secara terarah.',
                'selection_section_note' => 'Setiap tahapan dirancang agar calon mitra memahami program dengan jelas sebelum melanjutkan ke proses kemitraan secara penuh.',
                'sales_section_title' => 'Kontak Sales / Konsultasi',
                'sales_section_description' => 'Butuh penjelasan lebih lanjut sebelum mendaftar? Tim OTOBIZ siap membantu Anda memahami program, pilihan unit, dan skema kemitraan yang sesuai.',
                'cta_title' => 'Siap Bergabung Bersama OTOBIZ?',
                'cta_description' => 'Mulai dari konsultasi, pendaftaran, hingga proses seleksi, OTOBIZ membantu Anda memahami langkah kemitraan secara lebih terarah dan profesional.',
                'cta_primary_button_text' => 'Isi Formulir Sekarang',
                'cta_primary_button_link' => '#gabung-form',
                'cta_secondary_button_text' => 'Hubungi Tim Kami',
                'cta_secondary_button_link' => '#gabung-sales',
            ];
        }

        $formFields = JoinFormField::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $selectionSteps = JoinSelectionStep::query()
            ->where('is_active', true)
            ->with([
                'points' => function ($query) {
                    $query->where('is_active', true)
                        ->orderBy('sort_order')
                        ->orderBy('id');
                },
            ])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $salesContacts = JoinSalesContact::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $salesHighlights = JoinSalesHighlight::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('gabung', [
            'joinContent' => $joinContent,
            'formFields' => $formFields,
            'selectionSteps' => $selectionSteps,
            'salesContacts' => $salesContacts,
            'salesHighlights' => $salesHighlights,
        ]);
    }
}
