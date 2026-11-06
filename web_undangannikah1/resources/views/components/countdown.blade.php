<section id="countdown" class="mx-auto max-w-6xl px-4 py-16 sm:px-8" data-aos="fade-up">
    <h3 class="section-heading text-center text-4xl sm:text-5xl">Menuju Hari Bahagia</h3>

    <div x-data="countdownTimer('2025-06-14T08:00:00+07:00')" class="mt-9 flex flex-wrap justify-center gap-3 sm:gap-5">
        <div class="countdown-box rounded-2xl bg-deepteal px-4 py-4 text-center text-white sm:px-5">
            <p class="text-3xl font-black sm:text-4xl" x-text="days"></p>
            <p class="text-xs uppercase tracking-[0.18em]">Hari</p>
        </div>

        <div class="countdown-box rounded-2xl bg-deepteal px-4 py-4 text-center text-white sm:px-5">
            <p class="text-3xl font-black sm:text-4xl" x-text="hours"></p>
            <p class="text-xs uppercase tracking-[0.18em]">Jam</p>
        </div>

        <div class="countdown-box rounded-2xl bg-deepteal px-4 py-4 text-center text-white sm:px-5">
            <p class="text-3xl font-black sm:text-4xl" x-text="minutes"></p>
            <p class="text-xs uppercase tracking-[0.18em]">Menit</p>
        </div>

        <div class="countdown-box rounded-2xl bg-deepteal px-4 py-4 text-center text-white sm:px-5">
            <p class="text-3xl font-black sm:text-4xl" x-text="seconds"></p>
            <p class="text-xs uppercase tracking-[0.18em]">Detik</p>
        </div>
    </div>
</section>
