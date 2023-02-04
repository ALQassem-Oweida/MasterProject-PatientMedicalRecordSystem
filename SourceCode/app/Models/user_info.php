<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_info extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'national_id' ,
        'FName' ,
        'MName',
        'LName' ,
        'date_of_birth' ,
        'address' ,
    ];



    // public function user()
    // {
    //   return $this->belongsTo(User::class,'user_info_relation');
    // }
  
    public function appointments(){
        return $this->hasMany(Appointment::class,'doctor_id');
    }




}
