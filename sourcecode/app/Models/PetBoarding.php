<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetBoarding extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_name',
        'pet_age',
        'dokter',
        'entry_date',
        'exit_date',
        'file',
    ];

    protected $hidden = [
        'id'
    ];

    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
