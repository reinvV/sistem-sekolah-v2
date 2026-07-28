<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        return "Menampilkan halaman daftar siswa";
    }

    public function create()
    {
        return "Menampilkan halaman tambah siswa";
    }

    public function store()
    {
        return "Melakukan penambahan data siswa";
    }

    public function show($id)
    {
        return "Menampilkan siswa dengan ID: {$id}";
    }

    public function edit($id)
    {
        return "Menampilkan halaman edit siswa";
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