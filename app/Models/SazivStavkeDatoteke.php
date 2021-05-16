<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SazivStavkeDatoteke extends Model
{
    use HasFactory;
    protected $table = "saziv_stavke_datoteke";

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ime_datoteke',
        'path_datoteke',
        'id_stavke_saziva',
        'created_at',
    ];
 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
    ];
}

