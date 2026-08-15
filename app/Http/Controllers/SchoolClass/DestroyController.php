<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function destroy(string $id)
    {
        return "deleting Class with ID: $id";
    }
}