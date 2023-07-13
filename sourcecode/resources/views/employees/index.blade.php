@extends('layouts.main')

@section('container-fluid')

@php
    $title = 'Pegawai';
@endphp

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-10 mt-2 mx-auto" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
    </div>
    <div class="card-body">
        @can('admin')
        <div class="mt-2 mb-4">
            <a class="btn btn-primary" href="/employees/create">
                <i class="fas fa-plus">&ensp;Tambah Data</i>
            </a>
        </div>
        @endcan
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kode</th>
                        <th>Jabatan</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->nama_pegawai }}</td>
                            <td>{{ $employee->kode_pegawai }}</td>
                            <td>{{ $employee->jabatan }}</td>
                            <td><img src="{{ Storage::url($employee->foto) }}"></td>
                            <td>
                                <a class="btn btn-info" href="/employees/{{ $employee->id }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @can('admin')
                                <a class="btn btn-warning" href="/employees/{{ $employee->id }}/edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="/employees/{{ $employee->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?')"><i class="fas fa-trash"></i></button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection