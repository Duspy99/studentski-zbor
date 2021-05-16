<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NovostiGalerija extends Model
{
    protected $table = "novosti_galerija";
    public $timestamps = false;
    use HasFactory;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ime_slike',
        'id_novosti',
    ];
}
