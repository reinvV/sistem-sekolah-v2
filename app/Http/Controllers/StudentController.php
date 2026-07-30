<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $students = [
            [
                'id' => 1,
                'nis' => '1001',
                'name' => 'Andi',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ'
            ],
            [
                'id' => 2,
                'nis' => '1002',
                'name' => 'Budi',
                'class' => 'XII AKL 1',
                'major' => 'AKL'
            ],
        ];
        return view('students.index', [
        'title' => $title,
        'students' => $students
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Siswa";
        return view('students.create');
    }

    public function store()
    {
        return "Melakukan penambahan data siswa";
    }

    public function show($id)
    {
        $title = "Sistem Sekolah - Tampilkan Siswa";
        return view('students.show');
    }

    public function edit($id)
    {
        $title = "Sistem Sekolah - Edit Siswa";
        return view('students.edit');
    }

    public function update(Request $request, $id)
    {
        return "Melakukan perubahan data siswa";
    }

    public function destroy($id)
    {
        return "Menghapus data siswa";
    }
}