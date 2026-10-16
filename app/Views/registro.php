<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Playfair Display', serif; 
            padding: 20px; 
            background-color: #121212; 
            color: #e0e0e0; 
        }
        .navbar { 
            display: flex; 
            justify-content: space-between; 
            margin-bottom: 20px; 
            padding-bottom: 10px; 
            border-bottom: 2px solid #333; 
        }
        .navbar a { 
            text-decoration: none; 
            color: #a0a0a0; 
            margin-right: 15px; 
        }
        .navbar a:hover {
            color: #d4af37; 
        }
        .nav-right a { 
            color: #d4af37; 
            font-weight: bold;
        }
        .container {
            background: repeating-linear-gradient(45deg, #1a1a1a, #1a1a1a 10px, #222222 10px, #222222 20px);
            border: 2px solid #333; 
            border-radius: 20px; 
            padding: 30px; 
            max-width: 600px; 
            margin: 0 auto;
        }
        .container h1 { 
            margin-top: 0; 
            font-size: 28px; 
            color: #ffffff; 
        }
        .form-group { 
            margin-bottom: 15px; 
        }
        .form-group label { 
            display: block; 
            margin-bottom: 5px; 
            color: #b0b0b0; 
        }
        .form-group input {
            width: 100%; 
            padding: 10px; 
            background-color: #2a2a2a; 
            border: 2px solid #444; 
            border-radius: 8px; 
            box-sizing: border-box;
            color: #ffffff; 
            font-family: 'Playfair Display', serif; 
        }
        .form-group input:focus {
            outline: none;
            border-color: #d4af37; 
        }
        .buttons { 
            margin-top: 25px; 
        }
        .btn { 
            padding: 10px 25px; 
            border: 2px solid #333; 
            border-radius: 8px; 
            cursor: pointer; 
            font-weight: bold; 
            font-size: 16px; 
            font-family: 'Playfair Display', serif;
        }
        .btn-signup { 
            background-color: #d4af37; 
            color: #121212; 
            margin-right: 10px; 
        }
        .btn-cancel { 
            background-color: #333333; 
            color: #e0e0e0;
        }
        .alerta-exito { 
            background-color: rgba(212, 175, 55, 0.1); 
            color: #d4af37; 
            padding: 10px; 
            border: 2px solid #d4af37; 
            border-radius: 8px; 
            margin-bottom: 15px; 
            font-weight: bold; 
        }
        .alerta-error { 
            background-color: rgba(255, 107, 107, 0.1); 
            color: #ff6b6b; 
            padding: 10px; 
            border: 2px solid #ff6b6b; 
            border-radius: 8px; 
            margin-bottom: 15px; 
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="nav-left">
            <a href="#">Inicio</a>
            <a href="#">Ingles</a>
            <a href="#">Español</a>
        </div>
        <div class="nav-right">
            <a href="/registro">Registrarse</a>
            <a href="#">Iniciar Sesion</a>
        </div>
    </div>

    <div class="container">
        <h1>Registrarse</h1>

        <?php if(session()->getFlashdata('mensaje')): ?>
            <div class="alerta-exito">
                <?= session()->getFlashdata('mensaje') ?>
            </div>
        <?php endif; ?>

        <?php if(isset($validation)): ?>
            <div class="alerta-error">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="/registro/guardar" method="POST">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" value="<?= set_value('name') ?>" required>
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="email" value="<?= set_value('email') ?>" required>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label>Confirmar contraseña</label>
                <input type="password" name="repeat_password" required>
            </div>
            <div class="buttons">
                <button type="submit" class="btn btn-signup">Registrarse</button>
                <button type="button" class="btn btn-cancel">Cancelar</button>
            </div>
        </form>
    </div>

</body>
</html>

