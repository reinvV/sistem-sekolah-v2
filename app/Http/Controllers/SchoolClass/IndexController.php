<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke($id)
    {
        return "Menampilkan halaman daftar siswa";
    }
}