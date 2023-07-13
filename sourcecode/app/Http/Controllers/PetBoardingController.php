<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PetBoarding;

class PetBoardingController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $petboardings = DB::table('pet_boardings')
            ->join('users', 'pet_boardings.user_id', '=', 'users.id')
            ->join('employees', 'pet_boardings.dokter', '=', 'employees.id')
            ->select('users.name', 'pet_boardings.pet_name', 'pet_boardings.pet_age', 'employees.nama_pegawai', 'pet_boardings.entry_date', 'pet_boardings.exit_date')
            ->get();

        return view('petboardings.index', [
            'title' => 'Data Hotel',
            'petboardings' => $petboardings
        ]);
    }
}