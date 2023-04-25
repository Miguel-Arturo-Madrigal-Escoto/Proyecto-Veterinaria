<?php

namespace App\Models;

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
        Many - Many relationship (Pet <-> Vaccines): belongsToMany
    */
    public function pets(){
        return $this->belongsToMany(Pet::class)->withPivot(['date']);
    }

}
