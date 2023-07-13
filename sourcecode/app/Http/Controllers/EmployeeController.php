<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees.index', [
            'title' => 'Data Pegawai',
            'employee' => Employee::all()
        ]);
    }

    public function create()
    {
        $this->authorize('admin');
        return view('employees.create', [
            'title' => 'Tambah Data',
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $validatedData = $request->validate([
            'nama_pegawai' => 'required| string',
            'kode_pegawai' => 'required| string',
            'jabatan' => 'required|in:doctor,cashier,customer service',
            'foto' => 'nullable| image| file| mimes:jpeg,png,jpg,gif,svg| max:2048',
        ]);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('foto');
        }

        Employee::create($validatedData);

        return redirect('/employees')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', [
            'title' => 'Detail Pegawai',
            'employee' => $employee
        ]);
    }

    public function edit(Employee $employee)
    {
        $this->authorize('admin');
        return view('employees.edit', [
            'title' => 'Edit Data',
            'employee' => $employee
        ]);
    }

    public function update(Request $request, Employee $employee)
    {
        $this->authorize('admin');
        $validatedData = $request->validate([
            'nama_pegawai' => 'required| string',
            'kode_pegawai' => 'required| string',
            'jabatan' => 'required|in:doctor,cashier,customer service',
            'foto' => 'nullable| image| file| mimes:jpeg,png,jpg,gif,svg| max:2048',
        ]);

        if ($request->file('foto')) {
            if($request->foto) {
                Storage::delete($request->foto);
            }
            $validatedData['foto'] = $request->file('foto')->store('foto');
        }

        Employee::where('id', $employee->id)
            ->update($validatedData);

        return redirect('/employees')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(Employee $employee)
    {
        $this->authorize('admin');
        if($employee->foto) {
            Storage::delete($employee->foto);
        }

        Employee::destroy($employee->id);

        return redirect('/employees')->with('success', 'Data berhasil dihapus!');
    }
}