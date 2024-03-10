<?php

function cartList($productID = NULL, $type = 'product')
{

    global $db;
    if ($productID == NULL) {
        return $db->from('cart')->all();
    } else {

        return $db->from('cart')->in($type, stringToArray($productID))->all();
    }


}

function cartListbyCat($productID = NULL)
{

    global $db;
    return $db->from('product')->
    where('cat', $productID)->
    orderBy('sort','ASC')->
    join('cart', 'main_product.id = main_cart.product')->
    all();

}