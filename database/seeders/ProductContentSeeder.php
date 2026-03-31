<?php

namespace Database\Seeders;

use App\Models\ProductContent;
use App\Models\ProductPackage;
use App\Models\ProductSimulationContent;
use App\Models\ProductSimulationHighlight;
use App\Models\ProductUnit;
use Illuminate\Database\Seeder;

class ProductContentSeeder extends Seeder
{
    public function run(): void
    {
        ProductContent::query()->updateOrCreate(
            ['id' => 1],
            [
                'hero_badge_text' => 'OTOBIZ Product Line',
                'hero_title' => 'Pilih Paket Kemitraan Kendaraan Produktif Anda',
                'hero_description' => 'Dari kendaraan konvensional hingga EV, OTOBIZ membantu Anda memiliki aset yang bekerja secara profesional.',
                'hero_primary_button_text' => 'Konsultasi Sekarang',
                'hero_primary_button_link' => '#produk-simulation',
                'hero_secondary_button_text' => 'Pilih Paket',
                'hero_secondary_button_link' => '#produk-packages',
                'hero_trust_text' => 'Terstruktur. Transparan. Berorientasi aset jangka panjang.',
                'packages_section_kicker' => 'Paket Program',
                'packages_section_title' => 'Paket Kemitraan',
                'packages_section_description' => 'Pilih paket sesuai preferensi kendaraan dan target pengembangan aset produktif Anda.',
                'packages_section_note' => 'Harga dapat berubah sewaktu-waktu berdasarkan kuota. Syarat & ketentuan berlaku.',
                'units_section_kicker' => 'Portfolio Kendaraan',
                'units_section_title' => 'Daftar Unit',
                'units_section_description' => 'Pilih kategori unit untuk melihat opsi kendaraan yang tersedia dalam program kemitraan OTOBIZ.',
                'specs_section_kicker' => 'Detail Unit',
                'specs_section_title' => 'Spesifikasi & Galeri',
                'specs_section_description' => 'Bandingkan detail unit berdasarkan kebutuhan operasional bisnis Anda.',
                'simulation_section_kicker' => 'Business Calculator',
                'simulation_section_title' => 'Simulasi Keuntungan',
                'simulation_section_description' => 'Hitung ilustrasi hasil operasional bulanan untuk memahami potensi pembagian hasil program kemitraan OTOBIZ.',
                'simulation_disclaimer' => 'Simulasi ini adalah ilustrasi berdasarkan performa operasional dan bukan janji hasil tetap.',
                'cta_title' => 'Temukan Paket Kemitraan yang Paling Sesuai untuk Anda',
                'cta_description' => 'Tim OTOBIZ siap membantu Anda memilih paket berdasarkan target aset, profil operasional, dan rencana pertumbuhan bisnis Anda.',
                'cta_primary_button_text' => 'Konsultasi Sekarang',
                'cta_primary_button_link' => '#',
                'cta_secondary_button_text' => 'Ajukan Kemitraan',
                'cta_secondary_button_link' => '#',
                'cta_third_button_text' => 'Hubungi Tim Kami',
                'cta_third_button_link' => '#',
            ]
        );

        $packagesData = [
            [
                'name' => 'Founding Partner Wuling Confero',
                'category' => 'Konvensional',
                'badge_text' => 'Konvensional',
                'is_popular' => false,
                'partnership_price' => 'Rp 27.500.000',
                'starting_price' => 'Rp 7.500.000',
                'description' => null,
                'cta_text' => 'Pilih Paket',
                'cta_link' => '#',
                'sort_order' => 1,
                'is_active' => true,
                'benefits' => [
                    'DP unit',
                    'Asuransi awal',
                    'Biaya legal, pajak & administrasi',
                    'GPS external',
                ],
            ],
            [
                'name' => 'Founding Partner VinFast Limo Green',
                'category' => 'EV',
                'badge_text' => 'Electric Vehicle',
                'is_popular' => true,
                'partnership_price' => 'Rp 36.500.000',
                'starting_price' => 'Rp 7.500.000',
                'description' => null,
                'cta_text' => 'Pilih Paket',
                'cta_link' => '#',
                'sort_order' => 2,
                'is_active' => true,
                'benefits' => [
                    'DP unit',
                    'Asuransi awal',
                    'Biaya legal, pajak & administrasi',
                    'GPS external',
                ],
            ],
        ];

        foreach ($packagesData as $packageData) {
            $benefits = $packageData['benefits'];
            unset($packageData['benefits']);

            $package = ProductPackage::query()->updateOrCreate(
                ['name' => $packageData['name']],
                $packageData
            );

            $package->benefits()->delete();
            foreach ($benefits as $index => $benefitText) {
                $package->benefits()->create([
                    'benefit_text' => $benefitText,
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]);
            }
        }

        $unitsData = [
            [
                'name' => 'Wuling Confero',
                'category' => 'Konvensional',
                'unit_type' => 'MPV',
                'status' => 'Tersedia',
                'short_description' => 'Cocok untuk operasional harian dan kebutuhan transportasi online maupun B2B.',
                'energy_type' => 'Bensin',
                'capacity' => 'Family / operasional multi-penumpang',
                'operational_use' => 'Transportasi online dan B2B',
                'main_advantages' => 'Kabin lega, cocok untuk operasional, nilai kemitraan terjangkau',
                'main_image' => 'https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?auto=format&fit=crop&w=1200&q=80',
                'badge_text' => 'Konvensional',
                'sort_order' => 1,
                'is_active' => true,
                'galleries' => [
                    ['https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?auto=format&fit=crop&w=1400&q=80', 'Wuling Confero tampak depan'],
                    ['https://images.unsplash.com/photo-1549924231-f129b911e442?auto=format&fit=crop&w=1400&q=80', 'Wuling Confero tampak samping'],
                    ['https://images.unsplash.com/photo-1550355291-bbee04a92027?auto=format&fit=crop&w=1400&q=80', 'Wuling Confero interior'],
                ],
            ],
            [
                'name' => 'VinFast Limo Green',
                'category' => 'EV',
                'unit_type' => 'Electric Mobility',
                'status' => 'Tersedia',
                'short_description' => 'Kendaraan listrik modern dengan efisiensi operasional untuk bisnis mobilitas masa kini.',
                'energy_type' => 'Listrik',
                'capacity' => 'Operasional urban modern',
                'operational_use' => 'Transportasi online modern dan efisiensi mobilitas',
                'main_advantages' => 'Lebih efisien, modern, ramah lingkungan, cocok untuk tren kendaraan masa depan',
                'main_image' => 'https://images.unsplash.com/photo-1593941707882-a5bac6861d75?auto=format&fit=crop&w=1200&q=80',
                'badge_text' => 'EV',
                'sort_order' => 2,
                'is_active' => true,
                'galleries' => [
                    ['https://images.unsplash.com/photo-1593941707882-a5bac6861d75?auto=format&fit=crop&w=1400&q=80', 'VinFast Limo Green tampak depan'],
                    ['https://images.unsplash.com/photo-1560958089-b8a1929cea89?auto=format&fit=crop&w=1400&q=80', 'Kendaraan listrik tampak samping'],
                    ['https://images.unsplash.com/photo-1592853625601-bb9d23da12fc?auto=format&fit=crop&w=1400&q=80', 'Charging EV modern'],
                ],
            ],
        ];

        foreach ($unitsData as $unitData) {
            $galleries = $unitData['galleries'];
            unset($unitData['galleries']);

            $unit = ProductUnit::query()->updateOrCreate(
                ['name' => $unitData['name']],
                $unitData
            );

            $unit->galleries()->delete();
            foreach ($galleries as $index => $gallery) {
                $unit->galleries()->create([
                    'image_path' => $gallery[0],
                    'alt_text' => $gallery[1],
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]);
            }
        }

        ProductSimulationContent::query()->updateOrCreate(
            ['id' => 1],
            [
                'intro_text' => 'Hitung ilustrasi hasil operasional bulanan untuk memahami potensi pembagian hasil program kemitraan OTOBIZ.',
                'daily_deposit_label' => 'Setoran Driver per Hari (Rp)',
                'operating_days_label' => 'Hari Operasional per Bulan',
                'operating_cost_label' => 'Estimasi Biaya Operasional (Rp)',
                'installment_label' => 'Estimasi Cicilan (Rp)',
                'result_total_operational_label' => 'Total Operasional',
                'result_net_profit_label' => 'Nett Profit',
                'result_partner_share_label' => 'Bagian Mitra',
                'result_otobiz_share_label' => 'Bagian OTOBIZ',
                'partner_share_percentage' => 60,
                'otobiz_share_percentage' => 40,
            ]
        );

        $highlightRows = [
            [
                'title' => 'Kendaraan dikelola profesional',
                'description' => null,
                'icon' => null,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Cicilan dibayarkan melalui sistem operasional',
                'description' => null,
                'icon' => null,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Setelah 5 tahun unit menjadi milik penuh mitra',
                'description' => null,
                'icon' => null,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Tersedia growth program untuk multiply unit',
                'description' => null,
                'icon' => null,
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        ProductSimulationHighlight::query()->delete();
        ProductSimulationHighlight::query()->insert(array_map(function (array $row): array {
            $timestamp = now();
            return array_merge($row, [
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);
        }, $highlightRows));
    }
}
