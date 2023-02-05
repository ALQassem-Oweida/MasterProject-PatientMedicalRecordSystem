<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medical_history extends Model
{
    use HasFactory;



    public function doctorAdd()
    {
        return $this->belongsTo(user_info::class,'add_by');
    }

    public function doctorEdited()
    {
        return $this->belongsTo(user_info::class,'Edited_by');
    }

   
}
