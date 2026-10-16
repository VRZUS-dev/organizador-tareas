<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Playfair Display', serif; 
            padding: 20px; 
            background-color: #121212; 
            color: #e0e0e0; 
            margin: 0;
        }
        .navbar { 
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            margin-bottom: 40px; 
            padding-bottom: 15px; 
            border-bottom: 2px solid #333; 
        }
        .navbar a { 
            text-decoration: none; 
            color: #a0a0a0; 
            margin-right: 15px; 
            transition: color 0.3s;
        }
        .navbar a:hover {
            color: #d4af37; 
        }
        .nav-right a.btn-logout { 
            color: #121212; 
            background-color: #d4af37;
            padding: 8px 15px;
            border-radius: 6px;
            font-weight: bold;
        }
        .nav-right a.btn-logout:hover {
            background-color: #c19b2e;
        }
        .container {
            max-width: 900px; 
            margin: 0 auto;
        }
        .header-panel {
            background: repeating-linear-gradient(45deg, #1a1a1a, #1a1a1a 10px, #222222 10px, #222222 20px);
            border: 2px solid #333; 
            border-radius: 20px; 
            padding: 30px; 
            text-align: center;
            margin-bottom: 30px;
        }
        .header-panel h1 { 
            margin-top: 0; 
            font-size: 32px; 
            color: #d4af37; 
        }
        .form-panel {
            background-color: #1a1a1a;
            border: 2px solid #333; 
            border-radius: 15px; 
            padding: 25px; 
            margin-bottom: 30px;
        }
        .form-group { 
            margin-bottom: 15px; 
        }
        .form-group label { 
            display: block; 
            margin-bottom: 5px; 
            color: #b0b0b0; 
        }
        .form-group input, .form-group textarea {
            width: 100%; 
            padding: 10px; 
            background-color: #2a2a2a; 
            border: 2px solid #444; 
            border-radius: 8px; 
            box-sizing: border-box;
            color: #ffffff; 
            font-family: 'Playfair Display', serif; 
        }
        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: #d4af37; 
        }
        .btn-submit {
            background-color: #d4af37; 
            color: #121212; 
            padding: 10px 25px; 
            border: none; 
            border-radius: 8px; 
            cursor: pointer; 
            font-weight: bold; 
            font-family: 'Playfair Display', serif;
            font-size: 16px;
        }
        .btn-submit:hover {
            background-color: #c19b2e;
        }
        .tareas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }
        .tarea-card {
            background-color: #1e1e1e;
            border: 1px solid #d4af37;
            border-radius: 10px;
            padding: 20px;
        }
        .tarea-card h3 {
            margin-top: 0;
            color: #d4af37;
        }
        .tarea-card p {
            color: #e0e0e0;
            font-size: 15px;
        }
        .tarea-estado {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #333;
            border-radius: 5px;
            font-size: 12px;
            color: #b0b0b0;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="nav-left">
            <a href="/dashboard">Inicio</a>
        </div>
        <div class="nav-right">
            <a href="/salir" class="btn-logout">Cerrar Sesión</a>
        </div>
    </div>

    <div class="container">
        <div class="header-panel">
            <h1>Bienvenido, <?= esc($nombre) ?></h1>
            <p>Aquí puedes organizar tus tareas diarias.</p>
        </div>

        <div class="form-panel">
            <form action="/dashboard/guardarTarea" method="POST">
                <div class="form-group">
                    <label>Título de la Tarea</label>
                    <input type="text" name="titulo" required>
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="descripcion" rows="3"></textarea>
                </div>
                <button type="submit" class="btn-submit">Guardar Tarea</button>
            </form>
        </div>

        <div class="tareas-grid">
            <?php if(!empty($tareas)): ?>
                <?php foreach($tareas as $t): ?>
                    <div class="tarea-card">
                        <h3><?= esc($t['titulo']) ?></h3>
                        <p><?= esc($t['descripcion']) ?></p>
                        <span class="tarea-estado" style="background-color: <?= $t['estado'] == 'completada' ? '#d4af37' : '#333' ?>; color: <?= $t['estado'] == 'completada' ? '#121212' : '#b0b0b0' ?>;">
                            <?= esc(ucfirst($t['estado'])) ?>
                        </span>
                        
                        <div style="margin-top: 15px; display: flex; gap: 10px;">
                            <?php if($t['estado'] == 'pendiente'): ?>
                                <a href="/dashboard/completar/<?= $t['id'] ?>" style="background-color: #4CAF50; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 14px;">Completar</a>
                            <?php endif; ?>
                            <a href="/dashboard/eliminar/<?= $t['id'] ?>" style="background-color: #f44336; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 14px;">Eliminar</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="color: #b0b0b0; text-align: center; grid-column: 1 / -1;">No tienes tareas registradas aún. ¡Agrega una arriba!</p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>