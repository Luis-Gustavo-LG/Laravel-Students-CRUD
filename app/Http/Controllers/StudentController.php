<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StudentService;

class StudentController extends Controller
{
    public function __construct(
        private StudentService $studentService
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->studentService->getAllStudents();
        return view('home', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:20',
        ]);

        $this->studentService->createStudent($data);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = $this->studentService->getStudentById($id);
        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = $this->studentService->getStudentById($id);
        return view('edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'required|string|max:20',
        ]);

        $this->studentService->updateStudent($id, $data);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->studentService->deleteStudent($id);

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
