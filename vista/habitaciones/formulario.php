<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $habitacion->getId() ? "Editar" : "Nueva" ?> habitación</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>
<div class="form-contenedor">
    <h1><?= $habitacion->getId() ? "Editar habitación" : "Registrar habitación" ?></h1>

    <form method="POST"
          action="index.php?accion=<?= $habitacion->getId() ? 'actualizar' : 'guardar' ?>">

        <?php if ($habitacion->getId()): ?>
            <input type="hidden" name="id" value="<?= htmlspecialchars($habitacion->getId()) ?>">
        <?php endif; ?>

        <label>Número de habitación</label>
        <input type="text" name="numero" required
               value="<?= htmlspecialchars($habitacion->getNumero()) ?>"
               placeholder="Ej. 101">

        <label>Piso</label>
        <input type="number" name="piso" required min="1"
               value="<?= htmlspecialchars($habitacion->getPiso()) ?>"
               placeholder="Ej. 1">

        <label>Tipo</label>
        <input type="text" name="tipo" required
               value="<?= htmlspecialchars($habitacion->getTipo()) ?>"
               placeholder="Ej. Individual, Doble, Suite">

        <label>Precio</label>
        <input type="number" name="precio" required min="0" step="0.01"
               value="<?= htmlspecialchars($habitacion->getPrecio()) ?>"
               placeholder="Ej. 150.00">

        <label>Foto</label>
        <input type="text" name="foto"
               value="<?= htmlspecialchars($habitacion->getFoto()) ?>"
               placeholder="Ej. habitacion101.jpg">

        <div class="acciones-form">
            <button type="submit" class="btn guardar">
                <?= $habitacion->getId() ? "Actualizar" : "Guardar" ?>
            </button>
            <a class="btn cancelar" href="index.php">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>
