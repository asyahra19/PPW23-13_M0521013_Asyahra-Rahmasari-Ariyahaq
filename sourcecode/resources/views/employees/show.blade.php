@extends('layouts.main')

@php
    $title = 'Pegawai';
@endphp

@section('container-fluid')
    <h1 class="mb-5">{{ $employee->nama_pegawai }}</h1>

    @if ($employee->foto)
        <div style="max-height: 400px; overflow: auto;">
            <img src="{{ asset('storage/' . $employee->foto) }}" alt="">
        </div>
    @endif
    
    <br>
    <h6>NAMA        : {{ $employee->nama_pegawai }}</h6>
    <h6>KODE        : {{ $employee->kode_pegawai }}</h6>
    <h6>JABATAN     : {{ $employee->jabatan }}</h6>
    <h6>FOTO        : {{ $employee->foto }}</h6>

    <br><br>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3" name="back" type="submit">Kembali</a>
@endsection