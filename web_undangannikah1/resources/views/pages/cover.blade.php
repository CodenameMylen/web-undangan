@extends('layouts.app')

@section('content')
<div x-data="invitationApp({ openedFromCookie: @js($opened) })" x-cloak class="relative">
    <audio x-ref="bgm" preload="none" loop>
        <source src="https://cdn.pixabay.com/download/audio/2022/08/23/audio_0f17302f52.mp3?filename=wedding-piano-116199.mp3" type="audio/mpeg">
    </audio>

    <section
        x-show="!isOpen"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-700"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-30 overflow-y-auto paper-texture"
    >
        <div class="relative flex min-h-screen items-center justify-center px-4 py-10 sm:px-6">
            <div class="absolute left-0 top-0 h-full w-full opacity-60" style="background: radial-gradient(circle at 10% 20%, rgba(201,169,110,0.16), transparent 36%), radial-gradient(circle at 90% 95%, rgba(45,106,106,0.12), transparent 40%);"></div>

            <div class="floral-corner bottom-0 left-0">
                <svg viewBox="0 0 220 220" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="60" cy="160" r="42" fill="#f4d7d9"/>
                    <circle cx="112" cy="148" r="30" fill="#f8ede7"/>
                    <circle cx="146" cy="175" r="24" fill="#cf596f" fill-opacity="0.72"/>
                    <path d="M12 210C68 182 124 170 206 180" stroke="#6e8a68" stroke-width="7" stroke-linecap="round"/>
                    <path d="M34 198C62 178 88 156 106 130" stroke="#8cab84" stroke-width="5" stroke-linecap="round"/>
                </svg>
            </div>

            <div class="floral-corner bottom-0 right-0 rotate-[-8deg]">
                <svg viewBox="0 0 220 220" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="163" cy="151" r="38" fill="#f7d4da"/>
                    <circle cx="106" cy="166" r="30" fill="#fff2e1"/>
                    <circle cx="60" cy="182" r="26" fill="#bf3f63" fill-opacity="0.68"/>
                    <path d="M208 212C150 182 95 171 20 178" stroke="#6e8a68" stroke-width="7" stroke-linecap="round"/>
                    <path d="M190 199C157 171 130 152 112 120" stroke="#8cab84" stroke-width="5" stroke-linecap="round"/>
                </svg>
            </div>

            <div class="relative w-full max-w-xl rounded-[2rem] border border-white/70 bg-white/65 px-5 pb-8 pt-6 shadow-soft backdrop-blur-md sm:px-10 sm:pt-8">
                <div class="mx-auto mb-5 h-5 w-44 max-w-[85%] rounded-full bg-[linear-gradient(90deg,#cab48f,#e3d6bf,#cab48f)] opacity-75"></div>

                <div class="mx-auto mb-6 w-full max-w-[290px]">
                    <div class="golden-oval aspect-[3/4] bg-[#efe4d2] p-2">
                        <img
                            src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=80"
                            alt="Foto pasangan"
                            class="h-full w-full rounded-[999px] object-cover"
                        >
                    </div>
                </div>

                <p class="text-center text-sm tracking-[0.2em] text-textbrown/70">WE INVITE YOU TO THE WEDDING OF</p>
                <h1 class="mt-3 text-center font-heading text-4xl leading-tight text-textbrown sm:text-5xl">Arjuna &amp; Sekar</h1>

                <div class="mt-7 flex justify-center">
                    <button
                        type="button"
                        @click="openInvitation()"
                        class="rounded-full bg-teal px-8 py-3 text-lg font-bold text-white transition hover:bg-deepteal focus:outline-none focus:ring-2 focus:ring-gold"
                    >
                        Buka Undangan &#128140;
                    </button>
                </div>
            </div>
        </div>
    </section>

    <main
        id="main-content"
        class="transition-opacity duration-700"
        :class="isOpen ? 'opacity-100' : 'opacity-0 pointer-events-none h-screen overflow-hidden'"
    >
        @include('pages.invitation', ['wishes' => $wishes, 'galleryImages' => $galleryImages])
    </main>

    <div
        x-show="lightboxOpen"
        x-transition.opacity
        @keydown.escape.window="closeLightbox()"
        @click.self="closeLightbox()"
        class="lightbox-backdrop fixed inset-0 z-50 flex items-center justify-center px-4"
    >
        <button @click="closeLightbox()" class="absolute right-5 top-5 text-4xl font-light text-white">&times;</button>
        <img :src="lightboxImage" alt="Foto galeri" class="max-h-[90vh] w-full max-w-4xl rounded-2xl object-cover shadow-soft">
    </div>

    <button
        type="button"
        @click="toggleAudio()"
        class="fixed bottom-5 right-4 z-40 rounded-full bg-teal px-4 py-3 text-xs font-bold uppercase tracking-wider text-white shadow-soft transition hover:bg-deepteal sm:bottom-6 sm:right-8 sm:text-sm"
    >
        <span x-show="audioPlaying">Musik: On</span>
        <span x-show="!audioPlaying">Musik: Off</span>
    </button>
</div>
@endsection
