<?php

namespace Database\Seeders;

use App\Models\AboutContent;
use App\Models\AboutMission;
use App\Models\AboutValue;
use Illuminate\Database\Seeder;

class AboutContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutContent::query()->updateOrCreate(
            ['id' => 1],
            [
                'intro_kicker' => 'Tentang OTOBIZ',
                'intro_section_title' => 'Membangun Aset Produktif Melalui Kemitraan Kendaraan',
                'intro_description' => 'OTOBIZ adalah program kemitraan kepemilikan kendaraan yang dirancang untuk membantu masyarakat memiliki aset mobil produktif melalui sistem operasional profesional. Kami percaya bahwa setiap individu berhak memiliki aset berkualitas dengan skema yang transparan, terstruktur, dan berkelanjutan.',
                'intro_subtext' => 'Dengan pengalaman dalam industri otomotif dan manajemen aset, OTOBIZ hadir untuk membangun ekosistem kemitraan yang saling menguntungkan bagi semua pihak.',
                'vision_section_title' => 'Visi & Misi',
                'vision_section_subtitle' => 'Arah dan komitmen OTOBIZ untuk masa depan',
                'vision_title' => 'Visi Kami',
                'vision_description' => 'Menjadi perusahaan kemitraan kepemilikan kendaraan berbasis operasional nyata yang membangun sistem aset produktif di Indonesia, dan berorientasi jangka panjang.',
                'mission_section_title' => 'Misi Kami',
                'values_section_kicker' => 'Fondasi Bisnis Kami',
                'values_section_title' => 'Nilai & Prinsip Bisnis',
                'values_section_description' => 'Komitmen yang kami pegang teguh dalam setiap operasional',
            ]
        );

        $missions = [
            [
                'title' => 'Misi 1',
                'description' => 'Mengelola kendaraan mitra secara profesional dan terstruktur',
                'icon' => null,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Misi 2',
                'description' => 'Mewujudkan kepemilikan aset melalui skema kemitraan 5 tahun',
                'icon' => null,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Misi 3',
                'description' => 'Menjamin transparansi dan keamanan melalui sistem operasional nyata',
                'icon' => null,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Misi 4',
                'description' => 'Mendukung pertumbuhan industri kendaraan baik listrik maupun lainnya secara nasional',
                'icon' => null,
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($missions as $item) {
            AboutMission::query()->updateOrCreate(
                ['sort_order' => $item['sort_order']],
                $item
            );
        }

        $values = [
            [
                'title' => 'Fokus Kepemilikan Aset',
                'description' => 'Memberikan kesempatan nyata kepada mitra untuk memiliki aset kendaraan berkualitas melalui skema yang terstruktur dan berkelanjutan.',
                'icon' => 'bi bi-houses',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Operasional Nyata',
                'description' => 'Berbasis pada operasional langsung dan terukur, bukan janji hasil yang tidak jelas atau tidak transparan.',
                'icon' => 'bi bi-gear',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Transparansi Sistem',
                'description' => 'Mengutamakan transparansi penuh dalam setiap aspek kemitraan, dari skema hingga hasil operasional.',
                'icon' => 'bi bi-eye',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Keamanan & Laporan',
                'description' => 'Menjaga keamanan aset dan memberikan laporan berkala yang detail kepada setiap mitra secara konsisten.',
                'icon' => 'bi bi-shield-check',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Kemitraan Jangka Panjang',
                'description' => 'Membangun hubungan kemitraan yang solid dan berkelanjutan selama 5 tahun dengan sistem yang terukur.',
                'icon' => 'bi bi-graph-up',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Profesionalisme Penuh',
                'description' => 'Tim profesional yang siap mengelola setiap detail operasional dengan standar kualitas tinggi dan terpercaya.',
                'icon' => 'bi bi-people',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($values as $item) {
            AboutValue::query()->updateOrCreate(
                ['sort_order' => $item['sort_order']],
                $item
            );
        }
    }
}
