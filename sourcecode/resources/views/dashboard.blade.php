@extends('layouts.main')

@section('container-fluid')

@php
    $title = 'Dashboard';
@endphp

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="/employees">
                            <div class="h5 font-weight-bold text-primary text-uppercase mb-1">
                                Pegawai
                            </div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-person-vcard fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @can('admin')
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="/petboardings">
                            <div class="h5 font-weight-bold text-info text-uppercase mb-1">
                                Hotel
                            </div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-building fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="/users">
                            <div class="h5 font-weight-bold text-info text-uppercase mb-1">
                                Users
                            </div>
                        </a>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-person fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

</div>
    
@endsection