<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RsvpController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'guest_count' => ['required', 'integer', 'min:1', 'max:20'],
            'attendance_status' => ['required', 'in:hadir,tidak_hadir,ragu'],
        ]);

        DB::table('rsvp')->insert([
            'name' => $validated['name'],
            'guest_count' => $validated['guest_count'],
            'attendance_status' => $validated['attendance_status'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/#rsvp')->with('rsvp_success', 'Konfirmasi kehadiran berhasil dikirim.');
    }
}
