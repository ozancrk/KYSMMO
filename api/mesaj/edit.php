<?php


require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;

        $db->update('mailsablon')
            ->where('id', $v['id'])
            ->set([
                'tr' => $v['tr'],
                'en' => $v['en'],
            ]);

        echo pageReturn(array('operation' => 'reload', 'data' => $v));

}
