<?php

/**
 * Iterador recursiu de taules
 *
 * @author Pep
 */
class EstadistiquesRow extends RecursiveIteratorIterator
{

    function __construct($it)
    {
        parent::__construct($it);
    }

    function current()
    {
        return "<td class='celdas'>" . parent::current() . "</td>";
    }

    function beginChildren()
    {
        echo "<tr id=" . parent::current() . ">";
    }

    function endChildren()
    {
        echo "<td class='celda-boton' type='submit'  onclick='manteniment(this)'>Editar</td>
        <td class='celda-boton' type='submit' name='btn' onclick='manteniment(this)'>Eliminar</td>
        </tr>" . "\n";
    }
}
