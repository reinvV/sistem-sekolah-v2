<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//---------------------------------------------------------------------------------------------------------------------------------(Data management)

class TeacherController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Guru';
        $teachers = [
            [
                'id' => 1,
                'nip' => '198501012024',
                'name' => 'Budi Santoso',
                'gender' => 'Laki-Laki',
                'subject' => 'Akuntansi Dasar',
                'phone' => '081234560001',
                'status' => 'Aktif',
            ],
            [
                'id' => 2,
                'nip' => '198703152024',
                'name' => 'Siti Aminah',
                'gender' => 'Perempuan',
                'subject' => 'Jaringan Komputer',
                'phone' => '081234560002',
                'status' => 'Aktif',
            ],
        ];

        return view('teachers.index', [
            'title' => $title,
            'teachers' => $teachers
        ]);
    }

//---------------------------------------------------------------------------------------------------------------------------------(Teacher function)

    public function show(string $id)
    {
        $title = 'Sistem Sekolah - Detail Guru';

        $teachers = [
            [
                'id' => 1,
                'nip' => '198501012024',
                'name' => 'Budi Santoso',
                'gender' => 'Laki-Laki',
                'subject' => 'Akuntansi Dasar',
                'phone' => '081234560001',
                'status' => 'Aktif',
            ],
            [
                'id' => 2,
                'nip' => '198703152024',
                'name' => 'Siti Aminah',
                'gender' => 'Perempuan',
                'subject' => 'Jaringan Komputer',
                'phone' => '081234560002',
                'status' => 'Aktif',
            ],
        ];

        $teacher = collect($teachers)->firstWhere('id', (int) $id);

        if (!$teacher) {
            abort(404, 'Guru tidak ditemukan');
        }

        return view('teachers.show', [
            'title' => $title,
            'teacher' => $teacher,
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Catat Guru';

        return view('teachers.create', [
            'title' => $title,
        ]);
    }

    public function edit(string $id)
    {
        $title = 'Sistem Sekolah - Edit Guru';

        $teachers = [
            [
                'id' => 1,
                'nip' => '198501012024',
                'name' => 'Budi Santoso',
                'gender' => 'Laki-Laki',
                'subject' => 'Akuntansi Dasar',
                'phone' => '081234560001',
                'status' => 'Aktif',
            ],
            [
                'id' => 2,
                'nip' => '198703152024',
                'name' => 'Siti Aminah',
                'gender' => 'Perempuan',
                'subject' => 'Jaringan Komputer',
                'phone' => '081234560002',
                'status' => 'Aktif',
            ],
        ];

        $teacher = collect($teachers)->firstWhere('id', (int) $id);

        if (!$teacher) {
            abort(404, 'Guru tidak ditemukan');
        }

        return view('teachers.edit', [
            'title' => $title,
            'teacher' => $teacher,
        ]);
    }

    public function update(string $id)
    {
        return "updating teacher with ID: $id";
    }

    public function destroy(string $id)
    {
        $title = "Sistem Sekolah - Hapus Data Guru";
        return "deleting teacher with ID: $id";
    }

    public function store(Request $request)
    {
        $title = "Sistem Sekolah - Menambah Guru";

        $validated = $request->validate([
            'nip' => 'required|string|max:30',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'subject' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'status' => 'required|in:Aktif,Non-Aktif',
        ]);

        // TODO: persist $validated somewhere real

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil ditambahkan.');
    }
}