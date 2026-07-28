<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke($id)
    {
        return "Menampilkan siswa dengan ID: {$id}" . $id;
    }
}