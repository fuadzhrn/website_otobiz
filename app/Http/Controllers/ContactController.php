<?php

namespace App\Http\Controllers;

use App\Models\ContactContent;
use App\Models\ContactFormField;
use App\Models\ContactLocation;
use App\Models\ContactQuickCard;
use App\Models\ContactSupportCard;
use App\Models\ContactSupportHighlight;

class ContactController extends Controller
{
    public function index()
    {
        $contactContent = ContactContent::query()->first();

        if (!$contactContent) {
            $contactContent = (object) [
                'hero_title' => 'Hubungi OTOBIZ dengan Cara yang Paling Nyaman untuk Anda',
                'hero_description' => 'Dari pertanyaan awal, kebutuhan konsultasi, hingga informasi lokasi dan layanan support, tim OTOBIZ siap membantu Anda dengan lebih cepat dan terarah.',
                'hero_small_button_text' => 'Kirim Pesan',
                'hero_small_button_link' => '#contact-form',
                'contact_form_title' => 'Form Kontak',
                'contact_form_description' => 'Sampaikan kebutuhan, pertanyaan, atau tujuan konsultasi Anda. Tim OTOBIZ akan membantu mengarahkan ke layanan yang paling sesuai.',
                'contact_form_submit_text' => 'Kirim Pesan',
                'contact_form_checkbox_text' => 'Saya bersedia dihubungi oleh tim OTOBIZ terkait pesan yang saya kirimkan.',
                'locations_section_title' => 'Alamat HO & Pool',
                'support_section_title' => 'Customer Support',
                'support_section_description' => 'Tim support OTOBIZ siap membantu kebutuhan informasi, tindak lanjut komunikasi, dan dukungan awal untuk calon mitra maupun pelanggan.',
                'support_highlight_text' => 'Konsultasi awal dan pertanyaan program ditangani secara profesional untuk membantu Anda memilih jalur komunikasi yang paling tepat.',
                'closing_strip_text' => 'OTOBIZ siap membantu Anda mulai dari pertanyaan awal hingga proses konsultasi lanjutan, dengan komunikasi yang lebih terarah dan profesional.',
                'closing_strip_button_text' => 'Hubungi Tim Kami',
                'closing_strip_button_link' => '#contact-form',
            ];
        }

        $quickCards = ContactQuickCard::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $formFields = ContactFormField::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $locations = ContactLocation::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        if ($locations->isEmpty()) {
            $locations = collect([
                (object) [
                    'location_type' => 'ho',
                    'title' => 'Head Office',
                    'address' => "Werkspace, Soho Capital, Lt.19 - D2\nJl. Let. S. Parman Kav 28, Tanjung Duren Selatan, Jakarta Barat, Indonesia 11470",
                    'description' => null,
                    'button_text' => 'Lihat Lokasi',
                    'button_link' => '#',
                    'icon' => 'bi bi-building',
                ],
                (object) [
                    'location_type' => 'pool',
                    'title' => 'Pool Operasional',
                    'address' => 'Informasi lokasi pool akan disesuaikan berdasarkan kebutuhan operasional dan wilayah layanan.',
                    'description' => null,
                    'button_text' => 'Hubungi Admin Lokasi',
                    'button_link' => '#',
                    'icon' => 'bi bi-pin-map',
                ],
            ]);
        }

        $supportCards = ContactSupportCard::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $supportHighlights = ContactSupportHighlight::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('kontak', [
            'contactContent' => $contactContent,
            'quickCards' => $quickCards,
            'formFields' => $formFields,
            'locations' => $locations,
            'supportCards' => $supportCards,
            'supportHighlights' => $supportHighlights,
        ]);
    }
}
