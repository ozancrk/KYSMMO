<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;


        $db->insert('product')->set(
            [
                'price' => $v['price'],
                'currency' => $v['currency'],
                'cat' => $v['cat'],
                'status' => ($v['productStatus'] == 'on' ? 1 : 0)
            ]
        );

        $productID = $db->lastInsertId();

        foreach ($v as $key => $value) {

            if (in_array($key, ['cat','productStatus', 'price', 'currency','editorType','token']) OR ($key == 'fileID' AND empty($value))) {
                continue;
            }


            $db->insert('productMeta')->set(
                [
                    'value' => $value,
                    'meta' => $key,
                    'product' => $productID,
                ]
            );


        }

        echo pageReturn(array('operation' => 'none', 'data' => $v));

}
