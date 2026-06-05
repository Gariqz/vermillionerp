<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Mengambil semua data
    public function index()
    {
        return response()->json(User::all());
    }

    // Menambah data karyawan baru
    public function store(Request $request)
    {
        // Beri password default agar tidak error di MySQL
        $data = $request->all();
        $data['password'] = bcrypt('vermillion123'); // Karyawan baru pakai password default ini

        $employee = User::create($data);
        return response()->json($employee, 201);
    }

    // Memperbarui data karyawan (Edit)
    public function update(Request $request, $id)
    {
        $employee = User::findOrFail($id);
        $employee->update($request->all());
        return response()->json($employee);
    }

    // Menghapus data karyawan
    public function destroy($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}