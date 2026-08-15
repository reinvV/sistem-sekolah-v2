<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//---------------------------------------------------------------------------------------------------------------------------------(Data management)

class MajorController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Jurusan';
        $majors = [
            [
                'id' => 1,
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.',
            ],
            [
                'id' => 2,
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
            ],
            [
                'id' => 3,
                'code' => 'BD',
                'name' => 'Bisnis Digital',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.',
            ],
        ];

        return view('majors.index', [
            'title' => $title,
            'majors' => $majors,
        ]);
    }

//---------------------------------------------------------------------------------------------------------------------------------(Major function)

    public function show(string $id)
    {
        $title = 'Sistem Sekolah - Detail Jurusan';

        $majors = [
            [
                'id' => 1,
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.',
            ],
            [
                'id' => 2,
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
            ],
            [
                'id' => 3,
                'code' => 'BD',
                'name' => 'Bisnis Digital',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.',
            ],
        ];

        $major = collect($majors)->firstWhere('id', (int) $id);

        if (!$major) {
            abort(404, 'Jurusan tidak ditemukan');
        }

        return view('majors.show', [
            'title' => $title,
            'major' => $major,
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Catat Jurusan';

        return view('majors.create', [
            'title' => $title,
        ]);
    }

    public function edit(string $id)
    {
        $title = 'Sistem Sekolah - Edit Jurusan';

        $majors = [
            [
                'id' => 1,
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.',
            ],
            [
                'id' => 2,
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
            ],
            [
                'id' => 3,
                'code' => 'BD',
                'name' => 'Bisnis Digital',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.',
            ],
        ];

        $major = collect($majors)->firstWhere('id', (int) $id);

        if (!$major) {
            abort(404, 'Jurusan tidak ditemukan');
        }

        return view('majors.edit', [
            'title' => $title,
            'major' => $major,
        ]);
    }

    public function update(string $id)
    {
        return "updating major with ID: $id";
    }

    public function destroy(string $id)
    {
        $title = "Sistem Sekolah - Hapus Data Jurusan";
        return "deleting major with ID: $id";
    }

    public function store(Request $request)
    {
        $title = "Sistem Sekolah - Menambah Jurusan";

        $validated = $request->validate([
            'code' => 'required|string|max:10',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // TODO: persist $validated somewhere real

        return redirect()->route('majors.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }
}