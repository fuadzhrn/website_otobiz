<section class="produk-simulation" id="produk-simulation" aria-labelledby="produk-simulation-title">
    <div class="container">
        <div class="produk-head fade-up">
            <p class="produk-head__kicker">Business Calculator</p>
            <h2 class="produk-head__title" id="produk-simulation-title">Simulasi Keuntungan</h2>
            <p class="produk-head__desc">Hitung ilustrasi hasil operasional bulanan untuk memahami potensi pembagian hasil program kemitraan OTOBIZ.</p>
        </div>

        <div class="produk-simulation__layout">
            <article class="produk-calculator fade-up">
                <h3 class="produk-calculator__title">Kalkulator Simulasi</h3>
                <div class="produk-calculator__form">
                    <label class="produk-field">
                        <span>Setoran Driver per Hari (Rp)</span>
                        <input type="number" id="setoran-harian" value="450000" min="0">
                    </label>
                    <label class="produk-field">
                        <span>Hari Operasional per Bulan</span>
                        <input type="number" id="hari-operasional" value="24" min="0">
                    </label>
                    <label class="produk-field">
                        <span>Estimasi Biaya Operasional (Rp)</span>
                        <input type="number" id="biaya-operasional" value="2500000" min="0">
                    </label>
                    <label class="produk-field">
                        <span>Estimasi Cicilan (Rp)</span>
                        <input type="number" id="biaya-cicilan" value="3500000" min="0">
                    </label>
                </div>
                <button type="button" id="btn-hitung-simulasi" class="btn produk-btn produk-btn--primary produk-btn--full">Hitung Simulasi</button>
                <p class="produk-simulation__disclaimer">Simulasi ini adalah ilustrasi berdasarkan performa operasional dan bukan janji hasil tetap.</p>
            </article>

            <article class="produk-result-card fade-up delay-1" id="simulasi-hasil">
                <h3 class="produk-result-card__title">Hasil Simulasi</h3>
                <div class="produk-result-list">
                    <div class="produk-result-list__row"><span>Total Operasional</span><strong id="hasil-total-operasional">Rp 10.800.000</strong></div>
                    <div class="produk-result-list__row"><span>Nett Profit</span><strong id="hasil-nett-profit">Rp 4.800.000</strong></div>
                    <div class="produk-result-list__row"><span>Bagian Mitra (60%)</span><strong id="hasil-bagian-mitra">Rp 2.880.000</strong></div>
                    <div class="produk-result-list__row"><span>Bagian OTOBIZ (40%)</span><strong id="hasil-bagian-otobiz">Rp 1.920.000</strong></div>
                </div>

                <div class="produk-simulation-points">
                    <p>Kendaraan dikelola profesional</p>
                    <p>Cicilan dibayarkan melalui sistem operasional</p>
                    <p>Setelah 5 tahun unit menjadi milik penuh mitra</p>
                    <p>Tersedia growth program untuk multiply unit</p>
                </div>
            </article>
        </div>
    </div>
</section>
