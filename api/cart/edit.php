<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;

        $cart = $db->from('cart')->where('id', $v['itemid'])->first();

        $data = json_decode($cart['data'], true);


        foreach ($v as $key => $value) {
            $data[$key] = $value;
        }


        if (isset($data['price'])) {
            $price = $data['price'];
        } else {
            $price = getProduct($cart['product'])['price'];
        }


        if (isset($data['payment']) and $price == $data['payment']) {
            $data['status'] = 2;
        } else {

            if (isset($data['payment']) and 0 < $data['payment']) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }


        }


        $db->update('cart')->where('id', $v['itemid'])->set([
            'data' => json_encode($data)
        ]);

        echo pageReturn(array('operation' => 'reload', 'data' => $v));

}
