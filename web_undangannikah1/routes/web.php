<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $wishes = [
        [
            'guest_name' => 'Rizky Pratama',
            'message' => 'MasyaAllah, semoga menjadi keluarga yang sakinah, mawaddah, wa rahmah.',
            'created_at' => '12/06/2025 19:40 WIB',
        ],
        [
            'guest_name' => 'Nadya Putri',
            'message' => 'Selamat menempuh hidup baru. Semoga selalu saling menjaga sampai tua.',
            'created_at' => '13/06/2025 08:10 WIB',
        ],
        [
            'guest_name' => 'Keluarga Bapak Santoso',
            'message' => 'Doa terbaik untuk Arjuna dan Sekar. Semoga acara lancar dan penuh berkah.',
            'created_at' => '13/06/2025 21:05 WIB',
        ],
    ];

    $galleryImages = [
        'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1606800052052-a08af7148866?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1529636798458-92182e662485?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=1200&q=80',
    ];

    return view('pages.cover', [
        'opened' => request()->cookie('invitation_opened') === '1',
        'wishes' => $wishes,
        'galleryImages' => $galleryImages,
        'metaTitle' => 'Undangan Pernikahan Arjuna & Sekar',
        'metaDescription' => 'Undangan pernikahan digital Arjuna & Sekar - Sabtu, 14 Juni 2025.',
        'metaImage' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?auto=format&fit=crop&w=1200&q=80',
    ]);
});
