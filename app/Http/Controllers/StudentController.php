<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//---------------------------------------------------------------------------------------------------------------------------------(Data management)

class StudentController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Siswa';
        $students = [
            [
                'id' => 1,
                'nis' => '1001',
                'name' => 'Andi',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ',
            ],
            [
                'id' => 2,
                'nis' => '1002',
                'name' => 'Budi',
                'class' => 'XII TKJ 2',
                'major' => 'TKJ',
            ],
            [
                'id' => 3,
                'nis' => '1003',
                'name' => 'NIna',
                'class' => 'XII TKJ 3',
                'major' => 'AKL',
            ]


        ];
        
        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }

//---------------------------------------------------------------------------------------------------------------------------------(Student function)

    public function show(string $id)
    {
        $title = 'Sistem Sekolah - Detail Siswa';

        $students = [
            [
                'id' => 1,
                'nis' => '1001',
                'name' => 'Andi',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ',
            ],
            [
                'id' => 2,
                'nis' => '1002',
                'name' => 'Budi',
                'class' => 'XII TKJ 2',
                'major' => 'TKJ',
            ],
            [
                'id' => 3,
                'nis' => '1003',
                'name' => 'Nina',
                'class' => 'XII TKJ 3',
                'major' => 'AKL',
            ],
        ];

        $student = collect($students)->firstWhere('id', (int) $id);

        if (!$student) {
            abort(404, 'Siswa tidak ditemukan');
        }

        return view('students.show', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Catat Siswa';

        return view('students.create', [
            'title' => $title,
        ]);
        
    }

   public function edit(string $id)
    {
        $title = 'Sistem Sekolah - Edit Siswa';

        $students = [
            ['id' => 1,
            'nis' => '1001',
            'name' => 'Andi',
            'class' => 'XII TKJ 1',
            'major' => 'TKJ',
            'gender' => 'L'
            ],
            ['id' => 2,
            'nis' => '1002',
            'name' => 'Budi',
            'class' => 'XII TKJ 2',
            'major' => 'TKJ',
            'gender' => 'L'
            ],
            ['id' => 3, 'nis' => '1003', 'name' => 'Nina', 'class' => 'XII TKJ 3', 'major' => 'AKL', 'gender' => 'P'],
        ];

        $student = collect($students)->firstWhere('id', (int) $id);

        return view('students.edit', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function update(string $id)
    {
        return "updating students with ID: $id";

        return view('students.update', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function destroy(string $id)
    {
        $title = "Sistem Sekolah - Hapus Data Siswa";
        return "deleting students with ID: $id";
    }

    public function store(Request $request)
{
    $title = "Sistem Sekolah - Menambah";

    $validated = $request->validate([
        'nis' => 'required|string|max:20',
        'name' => 'required|string|max:255',
        'gender' => 'required|in:L,P',
        'major' => 'required|in:AKL,TKJ,BiD',
        'class' => 'required|string|max:50',
    ]);

    // TODO: persist $validated somewhere real (see note below)

    return redirect()->route('students.index')->with('success', 'Siswa berhasil ditambahkan.');
}

    
}