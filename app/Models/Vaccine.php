<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaccine extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description'
    ];

    /*
        Defining Accessors (get) and Muttators (set)
        Capitalize first letter of a vaccine's title
    */
    protected function title(): Attribute {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => ucfirst($value),
        );
    }

    /*
        Many - Many relationship (Pet <-> Vaccines): belongsToMany
    */
    public function pets(){
        return $this->belongsToMany(Pet::class)->withPivot(['date']);
    }

}
