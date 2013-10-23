<?if($cantidad == 0):?>
<label>No registra productos en su bodega!</label>
<?else:?>
<table>
    <th>Código</th>
    <th>Nombre</th>
    <th>Marca</th>
    <th>Categoria</th>
    <?foreach($productos as $fila):?>
    <tr>
        <td><?=$fila->codigo;?></td>
        <td><?=$fila->nombre;?></td>
        <td><?=$fila->marca;?></td>
        <td><?=$fila->codcategoria;?></td>
    </tr>
    <?  endforeach;?>
</table>
<? endif; ?>
