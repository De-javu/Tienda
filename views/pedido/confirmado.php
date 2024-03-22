<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>Tu Pedido ha sido guardado en exito, unavez se verifique la trasferencia , se procesara confirmado
        el alistamiento para el envio.
    </p>
    <br>
    <?php if (isset($pedido)): ?>
        <h3>Datos del pedido</h3>
     
        Numero de pedido: <?= $pedido->id ?> <br>
        Total a pagar: <?= $pedido->coste ?> <br>
        Productos:                           <br>
        
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>
            <?php while ($producto = $productos->fetch_object()): ?>
                <tr>
                    <td>
                        <?php if ($producto->imagen != null): ?>
                            <img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" class="img_carrito" alt="">
                        <?php else: ?>
                            <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito" alt="">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
                    </td>
                    <td>
                        <?= $producto->precio ?>
                    </td>
                    <td>
                        <?= $producto->unidades ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

       

    <?php endif; ?>

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
    <h1>Tu pedido no se ha confirmado</h1>
    <p>
        Tu Pedido no ha sido guardado en exito, por favor verifica los datos y vuelve a intentarlo.
    </p>;
<?php endif; ?>