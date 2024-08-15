<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurgeryType extends Model
{
    use HasFactory;
    protected $table = 'surgery_types';
    protected $primarykey ='id';

    protected $fillable = [
        'surgery_name',
           
    ];
}
