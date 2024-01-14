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

 <!-- DICIONARIO DE FUNCIONES:
h1 = Se encarga de definir un titulo tipo h1
a href = Se utiliza para definir que se tendra un elemento de tipo enlace
class = Se utiliza para definir una clase
table = Se utiliza para definir una tabla
tr = Se utiliza para definir una fila
th = Se utiliza para definir el encabezado de una tabla
td = Se utiliza para definir una celda
while = es un bucle que se ejecuta mientras la condicion sea verdadera
fetch_object = Se utiliza para obtener un objeto de la base de datos
endwhile = S utiliza para cerra el bucle while

Nota: Este fichero le permiete al usuario listar las categirias que se encuentran en la base de datos
-->
