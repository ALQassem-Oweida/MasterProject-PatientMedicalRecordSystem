<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'national_id',
        'user_id',
        'doctor_id',
        'file_name',
        'file_type',
        
    ];

    public function doctorAdd()
    {
        return $this->belongsTo(user_info::class,'doctor_id');
    }
}
