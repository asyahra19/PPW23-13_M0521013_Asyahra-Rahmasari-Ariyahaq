@extends('layouts.main')

@php
    $title = 'Pegawai';
@endphp

@section('container-fluid')

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit Data</h1>
                    </div>
                    <form method="post" action="/employees/{{ $employee->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="nama_pegawai" required value="{{ old('nama_pegawai', $employee->nama_pegawai) }}">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="kode_pegawai" name="kode_pegawai" placeholder="kode_pegawai" required value="{{ old('kode_pegawai', $employee->kode_pegawai) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <select class="form-control" id="jabatan" name="jabatan" required>
                                    <option value="">Pilih Jabatan</option>
                                    <option value="doctor" {{ old('jabatan', $employee->jabatan) === 'doctor' ? 'selected' : '' }}>Doctor</option>
                                    <option value="cashier" {{ old('jabatan', $employee->jabatan) === 'cashier' ? 'selected' : '' }}>Cashier</option>
                                    <option value="customer service" {{ old('jabatan', $employee->jabatan) === 'customer service' ? 'selected' : '' }}>Customer Service</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="hidden" name="oldCover" id="oldCover" value="{{ $employee->foto }}">
                                @if ($employee->cover)
                                    <img src="{{ asset('storage/' . $employee->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else    
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                                <input type="file" class="form-control" id="foto" name="foto" onchange="previewImage()">
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary mt-3" name="submit" type="submit">Simpan</button>
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3" name="submit" type="submit">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        const cover = document.querySelector('#cover');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(cover.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
    
@endsection