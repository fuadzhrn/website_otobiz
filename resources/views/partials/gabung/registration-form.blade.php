<section class="gabung-form-section" id="gabung-form" aria-labelledby="gabung-form-title">
    <div class="container">
        <div class="gabung-head fade-up">
            <p class="gabung-head__kicker">Pendaftaran Mitra</p>
            <h2 class="gabung-head__title" id="gabung-form-title">Form Pendaftaran</h2>
            <p class="gabung-head__desc">Lengkapi data Anda untuk memulai proses konsultasi dan pendaftaran kemitraan bersama OTOBIZ.</p>
        </div>

        <div class="gabung-form-card fade-up delay-1">
            <form id="gabung-registration-form" novalidate>
                <div class="gabung-form-grid">
                    <label class="gabung-field">
                        <span>Nama Lengkap <em>*</em></span>
                        <input type="text" id="nama-lengkap" name="nama_lengkap" required>
                        <small class="gabung-error"></small>
                    </label>

                    <label class="gabung-field">
                        <span>Nomor WhatsApp <em>*</em></span>
                        <input type="text" id="nomor-whatsapp" name="nomor_whatsapp" required>
                        <small class="gabung-error"></small>
                    </label>

                    <label class="gabung-field">
                        <span>Email <em>*</em></span>
                        <input type="email" id="email" name="email" required>
                        <small class="gabung-error"></small>
                    </label>

                    <label class="gabung-field">
                        <span>Kota / Domisili <em>*</em></span>
                        <input type="text" id="kota" name="kota" required>
                        <small class="gabung-error"></small>
                    </label>

                    <label class="gabung-field">
                        <span>Pekerjaan <em>*</em></span>
                        <input type="text" id="pekerjaan" name="pekerjaan" required>
                        <small class="gabung-error"></small>
                    </label>

                    <label class="gabung-field">
                        <span>Minat Program <em>*</em></span>
                        <select id="minat-program" name="minat_program" required>
                            <option value="">Pilih Minat Program</option>
                            <option value="konvensional">Konvensional</option>
                            <option value="ev">EV</option>
                            <option value="belum-menentukan">Belum Menentukan</option>
                        </select>
                        <small class="gabung-error"></small>
                    </label>

                    <label class="gabung-field">
                        <span>Budget Awal / Rencana Bergabung <em>*</em></span>
                        <input type="text" id="budget-awal" name="budget_awal" required>
                        <small class="gabung-error"></small>
                    </label>

                    <label class="gabung-field gabung-field--full">
                        <span>Pesan atau Pertanyaan Tambahan</span>
                        <textarea id="pesan" name="pesan" rows="4" placeholder="Tulis kebutuhan atau pertanyaan Anda..."></textarea>
                        <small class="gabung-error"></small>
                    </label>
                </div>

                <label class="gabung-checkbox">
                    <input type="checkbox" id="persetujuan" name="persetujuan" required>
                    <span>Saya setuju untuk dihubungi oleh tim OTOBIZ terkait konsultasi dan proses kemitraan.</span>
                </label>
                <small class="gabung-error gabung-error--checkbox"></small>

                <div class="gabung-form-actions">
                    <button type="submit" class="btn gabung-btn gabung-btn--primary">Kirim Pendaftaran</button>
                </div>

                <p class="gabung-form-note">Data Anda akan diproses oleh tim OTOBIZ untuk tahap konsultasi awal.</p>
                <p class="gabung-success" id="gabung-success-message" role="status" aria-live="polite"></p>
            </form>
        </div>
    </div>
</section>
