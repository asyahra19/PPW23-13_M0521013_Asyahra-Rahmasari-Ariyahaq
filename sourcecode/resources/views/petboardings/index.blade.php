@extends('layouts.main')

@php
    $title = 'Hotel';
@endphp

@section('container-fluid')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Hotel</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nama Pet</th>
                        <th>Usia Pet</th>
                        <th>Dokter</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petboardings as $petboarding)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $petboarding->name }}</td>
                            <td>{{ $petboarding->pet_name }}</td>
                            <td>{{ $petboarding->pet_age }}</td>
                            <td>{{ $petboarding->nama_pegawai }}</td>
                            <td>{{ $petboarding->entry_date }}</td>
                            <td>{{ $petboarding->exit_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection