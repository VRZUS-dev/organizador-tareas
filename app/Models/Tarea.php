<?php

namespace App\Models;

use CodeIgniter\Model;

class Tarea extends Model
{
    protected $table      = 'tareas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_usuario', 'titulo', 'descripcion', 'estado'];
}
