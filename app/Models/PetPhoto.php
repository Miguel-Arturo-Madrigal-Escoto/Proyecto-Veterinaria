<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetPhoto extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hash',
        'name',
        'extension',
        'mime',
        'pet_id'
    ];

    /*
        1 to 1 relationship (Pet -> PetPhoto)
    */
    public function pet(){
        return $this->belongsTo(Pet::class);
    }

}
