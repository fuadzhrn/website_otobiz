<?php

namespace Database\Seeders;

use App\Models\HomeContent;
use App\Models\HomeStat;
use App\Models\HomeSummaryStep;
use App\Models\HomeValueItem;
use Illuminate\Database\Seeder;

class HomeContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeContent::query()->updateOrCreate(
            ['id' => 1],
            [
                'hero_badge_text' => 'Kemitraan Aset Produktif Berbasis Operasional Nyata',
                'hero_title' => 'Bangun Aset Kendaraan Anda Bersama Sistem Kemitraan yang Terukur',
                'hero_description' => 'OTOBIZ menghadirkan model kemitraan kepemilikan kendaraan yang dikelola profesional, dengan alur operasional jelas, laporan berkala, dan pendampingan agar unit berkembang menjadi aset jangka panjang yang produktif.',
                'hero_primary_button_text' => 'Gabung Mitra',
                'hero_primary_button_link' => '#gabung',
                'hero_secondary_button_text' => 'Pelajari Kemitraan',
                'hero_secondary_button_link' => '#mekanisme',
                'value_section_title' => 'Keunggulan Kemitraan OTOBIZ',
                'value_section_description' => null,
                'summary_section_title' => 'Alur Kemitraan yang Mudah Dipahami',
                'summary_section_description' => null,
                'stats_section_title' => 'Kredibilitas yang Bisa Anda Lihat',
                'stats_section_description' => null,
                'cta_title' => 'Mulai Perjalanan Kemitraan Kendaraan Anda Bersama OTOBIZ',
                'cta_description' => 'Diskusikan kebutuhan Anda bersama tim kami dan temukan skema kemitraan yang paling sesuai untuk target aset jangka panjang.',
                'cta_button_text' => 'Gabung Mitra Sekarang',
                'cta_button_link' => '#kontak',
            ]
        );

        $valueItems = [
            [
                'title' => 'Aset Produktif',
                'description' => 'Unit kendaraan dioptimalkan untuk menghasilkan nilai melalui skema operasional yang terarah.',
                'icon' => 'bi bi-graph-up-arrow',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Dikelola Profesional',
                'description' => 'Proses pengelolaan dilakukan oleh tim berpengalaman dengan standar kerja yang konsisten.',
                'icon' => 'bi bi-briefcase-fill',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Sistem Transparan',
                'description' => 'Mitra menerima informasi performa, status unit, serta progress pembayaran secara periodik.',
                'icon' => 'bi bi-eye-fill',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Operasional Nyata',
                'description' => 'Model kemitraan berbasis aktivitas lapangan yang nyata, terukur, dan memiliki target jelas.',
                'icon' => 'bi bi-diagram-3-fill',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($valueItems as $item) {
            HomeValueItem::query()->updateOrCreate(
                ['sort_order' => $item['sort_order']],
                $item
            );
        }

        $summarySteps = [
            [
                'title' => 'Gabung Kemitraan',
                'description' => 'Mitra mendaftar, konsultasi kebutuhan, lalu menentukan skema unit kendaraan.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Unit Diproses',
                'description' => 'Dokumen, persiapan unit, dan penempatan operasional disiapkan secara profesional.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Operasional Berjalan',
                'description' => 'Unit mulai beroperasi pada sistem yang sudah terstruktur dengan monitoring rutin.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Pembayaran Cicilan',
                'description' => 'Aliran pembayaran didukung hasil operasional sesuai mekanisme yang disepakati.',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Unit Menjadi Milik Mitra',
                'description' => 'Setelah periode kemitraan, kepemilikan unit beralih penuh kepada mitra.',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($summarySteps as $step) {
            HomeSummaryStep::query()->updateOrCreate(
                ['sort_order' => $step['sort_order']],
                $step
            );
        }

        $stats = [
            [
                'number' => '150+',
                'label' => 'Mitra Terdaftar',
                'description' => null,
                'icon' => 'bi bi-buildings',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'number' => '300+',
                'label' => 'Unit Dimonitor Aktif',
                'description' => null,
                'icon' => 'bi bi-truck-front-fill',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'number' => '100%',
                'label' => 'Laporan Berkala Terdokumentasi',
                'description' => null,
                'icon' => 'bi bi-file-earmark-check-fill',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'number' => '24/7',
                'label' => 'Pendampingan & Support Operasional',
                'description' => null,
                'icon' => 'bi bi-shield-fill-check',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($stats as $stat) {
            HomeStat::query()->updateOrCreate(
                ['sort_order' => $stat['sort_order']],
                $stat
            );
        }
    }
}
