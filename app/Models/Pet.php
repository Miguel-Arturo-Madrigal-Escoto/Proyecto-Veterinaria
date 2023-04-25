<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'species',
        'race',
        'dob',
        'color',
        'gender',
        'sterilized',
        'weight',
        'user_id'
    ];

    /*
        Many - 1 relationship (Pet -> User): Inversa (belongsTo)
    */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /*
        1 - Many relationship (Pet -> Appointments): hasMany
    */
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    /*
        Many - Many relationship (Pet <-> Vaccines): belongsToMany
    */
    public function vaccines(){
        return $this->belongsToMany(Vaccine::class)->withPivot(['date']);
    }

}
