<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $search = $request->input('search');
        $class = $request->input('class');
        $major = $request->input('major');

        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])
        ->when($search, function($query, $search){
            $query->where(function($query) use ($search){
                $query->where('name', 'Like', "%{$search}%")
                    ->orWhere('nis', 'Like', "%{$search}%");
            });
        })
        ->when($class, fn($query, $class) =>
            $query->where('class', '=', $class)
        )
        ->when($major, fn($query, $major)=>
            $query->where('major', '=', $major)
        )
        ->Paginate(10);

        $schoolclasses = ['10 AKL', '11 AKL', '12 AKL', '10 BID', '11 BID', '12 BID', '10 TKJ', '11 TKJ', '12 TKJ'];
        $majors = ['AKL', 'BID', 'TKJ'];

        return view('students.index',[
            'title' => $title,
            'students' => $students,
            'schoolclasses' => $schoolclasses,
            'majors' => $majors
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Siswa";

        return view('students.create',[
            'title' => $title
        ]);
    }

    public function store(StoreRequest $request)
    {

        $validatedRequest = $request->validated();

        Student::create($validatedRequest);

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        $title = "Sistem Sekolah - Detail Siswa";

        return view('students.show',[
            'title' => $title,
            'student' => $student
        ]);
    }

    public function edit(Student $student)
    {
        $title = "Sistem Sekolah - Edit Siswa";

        return view('students.edit', [
            'title' => $title,
            'student' => $student
        ]);
    }

    public function update(UpdateRequest $request, Student $student)
    {

        $validatedRequest = $request->validated();


        $student->update($validatedRequest);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}