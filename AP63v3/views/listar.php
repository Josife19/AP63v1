<<DOCTYPE html>
<html>
    <head>
        <title>CRUD PHP con POO y Arrays</title>
    </head>
    <body>
        <h1>Gestor de Publicaciones</h1>
        <hr>
       
<a href="index.php?accion=crear">Añadir Publicación</a>
<h3> LIBROS </h3>

<table border="1" cellpadding="10">
    <tr>
        <th>ISBN</th>
        <th>Editorial</th>
        <th>Páginas</th>

        <th>Acciones</th>
    </tr>

    <?php foreach ($librosAcortados as $p): ?>
        <?php if (get_class ($p) == "Libro"): ?>
    <tr>
                <td><?=$p->getIsbn(); ?></td>
                <td><?=$p->getEditorial(); ?></td>
                <td><?=$p->getPaginas(); ?></td>
                <td>

                <form method="POST" action="index.php?accion=editarLibro" style="display:inline;">
                    <input type="hidden" name="isbn" value="<?=$p->getIsbn(); ?>">
                    Editorial: <input type="text" name="editorial" value="<?=  $p->getEditorial(); ?>" required>
                    Páginas: <input type="number" name="paginas" value="<?=  $p->getPaginas(); ?>" required>
                    <button type="submit">Editar</button>

                    <a href="index.php?accion=eliminar&isbn=<?= $p->getIsbn()?>">Eliminar
                </form>
        </td>
        </tr>
        <?php endif; ?>          
    <?php endforeach; ?>
</table>

<?php for ($i = 1; $i <= $totalPaginasLibros; $i++): ?>
    <a href='index.php?accion=index&pActualLibros=<?= $i ?>'><?= $i ?></a>
<?php endfor; ?>
<h3> REVISTAS </h3>

<table border="1" cellpadding="10">
    <tr>
        <th>ISBN</th>
        <th>Color</th>
        <th>Temática</th>

        <th>Acciones</th>
    </tr>

<?php foreach ($revistasAcortadas as $p): ?>
        <?php if (get_class ($p) == "Revista"): ?>
    <tr>
                <td><?=$p->getIsbn(); ?></td>
                <td><?=$p->getColor(); ?></td>
                <td><?=$p->getTematica(); ?></td>
                <td>

                <form method="POST" action="index.php?accion=editarRevista" style="display:inline;">
                    <input type="hidden" name="isbn" value="<?=$p->getIsbn(); ?>">
                    Color: <input type="text" name="color" value="<?=  $p->getColor(); ?>" required>
                    Temática: <input type="text" name="tematica" value="<?=  $p->getTematica(); ?>" required>
                    <button type="submit">Editar</button>

                    <a href="index.php?accion=eliminar&isbn=<?= $p->getIsbn()?>">Eliminar
                </form>
        </td>
        </tr>
        <?php endif; ?>          
    <?php endforeach; ?>
</table>

<?php for ($i = 1; $i <= $totalPaginasRevistas; $i++): ?>
    <a href='index.php?accion=index&pActualRevistas=<?= $i ?>'><?= $i ?></a>
<?php endfor; ?>