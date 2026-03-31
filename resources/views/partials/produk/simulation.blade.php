<section class="produk-simulation" id="produk-simulation" aria-labelledby="produk-simulation-title">
    <div class="container">
        <div class="produk-head fade-up">
            <p class="produk-head__kicker">{{ $productContent->simulation_section_kicker ?? 'Business Calculator' }}</p>
            <h2 class="produk-head__title" id="produk-simulation-title">{{ $productContent->simulation_section_title ?? 'Simulasi Keuntungan' }}</h2>
            <p class="produk-head__desc">{{ $productContent->simulation_section_description ?? 'Hitung ilustrasi hasil operasional bulanan untuk memahami potensi pembagian hasil program kemitraan OTOBIZ.' }}</p>
        </div>

        <div class="produk-simulation__layout">
            <article class="produk-calculator fade-up">
                <h3 class="produk-calculator__title">Kalkulator Simulasi</h3>
                <div class="produk-calculator__form">
                    <label class="produk-field">
                        <span>{{ $simulationContent->daily_deposit_label ?? 'Setoran Driver per Hari (Rp)' }}</span>
                        <input type="number" id="setoran-harian" value="450000" min="0">
                    </label>
                    <label class="produk-field">
                        <span>{{ $simulationContent->operating_days_label ?? 'Hari Operasional per Bulan' }}</span>
                        <input type="number" id="hari-operasional" value="24" min="0">
                    </label>
                    <label class="produk-field">
                        <span>{{ $simulationContent->operating_cost_label ?? 'Estimasi Biaya Operasional (Rp)' }}</span>
                        <input type="number" id="biaya-operasional" value="2500000" min="0">
                    </label>
                    <label class="produk-field">
                        <span>{{ $simulationContent->installment_label ?? 'Estimasi Cicilan (Rp)' }}</span>
                        <input type="number" id="biaya-cicilan" value="3500000" min="0">
                    </label>
                </div>
                <button type="button" id="btn-hitung-simulasi" class="btn produk-btn produk-btn--primary produk-btn--full">Hitung Simulasi</button>
                <p class="produk-simulation__disclaimer">{{ $productContent->simulation_disclaimer ?? 'Simulasi ini adalah ilustrasi berdasarkan performa operasional dan bukan janji hasil tetap.' }}</p>
            </article>

            <article class="produk-result-card fade-up delay-1" id="simulasi-hasil" data-partner-share="{{ $simulationContent->partner_share_percentage ?? 60 }}" data-otobiz-share="{{ $simulationContent->otobiz_share_percentage ?? 40 }}">
                <h3 class="produk-result-card__title">Hasil Simulasi</h3>
                <div class="produk-result-list">
                    <div class="produk-result-list__row"><span>{{ $simulationContent->result_total_operational_label ?? 'Total Operasional' }}</span><strong id="hasil-total-operasional">Rp 10.800.000</strong></div>
                    <div class="produk-result-list__row"><span>{{ $simulationContent->result_net_profit_label ?? 'Nett Profit' }}</span><strong id="hasil-nett-profit">Rp 4.800.000</strong></div>
                    <div class="produk-result-list__row"><span>{{ ($simulationContent->result_partner_share_label ?? 'Bagian Mitra') . ' (' . ($simulationContent->partner_share_percentage ?? 60) . '%)' }}</span><strong id="hasil-bagian-mitra">Rp 2.880.000</strong></div>
                    <div class="produk-result-list__row"><span>{{ ($simulationContent->result_otobiz_share_label ?? 'Bagian OTOBIZ') . ' (' . ($simulationContent->otobiz_share_percentage ?? 40) . '%)' }}</span><strong id="hasil-bagian-otobiz">Rp 1.920.000</strong></div>
                </div>

                <div class="produk-simulation-points">
                    @forelse (($simulationHighlights ?? collect()) as $highlight)
                        <p>{{ $highlight->title }}</p>
                    @empty
                        <p>Kendaraan dikelola profesional</p>
                        <p>Cicilan dibayarkan melalui sistem operasional</p>
                        <p>Setelah 5 tahun unit menjadi milik penuh mitra</p>
                        <p>Tersedia growth program untuk multiply unit</p>
                    @endforelse
                </div>
            </article>
        </div>
    </div>
</section>
