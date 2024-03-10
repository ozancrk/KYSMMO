<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;


        $cartCheck = $db->from('cart')
            ->where('user', $v['userID'])
            ->where('product', $v['product'])
            ->first();

        if ($cartCheck) {

            if ($cartCheck['deleteStatus'] == 1) {
                $db->update('cart')
                    ->where('user', $v['userID'])
                    ->where('product', $v['product'])
                    ->set([
                        'deleteStatus' => 0
                    ]);
            } else {
                $db->update('cart')
                    ->where('user', $v['userID'])
                    ->where('product', $v['product'])
                    ->set([
                        'deleteStatus' => 1
                    ]);
            }


        } else {

            $db->insert('cart')
                ->set([
                    'user' => $v['userID'],
                    'product' =>$v['product'],
                    'data' => json_encode(['status' => 0]),
                    'deleteStatus' => 0,
                    'sort' => 0
                ]);

        }


        echo pageReturn(array('operation' => 'none', 'data' => $v));

}
