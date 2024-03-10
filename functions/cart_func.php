<?php

function cartList($productID = NULL, $type = 'product')
{

    global $db;
    if ($productID == NULL) {
        return $db->from('cart')->where('deleteStatus',0)->all();
    } else {

        return $db->from('cart')->where('deleteStatus',0)->in($type, stringToArray($productID))->all();
    }


}

function cartListbyCat($productID = NULL)
{

    global $db;
    return $db->from('product')->
    where('cat', $productID)->
    where('deleteStatus', 0)->
    orderBy('sort','ASC')->
    join('cart', 'main_product.id = main_cart.product')->
    all();

}