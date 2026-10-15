<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - Habitaciones</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>
<div class="contenedor">
    <header>
        <h1>🏨 Sistema de Hotel</h1>
        <p>Gestión de habitaciones</p>
    </header>

    <a class="btn nuevo" href="index.php?accion=nuevo">+ Nueva habitación</a>

    <div class="tabla-contenedor">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número</th>
                    <th>Piso</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php if (empty($habitaciones)): ?>
                <tr>
                    <td colspan="7" class="vacio">No hay habitaciones registradas.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($habitaciones as $h): ?>
                    <tr>
                        <td><?= htmlspecialchars($h->getId()) ?></td>
                        <td><?= htmlspecialchars($h->getNumero()) ?></td>
                        <td><?= htmlspecialchars($h->getPiso()) ?></td>
                        <td><?= htmlspecialchars($h->getTipo()) ?></td>
                        <td>Bs. <?= number_format($h->getPrecio(), 2) ?></td>
                        <td>
                            <?php if ($h->getFoto() !== ""): ?>
                                <span class="foto-nombre"><?= htmlspecialchars($h->getFoto()) ?></span>
                            <?php else: ?>
                                Sin foto
                            <?php endif; ?>
                        </td>
                        <td>
                            <a class="btn editar" href="index.php?accion=editar&id=<?= $h->getId() ?>">Editar</a>
                            <a class="btn eliminar"
                               href="index.php?accion=eliminar&id=<?= $h->getId() ?>"
                               onclick="return confirm('¿Seguro que deseas eliminar esta habitación?');">
                               Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
