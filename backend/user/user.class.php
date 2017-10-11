<?php
class User {
    var $items;  // Objetos en nuestro carrito de compras

    // Agregar $num artículos de $artnr al carrito

    function add_item($artnr, $num) {
        $this->items[$artnr] += $num;
    }

    // Sacar $num artículos de $artnr fuera del carrito

    function remove_item($artnr, $num) {
        if ($this->items[$artnr] > $num) {
            $this->items[$artnr] -= $num;
            return true;
        } elseif ($this->items[$artnr] == $num) {
            unset($this->items[$artnr]);
            return true;
        } else {
            return false;
        }
    }
}
?>