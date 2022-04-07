<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudiantes extends Model
{
    use HasFactory;

    public $table='estudiantes';

    public $timestamps=false;
    protected $fillable=[
        'carne','nombre','foto','correo', 'semestre','edad',
    ];

    protected $primaryKey='carne';
}
