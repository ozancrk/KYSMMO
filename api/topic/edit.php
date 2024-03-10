<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;

        if ($v['topicID']) {


            $db->update('topics')->where('id', $v['topicID'])->set([
                'tr' => $v['tr'],
                'en' => $v['en'],
            ]);

            echo pageReturn(array('operation' => 'reload', 'data' => $v));
            die();
        } else {
            $db->insert('topics')->set([
                'tr' => $v['tr'],
                'en' => $v['en'],
                'parent' => 0,
            ]);
            echo pageReturn(array('operation' => 'redirect', 'location' =>'panel/konu/duzenle?id='.$db->lastInsertId() , 'data' => $v));
            die();
        }



}
