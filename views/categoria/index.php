<h1>gestionar categorias</h1>

<!-- Se define la ruta del fichero que permitira crear una nueva categoria -->
<a href="<?= base_url ?>categoria/crear" class=" button button-small">
    Crear categoria
</a>

<!-- Por medio de una tabla s encarga de mostrar las categorias que se encuentran en la base de datos -->
<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
    </tr>
    <?php while ($cat = $categorias->fetch_object()): ?>
        <tr>
            <td>
                <?= $cat->id; ?>
            </td>
            <td>
                <?= $cat->nombre; ?>
            </td>
        </tr>
    <?php endwhile; ?>

</table>

