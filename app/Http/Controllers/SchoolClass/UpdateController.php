<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(string $id)
    {
        return "updating class with ID: $id";
    }

    public function destroy(string $id)
    {
        $title = "Sistem Sekolah - Hapus Data Kelas";
        return "deleting class with ID: $id";
    }

    public function store(Request $request)
    {
        $title = "Sistem Sekolah - Menambah Kelas";

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'grade' => 'required|in:X,XI,XII',
            'major' => 'required|in:AKL,TKJ,BiD',
            'homeroom_teacher' => 'required|string|max:255',
        ]);

        // TODO: persist $validated somewhere real

        return redirect()->route('classes.index')->with('success', 'Kelas berhasil ditambahkan.');
    }
}