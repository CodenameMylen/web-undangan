<section id="guestbook" x-data="guestbookApp({ initialWishes: @js($wishes) })" class="mx-auto max-w-6xl px-4 py-16 sm:px-8" data-aos="fade-up">
    <h3 class="section-heading text-center text-4xl sm:text-5xl">Ucapan &amp; Doa</h3>

    <div class="mt-8 grid gap-6 lg:grid-cols-2">
        <div class="glass-card rounded-[2rem] p-6 sm:p-8">
            <div x-show="notice" class="mb-4 rounded-xl bg-teal/10 px-4 py-3 text-sm font-semibold text-deepteal" x-text="notice"></div>

            <form @submit.prevent="submitWish()" class="space-y-4">
                <div>
                    <label for="guest_name" class="mb-2 block text-sm font-bold uppercase tracking-[0.12em]">Nama Tamu</label>
                    <input id="guest_name" x-model="guestName" class="w-full rounded-xl border border-gold/50 bg-white/70 px-4 py-3 focus:border-teal focus:outline-none" required>
                </div>

                <div>
                    <label for="message" class="mb-2 block text-sm font-bold uppercase tracking-[0.12em]">Ucapan &amp; Doa</label>
                    <textarea id="message" x-model="message" rows="5" class="w-full rounded-xl border border-gold/50 bg-white/70 px-4 py-3 focus:border-teal focus:outline-none" required></textarea>
                </div>

                <button type="submit" class="w-full rounded-full bg-teal px-6 py-3 font-bold text-white transition hover:bg-deepteal">Kirim</button>
            </form>
        </div>

        <div class="glass-card rounded-[2rem] p-6 sm:p-8">
            <h4 class="font-heading text-3xl">Doa Para Tamu</h4>

            <div class="mt-5 max-h-[460px] space-y-4 overflow-y-auto pr-1" x-show="wishes.length > 0">
                <template x-for="wish in wishes" :key="wish.guest_name + wish.created_at">
                    <article class="rounded-2xl bg-white/75 p-4">
                        <p class="text-sm font-bold uppercase tracking-[0.08em] text-teal" x-text="wish.guest_name"></p>
                        <p class="mt-2 text-base leading-relaxed" x-text="wish.message"></p>
                        <p class="mt-2 text-xs text-textbrown/60" x-text="wish.created_at"></p>
                    </article>
                </template>
            </div>

            <div x-show="wishes.length === 0" class="mt-5 rounded-2xl bg-white/75 p-5 text-sm text-textbrown/80">
                Belum ada ucapan. Jadilah yang pertama mengirim doa terbaik.
            </div>
        </div>
    </div>
</section>
