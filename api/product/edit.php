<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;

        if (!isset($v['price'])) {
            $v['price'] = getProduct($v['id'])['price'];
        }
        if (!isset($v['currency'])) {
            $v['currency'] = getProduct($v['id'])['currency'];
        }

        $db->update('product')->where('id', $v['id'])->set(
            [
                'price' => $v['price'],
                'currency' => $v['currency'],
                'status' => ($v['productStatus'] == 'on' ? 1 : 0)
            ]
        );


        foreach ($v as $key => $value) {

            if (in_array($key, ['productStatus', 'price', 'currency'])) {
                continue;
            }

            if (!isset(getProduct($v['id'])[$key])) {
                $db->insert('productMeta')->set(
                    [
                        'value' => $value,
                        'meta' => $key,
                        'product' => $v['id'],
                    ]
                );
            } else {
                $db->update('productMeta')->where('product', $v['id'])->where('meta', $key)->set(
                    [
                        'value' => $value,
                    ]
                );
            }


        }

        echo pageReturn(array('operation' => 'none', 'data' => $v));

}
