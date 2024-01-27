<h1>Gestion de productos</h1>


<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
     <strong class="alerts_green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['Producto']) && $_SESSION['producto'] != 'complete'):?>
    <strong class="alerts_red">El producto no se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>
<!-- Titulo de tablas de productos -->
<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>STOCK</th>

    </tr>

    <!-- Se crea un bucle para mostrar los productos que se encuentran en la base de datos -->
    <?php while($pro = $productos->fetch_object()): ?>
        <tr>
            <td><?=$pro->id;?></td>
            <td><?=$pro->nombre;?></td>
            <td><?=$pro->precio;?></td>
            <td><?=$pro->stock;?></td>
    
        </tr>
        <?php endwhile; ?>
</table>
