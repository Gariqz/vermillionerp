<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Mengambil semua data
    public function index()
    {
        // Menampilkan data dengan urutan terbaru di atas
        return response()->json(User::orderBy('id', 'desc')->get());
    }

    // Menambah data karyawan baru
   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6', // Tambahkan validasi password wajib
            'role' => 'required|string',
        ], [
            'email.unique' => 'Email ini sudah digunakan oleh karyawan lain.',
            'password.min' => 'Password minimal harus 6 karakter.'
        ]);

        $data = $request->all();
        // Enkripsi password yang diinputkan oleh HR
        $data['password'] = bcrypt($request->password); 

        $employee = User::create($data);
        return response()->json($employee, 201);
    }

    // Memperbarui data karyawan (Edit)
    public function update(Request $request, $id)
    {
        $employee = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6', // Password BOLEH kosong saat diedit
            'role' => 'required|string',
        ]);

        $data = $request->all();

        // Cek apakah HR mengisi kolom password saat edit
        if ($request->filled('password')) {
            // Jika diisi, enkripsi password barunya
            $data['password'] = bcrypt($request->password);
        } else {
            // Jika dikosongkan, hapus dari array data agar password lama tidak tertimpa menjadi kosong
            unset($data['password']);
        }

        $employee->update($data);
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