<h1>Crear nuevos producto</h1>

<div class="form_container">

    <form action="<?= base_url ?>producto/save" method="POST" enctype="multipart/form-data">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="descripcion" cols="10" rows="3"></textarea>

        <label for="precio">Precio Del Prodcuto</label>
        <input type="number" id="precio" name="precio" min="0" step="0.01" value="0.00">

        <label for="stock">Stock</label>
        <input type="number" name="stock">

        <label for="categoria">Categoria</label>
        <?php $categorias = Utils::showCategorias(); ?>
        <select name="categoria">
            <?php while ($cat = $categorias->fetch_object()): ?>
                <option value="<?= $cat->id ?>">
                    <?= $cat->nombre ?>
                </option>
            <?php endwhile; ?>

        </select>

        <label for="fecha">FECHA</label>
        <input type="date" name="fecha">

        <label for="imagen">Imagen</label>
        <input type="file" name="imagen">

        <input type="submit" value="Guardar">

        

    </form>
</div>