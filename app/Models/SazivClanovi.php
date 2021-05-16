<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SazivClanovi extends Model
{
    protected $table = "saziv_clanovi";
    public $timestamps = false;
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ime',
        'opis',
        'email',
        'telefon',
        'uloga',
        'id_saziva'
    ];

}
