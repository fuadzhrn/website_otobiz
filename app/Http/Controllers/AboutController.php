<?php

namespace App\Http\Controllers;

use App\Models\AboutContent;
use App\Models\AboutMission;
use App\Models\AboutValue;

class AboutController extends Controller
{
    public function index()
    {
        $aboutContent = AboutContent::query()->first();

        if (!$aboutContent) {
            $aboutContent = (object) [
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
            ];
        }

        $missions = AboutMission::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        if ($missions->isEmpty()) {
            $missions = collect([
                (object) ['title' => 'Misi 1', 'description' => 'Mengelola kendaraan mitra secara profesional dan terstruktur', 'icon' => null],
                (object) ['title' => 'Misi 2', 'description' => 'Mewujudkan kepemilikan aset melalui skema kemitraan 5 tahun', 'icon' => null],
                (object) ['title' => 'Misi 3', 'description' => 'Menjamin transparansi dan keamanan melalui sistem operasional nyata', 'icon' => null],
                (object) ['title' => 'Misi 4', 'description' => 'Mendukung pertumbuhan industri kendaraan baik listrik maupun lainnya secara nasional', 'icon' => null],
            ]);
        }

        $values = AboutValue::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        if ($values->isEmpty()) {
            $values = collect([
                (object) ['title' => 'Fokus Kepemilikan Aset', 'description' => 'Memberikan kesempatan nyata kepada mitra untuk memiliki aset kendaraan berkualitas melalui skema yang terstruktur dan berkelanjutan.', 'icon' => 'bi bi-houses'],
                (object) ['title' => 'Operasional Nyata', 'description' => 'Berbasis pada operasional langsung dan terukur, bukan janji hasil yang tidak jelas atau tidak transparan.', 'icon' => 'bi bi-gear'],
                (object) ['title' => 'Transparansi Sistem', 'description' => 'Mengutamakan transparansi penuh dalam setiap aspek kemitraan, dari skema hingga hasil operasional.', 'icon' => 'bi bi-eye'],
                (object) ['title' => 'Keamanan & Laporan', 'description' => 'Menjaga keamanan aset dan memberikan laporan berkala yang detail kepada setiap mitra secara konsisten.', 'icon' => 'bi bi-shield-check'],
                (object) ['title' => 'Kemitraan Jangka Panjang', 'description' => 'Membangun hubungan kemitraan yang solid dan berkelanjutan selama 5 tahun dengan sistem yang terukur.', 'icon' => 'bi bi-graph-up'],
                (object) ['title' => 'Profesionalisme Penuh', 'description' => 'Tim profesional yang siap mengelola setiap detail operasional dengan standar kualitas tinggi dan terpercaya.', 'icon' => 'bi bi-people'],
            ]);
        }

        return view('tentang', [
            'aboutContent' => $aboutContent,
            'missions' => $missions,
            'values' => $values,
        ]);
    }
}
