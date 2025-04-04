<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // function 'welcome' yang akan dijalankan di route web.php
    public function welcome(){
        //mengambil semua data dari tabel students dan membaca data yang ada
        $students = Student::all()->map(function($student){
            return $student;
        });
        //mengembalikan $students ke view sehingga tertampil di web
        return view('welcome', compact('students'));
    }

    //function 'createStudent' yang akan menampilkan form createStudent yang akan dijalankan di route web.php
    public function createStudent(){
        //mengirimkan data genders juga ke dalam view
        $genders = Gender::all();
        return view('createStudent', compact('genders'));
    }

    // function 'store' yang akan dijalankan di route web.php
    public function store(Request $request){
        //memberikan validasi pada input
        $request->validate([
            'nama_mahasiswa' => 'required|string|max:200',
            'email' => 'required|email|unique:students',
            'NIM' => 'required|numeric',
            'nomor_telepon' => 'required|numeric',
            'gender' => 'required'
        ]);

        //menyimpan data dari tiap inputan
        Student::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'email' => $request->email,
            'NIM' => $request->NIM,
            'nomor_telepon' => $request->nomor_telepon,
            'gender_id' => $request->gender
        ]);


        //mengembalikan ke page welcome setelah menyimpan data
        return redirect(route('welcome'));
    }

    // function 'editStudent' yang akan dijalankan di route web.php
    public function editStudent($id){
        $student = Student::findOrFail($id);
        $genders = Gender::all();
        return view('editStudent', compact('student', 'genders'));
    }

    // function 'updateStudent' yang akan dijalankan di route web.php
    public function updateStudent($id, Request $request){
        $student = Student::findOrFail($id);

        $request->validate([
            'nama_mahasiswa' => 'required|string|max:200',
            'email' => 'required|email|unique:students,email,'.$id,
            'NIM' => 'required|numeric',
            'nomor_telepon' => 'required|numeric',
            'gender' => 'required'
        ]);

        $student->update([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'email' => $request->email,
            'NIM' => $request->NIM,
            'nomor_telepon' => $request->nomor_telepon,
            'gender_id' => $request->gender
        ]);
        return redirect(route('welcome'));
    }

    // function 'deleteStudent' yang akan dijalankan di route web.php
    public function deleteStudent($id){
        Student::destroy($id);
        return redirect(route('welcome'));
    }

}
