<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viedo extends Model
{
    use HasFactory;

    protected $table = "viedos";
    protected $fillable = ['name', 'viewers'];
    public $timestamps = false;

}
