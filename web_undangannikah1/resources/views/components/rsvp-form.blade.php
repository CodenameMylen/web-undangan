<section id="rsvp" x-data="rsvpApp()" class="mx-auto max-w-4xl px-4 py-16 sm:px-8" data-aos="fade-up">
    <h3 class="section-heading text-center text-4xl sm:text-5xl">Konfirmasi Kehadiran</h3>

    <div class="glass-card mt-8 rounded-[2rem] p-6 sm:p-8">
        <div x-show="notice" class="mb-4 rounded-xl bg-teal/10 px-4 py-3 text-sm font-semibold text-deepteal" x-text="notice"></div>

        <form @submit.prevent="submitRsvp()" class="space-y-5">
            <div>
                <label for="name" class="mb-2 block text-sm font-bold uppercase tracking-[0.12em]">Nama</label>
                <input id="name" x-model="name" class="w-full rounded-xl border border-gold/50 bg-white/70 px-4 py-3 focus:border-teal focus:outline-none" required>
            </div>

            <div>
                <label for="guest_count" class="mb-2 block text-sm font-bold uppercase tracking-[0.12em]">Jumlah Tamu</label>
                <input id="guest_count" type="number" min="1" max="20" x-model.number="guest_count" class="w-full rounded-xl border border-gold/50 bg-white/70 px-4 py-3 focus:border-teal focus:outline-none" required>
            </div>

            <fieldset>
                <legend class="mb-3 block text-sm font-bold uppercase tracking-[0.12em]">Status Kehadiran</legend>
                <div class="grid gap-3 sm:grid-cols-3">
                    <label class="flex items-center gap-3 rounded-xl border border-gold/40 bg-white/70 px-4 py-3">
                        <input type="radio" x-model="attendance_status" value="hadir" class="text-teal focus:ring-teal">
                        <span>Hadir</span>
                    </label>

                    <label class="flex items-center gap-3 rounded-xl border border-gold/40 bg-white/70 px-4 py-3">
                        <input type="radio" x-model="attendance_status" value="tidak_hadir" class="text-teal focus:ring-teal">
                        <span>Tidak Hadir</span>
                    </label>

                    <label class="flex items-center gap-3 rounded-xl border border-gold/40 bg-white/70 px-4 py-3">
                        <input type="radio" x-model="attendance_status" value="ragu" class="text-teal focus:ring-teal">
                        <span>Masih Ragu</span>
                    </label>
                </div>
            </fieldset>

            <button type="submit" class="w-full rounded-full bg-teal px-6 py-3 font-bold text-white transition hover:bg-deepteal">Konfirmasi</button>
        </form>
    </div>
</section>
