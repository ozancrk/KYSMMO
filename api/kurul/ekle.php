<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;

        $db->insert('kurullar')
            ->set([
                'name_tr' => $v['tr'],
                'name_en' => $v['en'],
                'data' => json_encode([])
            ]);





        echo pageReturn(array('operation' => 'redirect','location' => 'panel/kurul/details?id='.$db->lastInsertId(), 'data' => $v));

}
