<?php

namespace App\Controllers;

use App\Models\Tarea;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('is_logged')) {
            return redirect()->to('/login');
        }

        $tareaModel = new Tarea();
        $tareas = $tareaModel->where('id_usuario', session()->get('id_usuario'))->findAll();

        return view('dashboard', [
            'nombre' => session()->get('nombre'),
            'tareas' => $tareas
        ]);
    }

    public function guardarTarea()
    {
        $tareaModel = new Tarea();
        
        $tareaModel->save([
            'id_usuario'  => session()->get('id_usuario'),
            'titulo'      => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'estado'      => 'pendiente'
        ]);

        return redirect()->to('/dashboard');
    }

    public function completarTarea($id)
    {
        $tareaModel = new Tarea();
        $tareaModel->update($id, ['estado' => 'completada']);
        return redirect()->to('/dashboard');
    }

    public function eliminarTarea($id)
    {
        $tareaModel = new Tarea();
        $tareaModel->delete($id);
        return redirect()->to('/dashboard');
    }

    public function salir()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}

