<?php

namespace Database\Seeders;

use App\Models\ContactContent;
use App\Models\ContactFormField;
use App\Models\ContactLocation;
use App\Models\ContactQuickCard;
use App\Models\ContactSupportCard;
use App\Models\ContactSupportHighlight;
use Illuminate\Database\Seeder;

class ContactContentSeeder extends Seeder
{
    public function run(): void
    {
        ContactContent::query()->updateOrCreate(
            ['id' => 1],
            [
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
            ]
        );

        $quickCards = [
            [
                'title' => 'Konsultasi Kemitraan',
                'description' => 'Bantu pilih jalur kemitraan sesuai profil Anda.',
                'icon' => 'bi bi-briefcase',
                'button_text' => null,
                'button_link' => null,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Customer Support',
                'description' => 'Dukungan cepat untuk pertanyaan program dan layanan.',
                'icon' => 'bi bi-headset',
                'button_text' => null,
                'button_link' => null,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Lokasi Kantor',
                'description' => 'Informasi alamat HO dan pool operasional OTOBIZ.',
                'icon' => 'bi bi-geo-alt',
                'button_text' => null,
                'button_link' => null,
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($quickCards as $item) {
            ContactQuickCard::query()->updateOrCreate(
                ['title' => $item['title']],
                $item
            );
        }

        $formFields = [
            ['field_key' => 'full_name', 'label' => 'Nama Lengkap', 'field_type' => 'text', 'placeholder' => null, 'options_json' => null, 'sort_order' => 1, 'is_required' => true, 'is_active' => true],
            ['field_key' => 'email', 'label' => 'Email', 'field_type' => 'email', 'placeholder' => null, 'options_json' => null, 'sort_order' => 2, 'is_required' => true, 'is_active' => true],
            ['field_key' => 'whatsapp', 'label' => 'Nomor WhatsApp', 'field_type' => 'tel', 'placeholder' => null, 'options_json' => null, 'sort_order' => 3, 'is_required' => true, 'is_active' => true],
            ['field_key' => 'subject', 'label' => 'Subjek / Keperluan', 'field_type' => 'text', 'placeholder' => null, 'options_json' => null, 'sort_order' => 4, 'is_required' => true, 'is_active' => true],
            ['field_key' => 'inquiry_type', 'label' => 'Jenis Pertanyaan', 'field_type' => 'select', 'placeholder' => 'Pilih Jenis Pertanyaan', 'options_json' => [
                ['value' => 'informasi-umum', 'label' => 'Informasi Umum'],
                ['value' => 'konsultasi-kemitraan', 'label' => 'Konsultasi Kemitraan'],
                ['value' => 'dukungan-pelanggan', 'label' => 'Dukungan Pelanggan'],
                ['value' => 'kerja-sama-lainnya', 'label' => 'Kerja Sama / Lainnya'],
            ], 'sort_order' => 5, 'is_required' => true, 'is_active' => true],
            ['field_key' => 'message', 'label' => 'Pesan', 'field_type' => 'textarea', 'placeholder' => null, 'options_json' => null, 'sort_order' => 6, 'is_required' => true, 'is_active' => true],
        ];

        foreach ($formFields as $field) {
            ContactFormField::query()->updateOrCreate(
                ['field_key' => $field['field_key']],
                $field
            );
        }

        $locations = [
            [
                'location_type' => 'ho',
                'title' => 'Head Office',
                'address' => "Werkspace, Soho Capital, Lt.19 - D2\nJl. Let. S. Parman Kav 28, Tanjung Duren Selatan, Jakarta Barat, Indonesia 11470",
                'description' => null,
                'operation_hours' => null,
                'button_text' => 'Lihat Lokasi',
                'button_link' => '#',
                'icon' => 'bi bi-building',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'location_type' => 'pool',
                'title' => 'Pool Operasional',
                'address' => 'Informasi lokasi pool akan disesuaikan berdasarkan kebutuhan operasional dan wilayah layanan.',
                'description' => null,
                'operation_hours' => null,
                'button_text' => 'Hubungi Admin Lokasi',
                'button_link' => '#',
                'icon' => 'bi bi-pin-map',
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($locations as $item) {
            ContactLocation::query()->updateOrCreate(
                ['location_type' => $item['location_type'], 'title' => $item['title']],
                $item
            );
        }

        $supportCards = [
            [
                'title' => 'WhatsApp Support',
                'description' => null,
                'icon' => 'bi bi-whatsapp',
                'contact_label' => null,
                'contact_value' => '+62 8xx-xxxx-xxxx',
                'button_text' => 'Chat Sekarang',
                'button_link' => '#',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Email Assistance',
                'description' => null,
                'icon' => 'bi bi-envelope',
                'contact_label' => null,
                'contact_value' => 'hello@otobiz.co.id',
                'button_text' => 'Kirim Email',
                'button_link' => '#',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Jam Layanan / Sales Consultation',
                'description' => null,
                'icon' => 'bi bi-clock',
                'contact_label' => null,
                'contact_value' => 'Senin-Jumat, 09.00-17.00',
                'button_text' => 'Jadwalkan Konsultasi',
                'button_link' => '#',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($supportCards as $item) {
            ContactSupportCard::query()->updateOrCreate(
                ['title' => $item['title']],
                $item
            );
        }

        $supportHighlights = [
            [
                'title' => 'Support Highlight',
                'description' => 'Konsultasi awal dan pertanyaan program ditangani secara profesional untuk membantu Anda memilih jalur komunikasi yang paling tepat.',
                'icon' => null,
                'sort_order' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($supportHighlights as $item) {
            ContactSupportHighlight::query()->updateOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}
