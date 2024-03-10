<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;


        $i = 1;

        foreach (json_decode($v['data'], true) as $item) {

            $db->update('kurulMeta')
                ->where('id', $item['id'])
                ->set([
                    'sort' => $i
                ]);
            $i++;

        }


        echo pageReturn(array('operation' => 'reload', 'data' => $v));

}
