<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_name' => ['required', 'string', 'max:120'],
            'message' => ['required', 'string', 'max:1000'],
        ]);

        DB::table('wishes')->insert([
            'guest_name' => $validated['guest_name'],
            'message' => $validated['message'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/#guestbook')->with('wish_success', 'Ucapan dan doa berhasil dikirim.');
    }
}
