<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    protected $table='cursos';
    public $timestamps=false;
    protected $fillable=[
        'id_cursos', 'descripción',
    ];

    protected $primaryKey = 'id_cursos';
}
