<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'reason',
        'pet_id',
        'user_id'
    ];

    /*
        Many - 1 relationship (Appointment -> Pet): Inversa (belongsTo)
    */
    public function pet(){
        return $this->belongsTo(Pet::class);
    }

    /*
        Many - 1 relationship (Appointment -> User): Inversa (belongsTo)
    */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
