<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function registro()
    {
        helper('form');
        return view('registro');
    }

    public function guardarRegistro()
    {
        helper('form');
        
        $reglas = [
            'name'            => 'required',
            'email'           => 'required|valid_email|is_unique[usuarios.email]',
            'password'        => 'required|min_length[6]',
            'repeat_password' => 'matches[password]'
        ];

        if (!$this->validate($reglas)) {
            return view('registro', ['validation' => $this->validator]);
        }

        $usuarioModel = new \App\Models\Usuario();

        $usuarioModel->save([
            'name'          => $this->request->getPost('name'),
            'email'         => $this->request->getPost('email'),
            'password'      => password_hash((string)$this->request->getPost('password'), PASSWORD_DEFAULT),
            'active'        => 0,
            'administrator' => 0
        ]);

        return redirect()->to('/registro')->with('mensaje', 'Usuario registrado exitosamente');
    }

    public function login()
    {
        helper('form');
        return view('login');
    }

    public function ingresar()
    {
        helper('form');
        
        $reglas = [
            'email'    => 'required|valid_email',
            'password' => 'required'
        ];

        if (!$this->validate($reglas)) {
            return view('login', ['validation' => $this->validator]);
        }

        $usuarioModel = new \App\Models\Usuario();
        $email = $this->request->getPost('email');
        $password = (string)$this->request->getPost('password');

        $usuario = $usuarioModel->where('email', $email)->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            session()->set([
                'id_usuario' => $usuario['id'],
                'nombre'     => $usuario['name'],
                'is_logged'  => true
            ]);
            return redirect()->to('/dashboard'); 
        } else {
            return redirect()->to('/login')->with('error', 'Correo o contraseña incorrectos.');
        }
    }
}

