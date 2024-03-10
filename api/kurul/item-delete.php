<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;



        $db->delete('kurulMeta')->where('id',$v['itemid'])->done();



        echo pageReturn(array('operation' => 'reload', 'data' => $v));

}
