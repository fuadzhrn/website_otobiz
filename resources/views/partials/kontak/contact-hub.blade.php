<section class="contact-hub-section" id="contact-hub" aria-labelledby="contact-hub-title">
    <div class="container">
        <h2 class="sr-only" id="contact-hub-title">Pusat Kontak dan Support OTOBIZ</h2>

        <div class="contact-hub-grid">
            <div class="contact-hub-main fade-up">
                <article class="kontak-form-card" id="contact-form">
                    <div class="kontak-form-card__head">
                        <p class="kontak-form-card__kicker">Hubungi Kami</p>
                        <h3 class="kontak-form-card__title">Form Kontak</h3>
                        <p class="kontak-form-card__desc">
                            Sampaikan kebutuhan, pertanyaan, atau tujuan konsultasi Anda. Tim OTOBIZ akan membantu mengarahkan ke layanan yang paling sesuai.
                        </p>
                    </div>

                    <form id="kontak-form" novalidate>
                        <div class="kontak-form-grid">
                            <label class="kontak-field">
                                <span>Nama Lengkap <em>*</em></span>
                                <input type="text" id="kontak-nama" required>
                                <small class="kontak-error"></small>
                            </label>

                            <label class="kontak-field">
                                <span>Email <em>*</em></span>
                                <input type="email" id="kontak-email" required>
                                <small class="kontak-error"></small>
                            </label>

                            <label class="kontak-field">
                                <span>Nomor WhatsApp <em>*</em></span>
                                <input type="text" id="kontak-whatsapp" required>
                                <small class="kontak-error"></small>
                            </label>

                            <label class="kontak-field">
                                <span>Subjek / Keperluan <em>*</em></span>
                                <input type="text" id="kontak-subjek" required>
                                <small class="kontak-error"></small>
                            </label>

                            <label class="kontak-field kontak-field--full">
                                <span>Jenis Pertanyaan <em>*</em></span>
                                <select id="kontak-jenis" required>
                                    <option value="">Pilih Jenis Pertanyaan</option>
                                    <option value="informasi-umum">Informasi Umum</option>
                                    <option value="konsultasi-kemitraan">Konsultasi Kemitraan</option>
                                    <option value="dukungan-pelanggan">Dukungan Pelanggan</option>
                                    <option value="kerja-sama-lainnya">Kerja Sama / Lainnya</option>
                                </select>
                                <small class="kontak-error"></small>
                            </label>

                            <label class="kontak-field kontak-field--full">
                                <span>Pesan <em>*</em></span>
                                <textarea id="kontak-pesan" rows="5" required></textarea>
                                <small class="kontak-error"></small>
                            </label>
                        </div>

                        <label class="kontak-checkbox">
                            <input type="checkbox" id="kontak-persetujuan" required>
                            <span>Saya bersedia dihubungi oleh tim OTOBIZ terkait pesan yang saya kirimkan.</span>
                        </label>
                        <small class="kontak-error kontak-error--checkbox"></small>

                        <button type="submit" class="btn kontak-btn kontak-btn--primary">Kirim Pesan</button>
                        <p class="kontak-success" id="kontak-success" role="status" aria-live="polite"></p>
                    </form>
                </article>
            </div>

            <aside class="contact-hub-side fade-up delay-1">
                <article class="lokasi-card">
                    <h3 class="lokasi-card__title">Alamat HO &amp; Pool</h3>

                    <div class="lokasi-block">
                        <div class="lokasi-block__label"><i class="bi bi-building"></i><span>Head Office</span></div>
                        <p>Werkspace, Soho Capital, Lt.19 - D2</p>
                        <p>Jl. Let. S. Parman Kav 28, Tanjung Duren Selatan, Jakarta Barat, Indonesia 11470</p>
                    </div>

                    <div class="lokasi-block">
                        <div class="lokasi-block__label"><i class="bi bi-pin-map"></i><span>Pool Operasional</span></div>
                        <p>Informasi lokasi pool akan disesuaikan berdasarkan kebutuhan operasional dan wilayah layanan.</p>
                    </div>

                    <div class="lokasi-map-placeholder">
                        <i class="bi bi-map"></i>
                        <span>Preview Lokasi</span>
                    </div>

                    <div class="lokasi-card__actions">
                        <a href="#" class="btn kontak-btn kontak-btn--ghost">Lihat Lokasi</a>
                        <a href="#" class="btn kontak-btn kontak-btn--ghost">Hubungi Admin Lokasi</a>
                    </div>
                </article>

                <article class="support-card-wrap">
                    <h3 class="support-card-wrap__title">Customer Support</h3>
                    <p class="support-card-wrap__desc">
                        Tim support OTOBIZ siap membantu kebutuhan informasi, tindak lanjut komunikasi, dan dukungan awal untuk calon mitra maupun pelanggan.
                    </p>

                    <div class="support-card-list">
                        <article class="support-card">
                            <i class="bi bi-whatsapp"></i>
                            <div>
                                <h4>WhatsApp Support</h4>
                                <p>+62 8xx-xxxx-xxxx</p>
                            </div>
                            <a href="#" class="support-card__link">Chat Sekarang</a>
                        </article>

                        <article class="support-card">
                            <i class="bi bi-envelope"></i>
                            <div>
                                <h4>Email Assistance</h4>
                                <p>hello@otobiz.co.id</p>
                            </div>
                            <a href="#" class="support-card__link">Kirim Email</a>
                        </article>

                        <article class="support-card">
                            <i class="bi bi-clock"></i>
                            <div>
                                <h4>Jam Layanan / Sales Consultation</h4>
                                <p>Senin-Jumat, 09.00-17.00</p>
                            </div>
                            <a href="#" class="support-card__link">Jadwalkan Konsultasi</a>
                        </article>
                    </div>

                    <div class="support-info-box">
                        <p>Konsultasi awal dan pertanyaan program ditangani secara profesional untuk membantu Anda memilih jalur komunikasi yang paling tepat.</p>
                    </div>
                </article>
            </aside>
        </div>
    </div>
</section>
