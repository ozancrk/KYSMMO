<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;


        $db->update('kurullar')
            ->where('id', $v['id'])
            ->set([
                'name_tr' => $v['name_tr'],
                'name_en' => $v['name_en']
            ]);

        echo pageReturn(array('operation' => 'reload', 'data' => $v));

}
