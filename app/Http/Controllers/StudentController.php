<?php
// app/Http/Controllers/StudentController.php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller{
    public function index(){

    $student = Student::get();
    return response()->json($student);


    }

    public function store(Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'document_type'=>'required',
            'document_number'=>'required',
            'ficha'=>'required',
            'absence'=>'required|in:none,half,justified,unjustified',
        ]);

        return Student::create($request->all());
    }

    public function show($id){
        return Studentñ::findOrfail($id);
    }

    public function update(Request $request, $id){
        $student = Student::findOrfail($id);

        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'document_type'=>'required',
            'document_number'=>'required',
            'ficha'=>'required',
            'absence'=>'required|in:none,half,justified,unjustified',
        ]);

        $student->update($request->all());

        return $student;
    }

    public function destroy($id){
        $student = Student::findOrfail($id);
        $student->delete();

        return response()->json([
            'message' => 'El Aprendiz ha sido elimando exitosamente'
        ]);
    }
}


