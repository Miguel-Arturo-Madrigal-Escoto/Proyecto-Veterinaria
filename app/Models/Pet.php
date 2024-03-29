<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        Defining Accessors (get) and Muttators (set)
        Capitalize first letter of a pet's name
    */
    protected function name(): Attribute {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => ucfirst($value),
        );
    }

    /*
        Defining Accessors (get) and Muttators (set)
        Round the a pet's weight to two decimals
    */
    protected function weight(): Attribute {
        return Attribute::make(
            get: fn (float $value) => number_format($value, 2),
            set: fn (float $value) => number_format($value, 2)
        );
    }

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

    /*
        1 to 1 relationship (Pet -> PetPhoto)
    */
    public function photo(){
        return $this->hasOne(PetPhoto::class);
    }

}
