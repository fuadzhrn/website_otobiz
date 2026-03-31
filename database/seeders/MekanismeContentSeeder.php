<?php

namespace Database\Seeders;

use App\Models\MekanismeBusinessModel;
use App\Models\MekanismeBusinessModelPoint;
use App\Models\MekanismeContent;
use App\Models\MekanismeFaq;
use App\Models\MekanismeFlowStep;
use App\Models\MekanismeFlowStepPoint;
use App\Models\MekanismeTerm;
use Illuminate\Database\Seeder;

class MekanismeContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MekanismeContent::query()->updateOrCreate(
            ['id' => 1],
            [
                'hero_kicker' => 'Mekanisme Kemitraan OTOBIZ',
                'hero_badge_one' => 'Transparan',
                'hero_badge_two' => 'Terstruktur',
                'hero_badge_three' => 'Profesional',
                'hero_title' => 'Mekanisme Kemitraan Kendaraan yang Jelas, Terstruktur, dan Berbasis Operasional Nyata',
                'hero_description' => 'OTOBIZ menghadirkan sistem kemitraan yang membantu mitra membangun kepemilikan aset kendaraan produktif melalui proses operasional profesional, transparan, dan berorientasi jangka panjang.',
                'hero_primary_button_text' => 'Pelajari Alur Kemitraan',
                'hero_primary_button_link' => '#alur-kemitraan',
                'hero_secondary_button_text' => 'Konsultasi Sekarang',
                'hero_secondary_button_link' => '#mekanisme-cta',
                'business_section_kicker' => 'Fondasi Mekanisme',
                'business_section_title' => 'Model Bisnis Kemitraan',
                'business_section_description' => 'Mekanisme inti OTOBIZ dirancang agar mitra memahami alur kepemilikan aset, pembagian hasil, dan peran setiap pihak secara jelas.',
                'flow_section_kicker' => 'Proses Kemitraan',
                'flow_section_title' => 'Alur Kemitraan',
                'flow_section_description' => 'Setiap tahap disusun agar mitra memahami perjalanan kemitraan dari awal hingga pembagian hasil.',
                'flow_note_text' => 'Mekanisme ini dirancang agar mitra dapat memiliki aset kendaraan produktif melalui sistem yang terkelola, transparan, dan berorientasi jangka panjang.',
                'terms_section_kicker' => 'Informasi Program',
                'terms_section_title' => 'Syarat & Ketentuan',
                'terms_section_description' => 'Ketentuan disusun profesional untuk menjaga kejelasan peran, transparansi proses, dan kualitas operasional program OTOBIZ.',
                'faq_section_kicker' => 'Pertanyaan Umum',
                'faq_section_title' => 'FAQ Kemitraan',
                'faq_section_description' => 'Jawaban singkat dan jelas untuk membantu Anda memahami program kemitraan OTOBIZ.',
                'cta_kicker' => 'Langkah Selanjutnya',
                'cta_title' => 'Siap Memulai Kemitraan Bersama OTOBIZ?',
                'cta_description' => 'Bangun aset kendaraan produktif Anda melalui mekanisme yang jelas, terstruktur, dan dikelola profesional bersama tim OTOBIZ.',
                'cta_primary_button_text' => 'Gabung Mitra',
                'cta_primary_button_link' => '#',
                'cta_secondary_button_text' => 'Konsultasi Sekarang',
                'cta_secondary_button_link' => '#',
                'cta_third_button_text' => 'Hubungi Tim Kami',
                'cta_third_button_link' => '#',
            ]
        );

        $models = [
            [
                'title' => 'Skema Kepemilikan',
                'description' => 'Skema bertahap untuk membangun kepemilikan kendaraan produktif melalui operasional nyata.',
                'icon' => 'bi bi-diagram-3',
                'item_type' => 'ownership',
                'sort_order' => 1,
                'is_active' => true,
                'points' => [
                    'Mitra bergabung dengan program OTOBIZ',
                    'Unit dibeli melalui leasing',
                    'Unit dioperasikan dalam sistem operasional nyata',
                    'Cicilan dibayarkan melalui hasil operasional',
                    'Setelah 5 tahun, unit menjadi milik penuh mitra',
                    'Tersedia peluang growth program atau scale-up unit',
                ],
            ],
            [
                'title' => 'Skema Bagi Hasil',
                'description' => 'Pembagian hasil berbasis performa operasional aktual, bukan janji hasil tetap.',
                'icon' => 'bi bi-pie-chart',
                'item_type' => 'profit_sharing',
                'sort_order' => 2,
                'is_active' => true,
                'points' => [
                    'Pemasukan operasional dihitung dari performa unit',
                    'Dialokasikan untuk cicilan kendaraan',
                    'Dialokasikan untuk biaya perawatan dan operasional',
                    'Sisa bersih tercatat sebagai nett profit',
                    'Pembagian hasil: 60% mitra dan 40% OTOBIZ',
                ],
            ],
            [
                'title' => 'Peran OTOBIZ & Mitra',
                'description' => 'Kolaborasi peran yang jelas agar program berjalan profesional dan terukur.',
                'icon' => 'bi bi-people',
                'item_type' => 'roles',
                'sort_order' => 3,
                'is_active' => true,
                'points' => [
                    'otobiz|Pengelolaan pembelian unit',
                    'otobiz|Operasional driver',
                    'otobiz|Monitoring kendaraan',
                    'otobiz|Pengelolaan cicilan',
                    'otobiz|Laporan berkala kepada mitra',
                    'mitra|Mengikuti proses kemitraan',
                    'mitra|Menyetujui skema program',
                    'mitra|Memiliki hak atas aset sesuai perjanjian',
                    'mitra|Menerima laporan dan hasil pembagian',
                    'mitra|Berpartisipasi sebagai pemilik aset',
                ],
            ],
        ];

        foreach ($models as $item) {
            $model = MekanismeBusinessModel::query()->updateOrCreate(
                ['item_type' => $item['item_type']],
                [
                    'title' => $item['title'],
                    'description' => $item['description'],
                    'icon' => $item['icon'],
                    'item_type' => $item['item_type'],
                    'sort_order' => $item['sort_order'],
                    'is_active' => $item['is_active'],
                ]
            );

            foreach ($item['points'] as $index => $pointText) {
                MekanismeBusinessModelPoint::query()->updateOrCreate(
                    [
                        'mekanisme_business_model_id' => $model->id,
                        'sort_order' => $index + 1,
                    ],
                    [
                        'point_text' => $pointText,
                        'is_active' => true,
                    ]
                );
            }
        }

        $steps = [
            [
                'title' => 'Pendaftaran',
                'sort_order' => 1,
                'points' => [
                    'Konsultasi dan penjelasan program',
                    'Pemahaman skema kemitraan',
                    'Persetujuan awal untuk bergabung',
                ],
            ],
            [
                'title' => 'Onboarding',
                'sort_order' => 2,
                'points' => [
                    'Penandatanganan perjanjian',
                    'Pembayaran kemitraan',
                    'Proses unit masuk ke sistem',
                    'Aktivasi administrasi dan operasional awal',
                ],
            ],
            [
                'title' => 'Operasional Kendaraan',
                'sort_order' => 3,
                'points' => [
                    'Seleksi dan penempatan driver',
                    'Kendaraan masuk ke sistem operasional',
                    'Monitoring performa unit',
                    'Pengelolaan perawatan dan cicilan',
                    'Operasional berjalan terstruktur',
                ],
            ],
            [
                'title' => 'Pembagian Hasil',
                'sort_order' => 4,
                'points' => [
                    'Hasil operasional dihitung',
                    'Biaya terkait dialokasikan',
                    'Keuntungan bersih dibagi sesuai skema',
                    'Laporan rutin diberikan kepada mitra',
                ],
            ],
        ];

        foreach ($steps as $item) {
            $step = MekanismeFlowStep::query()->updateOrCreate(
                ['sort_order' => $item['sort_order']],
                [
                    'title' => $item['title'],
                    'description' => null,
                    'icon' => null,
                    'is_active' => true,
                ]
            );

            foreach ($item['points'] as $index => $pointText) {
                MekanismeFlowStepPoint::query()->updateOrCreate(
                    [
                        'mekanisme_flow_step_id' => $step->id,
                        'sort_order' => $index + 1,
                    ],
                    [
                        'point_text' => $pointText,
                        'is_active' => true,
                    ]
                );
            }
        }

        $terms = [
            ['icon' => 'bi bi-check2-circle', 'description' => 'Program berlaku untuk mitra yang memahami konsep kemitraan operasional.'],
            ['icon' => 'bi bi-graph-up-arrow', 'description' => 'Hasil operasional tidak bersifat tetap dan mengikuti performa aktual unit.'],
            ['icon' => 'bi bi-shield-check', 'description' => 'Unit dikelola sesuai SOP operasional OTOBIZ untuk menjaga kualitas layanan.'],
            ['icon' => 'bi bi-file-earmark-text', 'description' => 'Proses kepemilikan penuh mengikuti masa kemitraan dan ketentuan yang disepakati.'],
            ['icon' => 'bi bi-cash-coin', 'description' => 'Biaya awal, administrasi, dan kebutuhan pendukung mengikuti jenis unit dan program.'],
            ['icon' => 'bi bi-person-check', 'description' => 'Mitra wajib mengikuti proses verifikasi dan persetujuan program.'],
            ['icon' => 'bi bi-journal-text', 'description' => 'Laporan operasional diberikan secara berkala sebagai bentuk transparansi.'],
            ['icon' => 'bi bi-arrow-repeat', 'description' => 'Perubahan teknis dapat mengikuti kondisi operasional dan kebijakan yang berlaku.'],
            ['icon' => 'bi bi-card-checklist', 'description' => 'Syarat lebih lanjut dicantumkan secara lengkap dalam perjanjian tertulis.'],
        ];

        foreach ($terms as $index => $item) {
            MekanismeTerm::query()->updateOrCreate(
                ['sort_order' => $index + 1],
                [
                    'title' => null,
                    'description' => $item['description'],
                    'icon' => $item['icon'],
                    'is_active' => true,
                ]
            );
        }

        $faqs = [
            ['question' => 'Apa itu program kemitraan OTOBIZ?', 'answer' => 'Program kemitraan OTOBIZ adalah skema kepemilikan aset kendaraan produktif berbasis operasional nyata yang dikelola secara profesional.'],
            ['question' => 'Bagaimana cara kerja kepemilikan kendaraan dalam program ini?', 'answer' => 'Unit dikelola dalam operasional aktif, cicilan dibayarkan dari hasil operasional, dan setelah periode kemitraan 5 tahun aset menjadi milik penuh mitra sesuai perjanjian.'],
            ['question' => 'Apakah OTOBIZ menjanjikan hasil tetap?', 'answer' => 'Tidak. OTOBIZ menekankan hasil berbasis performa aktual operasional, bukan imbal hasil tetap.'],
            ['question' => 'Bagaimana sistem pembagian hasil?', 'answer' => 'Setelah alokasi cicilan, perawatan, dan biaya operasional, keuntungan bersih dibagi sesuai skema 60% untuk mitra dan 40% untuk OTOBIZ.'],
            ['question' => 'Siapa yang mengelola operasional kendaraan?', 'answer' => 'Tim OTOBIZ mengelola operasional harian, driver, monitoring unit, dan pelaporan berkala agar proses berjalan konsisten.'],
            ['question' => 'Apakah mitra harus mencari driver sendiri?', 'answer' => 'Tidak harus. Pengelolaan driver merupakan bagian dari operasional yang ditangani OTOBIZ sesuai SOP program.'],
            ['question' => 'Kapan kendaraan menjadi milik penuh mitra?', 'answer' => 'Setelah periode kemitraan berjalan sesuai ketentuan perjanjian, kepemilikan penuh aset dialihkan kepada mitra.'],
            ['question' => 'Apakah tersedia laporan operasional?', 'answer' => 'Ya. OTOBIZ memberikan laporan operasional berkala untuk memastikan transparansi dan kontrol informasi bagi mitra.'],
            ['question' => 'Siapa yang cocok bergabung dengan program ini?', 'answer' => 'Program ini cocok untuk individu yang ingin membangun aset kendaraan produktif dengan sistem kemitraan terstruktur dan pendampingan profesional.'],
            ['question' => 'Apakah ada peluang scale-up setelah periode tertentu?', 'answer' => 'Ada. Mitra berpeluang melakukan scale-up unit berdasarkan evaluasi performa dan kesiapan program lanjutan.'],
        ];

        foreach ($faqs as $index => $item) {
            MekanismeFaq::query()->updateOrCreate(
                ['sort_order' => $index + 1],
                [
                    'question' => $item['question'],
                    'answer' => $item['answer'],
                    'is_active' => true,
                ]
            );
        }
    }
}
