<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;

        $data = [];

        foreach ($v as $key => $value){
            if(!in_array($key,['title','web','fileID'])){
                continue;
            }
            if($key == 'fileID'){
                $data['logo'] = fileMeta($v['fileID'],'url');
                continue;
            }
            $data[$key] = $value;
        }


        $db->insert('kurulMeta')
            ->set([
                'sort' => 0,
                'data' => json_encode($data),
                'kurul' => $v['kurul']
            ]);





        echo pageReturn(array('operation' => 'redirect','location' => 'panel/kurul/item-edit?pageID='.$db->lastInsertId(), 'data' => $v));

}
