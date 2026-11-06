<section id="galeri" class="mx-auto max-w-6xl px-4 py-16 sm:px-8" data-aos="fade-up">
    <h3 class="section-heading text-center text-4xl sm:text-5xl">Galeri Foto</h3>

    <div class="mt-9 grid grid-cols-2 gap-3 sm:gap-4 md:grid-cols-3">
        @foreach ($galleryImages as $image)
            <button type="button" class="gallery-thumb group" @click="openLightbox('{{ $image }}')">
                <img src="{{ $image }}" alt="Foto pre-wedding" class="h-44 w-full object-cover transition duration-500 group-hover:scale-110 sm:h-56">
            </button>
        @endforeach
    </div>
</section>
