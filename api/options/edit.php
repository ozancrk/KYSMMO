<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;



        foreach ($v as $key => $value){

            if(in_array($key,['postUrl','token','fileID'])){
                continue;
            }

            if(!getOption($key)){
                $db->insert('options')->set([
                    'meta' => $key,
                    'value' => $value,
                ]);
            }else{
                $db->update('options')->
                where('meta',$key)->
                set([
                    'value' => $value,
                ]);
            }


        }


        echo pageReturn(array('operation' => 'reload', 'data' => $v));

}
