<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Organizador de Tareas</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; padding: 20px; }
        .contenedor { background-color: #2b3a94; padding: 30px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0,0,0,0.2); max-width: 500px; margin-left: 0; }
        h1 { color: #ffe600; text-align: left; margin-top: 0; }
        form { display: flex; margin-bottom: 20px; }
        input[type="text"] { flex: 1; padding: 10px; border: none; border-radius: 5px 0 0 5px; outline: none; }
        button { padding: 10px 15px; border: none; background-color: #7a8eb1; color: white; cursor: pointer; border-radius: 0 5px 5px 0; font-weight: bold; }
        button:hover { background-color: #63789a; }
        ul { list-style-type: none; padding: 0; }
        li { display: flex; justify-content: space-between; align-items: center; padding: 10px; border-bottom: 1px solid #4a5bb8; color: white; }
        .completada { text-decoration: line-through; color: #8ba0d8; }
        .acciones a { text-decoration: none; padding: 5px 10px; border-radius: 3px; color: white; font-size: 14px; margin-left: 5px; }
        .btn-completar { background-color: #28a745; }
        .btn-eliminar { background-color: #dc3545; }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Organizador de Tareas</h1>
        <form action="/guardar" method="POST">
            <input type="text" name="titulo" placeholder="Agregar alguna tarea" required>
            <button type="submit">Agregar</button>
        </form>
        <ul>
            <?php if (!empty($tareas) && is_array($tareas)): ?>
                <?php foreach ($tareas as $tarea): ?>
                    <li>
                        <span class="<?php echo $tarea['estado'] == 1 ? 'completada' : ''; ?>">
                            <?php echo htmlspecialchars($tarea['titulo']); ?>
                        </span>
                        <div class="acciones">
                            <?php if ($tarea['estado'] == 0): ?>
                                <a href="/completar/<?php echo $tarea['id']; ?>" class="btn-completar">✔</a>
                            <?php endif; ?>
                            <a href="/eliminar/<?php echo $tarea['id']; ?>" class="btn-eliminar">✖</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>
