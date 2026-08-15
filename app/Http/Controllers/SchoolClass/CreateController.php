<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;

class CreateController extends Controller
    {
        public function create()
    {
        $title = 'Sistem Sekolah - Catat Kelas';

        return view('classes.create', [
            'title' => $title,
        ]);
    }
    }