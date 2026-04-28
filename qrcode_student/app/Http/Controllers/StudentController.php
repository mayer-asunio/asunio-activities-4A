<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        // SEARCH
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%$search%")
                  ->orWhere('last_name', 'like', "%$search%")
                  ->orWhere('id_number', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        // FILTER: Department
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // FILTER: Year Level
        if ($request->filled('year_level')) {
            $query->where('year_level', $request->year_level);
        }

        // ✅ SAFE ORDER (no created_at error)
        $students = $query->orderBy('id', 'desc')->paginate(12);

        $departments = Student::distinct()->pluck('department');
        $yearLevels = Student::distinct()->pluck('year_level');

        return view('students.index', compact('students', 'departments', 'yearLevels'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_number' => 'required|unique:students,id_number',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string|max:20',
            'department' => 'required|string|max:255',
            'year_level' => 'required|string|max:50',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload picture
        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('students', 'public');
        }

        // Create student
        $student = new Student($validated);

        // Generate QR data
        $student->qr_code = json_encode([
            'id_number' => $validated['id_number'],
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'department' => $validated['department'],
            'year_level' => $validated['year_level'],
        ]);

        $student->save();

        return redirect()->route('students.show', $student)
            ->with('success', 'Student created successfully!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'id_number' => 'required|unique:students,id_number,' . $student->id,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|string|max:20',
            'department' => 'required|string|max:255',
            'year_level' => 'required|string|max:50',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Replace picture
        if ($request->hasFile('picture')) {

            if ($student->picture && Storage::disk('public')->exists($student->picture)) {
                Storage::disk('public')->delete($student->picture);
            }

            $validated['picture'] = $request->file('picture')->store('students', 'public');
        }

        // Update QR
        $validated['qr_code'] = json_encode([
            'id_number' => $validated['id_number'],
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'department' => $validated['department'],
            'year_level' => $validated['year_level'],
        ]);

        $student->update($validated);

        return redirect()->route('students.show', $student)
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        if ($student->picture && Storage::disk('public')->exists($student->picture)) {
            Storage::disk('public')->delete($student->picture);
        }

        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
}