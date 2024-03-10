<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;



        $data = $db->from('kurulMeta')->where('id',$v['itemid'])->first();
        $data = json_decode($data['data'],true);
        foreach ($v as $key => $value){
            if(!in_array($key,['title','web','fileID'])){
                continue;
            }
            if($key == 'fileID' AND !empty($v['fileID'])){
                if(fileMeta($v['fileID'],'url')){
                    $data['logo'] = fileMeta($v['fileID'],'url');
                }
                continue;
            }
            $data[$key] = $value;
        }

        $dataJson = json_encode($data);


        $db->update('kurulMeta')
            ->where('id',$v['itemid'])
            ->set([
                'data' => $dataJson
            ]);





        echo pageReturn(array('operation' => 'none', 'data' => $v));

}
