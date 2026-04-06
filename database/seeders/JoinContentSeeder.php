<?php

namespace Database\Seeders;

use App\Models\JoinContent;
use App\Models\JoinFormField;
use App\Models\JoinSalesContact;
use App\Models\JoinSalesHighlight;
use App\Models\JoinSelectionStep;
use Illuminate\Database\Seeder;

class JoinContentSeeder extends Seeder
{
    public function run(): void
    {
        $waLink = 'https://wa.me/6285119995965';

        JoinContent::query()->updateOrCreate(
            ['id' => 1],
            [
                'hero_badge_one' => 'Proses Terarah',
                'hero_badge_two' => 'Konsultasi Profesional',
                'hero_badge_three' => 'Sistem Transparan',
                'hero_title' => 'Mulai Langkah Anda Menjadi Mitra OTOBIZ',
                'hero_description' => 'Isi formulir pendaftaran, pahami proses seleksi, dan konsultasikan kebutuhan Anda bersama tim OTOBIZ untuk memulai kemitraan kendaraan produktif.',
                'hero_primary_button_text' => 'Isi Formulir',
                'hero_primary_button_link' => '#gabung-form',
                'hero_secondary_button_text' => 'Konsultasi Sekarang',
                'hero_secondary_button_link' => $waLink,
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
                'cta_secondary_button_link' => $waLink,
            ]
        );

        $formFields = [
            [
                'field_key' => 'full_name',
                'label' => 'Nama Lengkap',
                'field_type' => 'text',
                'placeholder' => null,
                'options_json' => null,
                'sort_order' => 1,
                'is_required' => true,
                'is_active' => true,
            ],
            [
                'field_key' => 'whatsapp',
                'label' => 'Nomor WhatsApp',
                'field_type' => 'tel',
                'placeholder' => null,
                'options_json' => null,
                'sort_order' => 2,
                'is_required' => true,
                'is_active' => true,
            ],
            [
                'field_key' => 'email',
                'label' => 'Email',
                'field_type' => 'email',
                'placeholder' => null,
                'options_json' => null,
                'sort_order' => 3,
                'is_required' => true,
                'is_active' => true,
            ],
            [
                'field_key' => 'city',
                'label' => 'Kota / Domisili',
                'field_type' => 'text',
                'placeholder' => null,
                'options_json' => null,
                'sort_order' => 4,
                'is_required' => true,
                'is_active' => true,
            ],
            [
                'field_key' => 'job',
                'label' => 'Pekerjaan',
                'field_type' => 'text',
                'placeholder' => null,
                'options_json' => null,
                'sort_order' => 5,
                'is_required' => true,
                'is_active' => true,
            ],
            [
                'field_key' => 'program_interest',
                'label' => 'Minat Program',
                'field_type' => 'select',
                'placeholder' => 'Pilih Minat Program',
                'options_json' => [
                    ['value' => 'konvensional', 'label' => 'Konvensional'],
                    ['value' => 'ev', 'label' => 'EV'],
                    ['value' => 'belum-menentukan', 'label' => 'Belum Menentukan'],
                ],
                'sort_order' => 6,
                'is_required' => true,
                'is_active' => true,
            ],
            [
                'field_key' => 'initial_budget',
                'label' => 'Budget Awal / Rencana Bergabung',
                'field_type' => 'text',
                'placeholder' => null,
                'options_json' => null,
                'sort_order' => 7,
                'is_required' => true,
                'is_active' => true,
            ],
            [
                'field_key' => 'message',
                'label' => 'Pesan atau Pertanyaan Tambahan',
                'field_type' => 'textarea',
                'placeholder' => 'Tulis kebutuhan atau pertanyaan Anda...',
                'options_json' => null,
                'sort_order' => 8,
                'is_required' => false,
                'is_active' => true,
            ],
        ];

        foreach ($formFields as $field) {
            JoinFormField::query()->updateOrCreate(
                ['field_key' => $field['field_key']],
                $field
            );
        }

        $steps = [
            [
                'title' => 'Pengajuan Masuk',
                'description' => 'Data pendaftaran diterima oleh tim OTOBIZ dan ditinjau sebagai asesmen awal calon mitra.',
                'icon' => null,
                'sort_order' => 1,
                'is_active' => true,
                'points' => [
                    'Data pendaftaran diterima oleh tim OTOBIZ',
                    'Tim akan meninjau data awal calon mitra',
                ],
            ],
            [
                'title' => 'Konsultasi & Verifikasi',
                'description' => 'Tim menghubungi calon mitra untuk menjelaskan program yang sesuai serta memverifikasi kebutuhan awal.',
                'icon' => null,
                'sort_order' => 2,
                'is_active' => true,
                'points' => [
                    'Tim menghubungi calon mitra',
                    'Menjelaskan program yang sesuai',
                    'Memastikan kesiapan dan kebutuhan awal',
                ],
            ],
            [
                'title' => 'Persetujuan Program',
                'description' => 'Calon mitra memilih program yang tepat dan menyelaraskan skema dengan kesiapan administrasi.',
                'icon' => null,
                'sort_order' => 3,
                'is_active' => true,
                'points' => [
                    'Calon mitra memilih program yang sesuai',
                    'Penyesuaian skema dan kesiapan administrasi',
                ],
            ],
            [
                'title' => 'Masuk ke Tahap Onboarding',
                'description' => 'Proses administrasi lanjutan dimulai untuk implementasi kemitraan secara terarah.',
                'icon' => null,
                'sort_order' => 4,
                'is_active' => true,
                'points' => [
                    'Proses administrasi lanjutan dimulai',
                    'Kemitraan diarahkan ke tahap implementasi program',
                ],
            ],
        ];

        foreach ($steps as $stepData) {
            $points = $stepData['points'];
            unset($stepData['points']);

            $step = JoinSelectionStep::query()->updateOrCreate(
                ['title' => $stepData['title']],
                $stepData
            );

            $step->points()->delete();

            foreach ($points as $index => $pointText) {
                $step->points()->create([
                    'point_text' => $pointText,
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]);
            }
        }

        $salesContacts = [
            [
                'title' => 'Sales Consultation',
                'description' => 'Diskusi langsung terkait pilihan paket, skema, dan target aset Anda.',
                'icon' => 'bi bi-people',
                'contact_label' => 'Jam layanan',
                'contact_value' => 'Senin-Jumat, 09.00-17.00',
                'button_text' => 'Jadwalkan Konsultasi',
                'button_link' => $waLink,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'WhatsApp Support',
                'description' => 'Dapatkan respons cepat untuk pertanyaan awal seputar proses bergabung.',
                'icon' => 'bi bi-whatsapp',
                'contact_label' => 'WhatsApp',
                'contact_value' => '0851 1999 5965',
                'button_text' => 'Hubungi Sekarang',
                'button_link' => $waLink,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Email Assistance',
                'description' => 'Kirim kebutuhan Anda dan tim OTOBIZ akan membantu dengan rekomendasi program.',
                'icon' => 'bi bi-envelope',
                'contact_label' => 'Email',
                'contact_value' => 'info@otobiz.co.id',
                'button_text' => 'Kirim Pesan',
                'button_link' => $waLink,
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($salesContacts as $contact) {
            JoinSalesContact::query()->updateOrCreate(
                ['title' => $contact['title']],
                $contact
            );
        }

        $salesHighlights = [
            [
                'title' => 'Konsultasi Awal',
                'description' => 'Konsultasi awal terkait kebutuhan kemitraan',
                'icon' => 'bi bi-chat-left-dots',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Penjelasan Program',
                'description' => 'Penjelasan program secara bertahap dan transparan',
                'icon' => 'bi bi-info-circle',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Bantuan Memilih Paket',
                'description' => 'Bantuan memilih paket sesuai profil calon mitra',
                'icon' => 'bi bi-ui-checks',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Informasi Proses Bergabung',
                'description' => 'Informasi lengkap tentang proses bergabung',
                'icon' => 'bi bi-diagram-3',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($salesHighlights as $highlight) {
            JoinSalesHighlight::query()->updateOrCreate(
                ['title' => $highlight['title']],
                $highlight
            );
        }
    }
}
