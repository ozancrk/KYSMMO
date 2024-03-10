<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;


        if (!userCheck($v['username'])) {

            $userID = $db->update('users')->where('username', $v['username'])->set(['sponsor' => 1]);
            $user = $db->from('users')->where('username', $v['username'])->first();
            $userID = $user['id'];
        } else {

            $userPermission = array(
                'admin' => 0,
                'hakem' => 0,
                'editor' => 0,
                'yazar' => 0,
                'delege' => 0,
                'sponsor' => 1,
                'sergi' => 0,
            );

            $userID = userCreate($v['username'], $userPermission, $v['ulke']);

        }

        if ($v['fileID']) {
            userMetaCreate($userID, 'logo', fileMeta($v['fileID'], 'url'));

        }


        $ignoreKey = array('userEmail', 'userType', 'lang', 'fileID');
        foreach ($v as $key => $value) {
            if (in_array($key, $ignoreKey)) {
                continue;
            }
            userMetaCreate($userID, $key, $value);
        }
        echo pageReturn(array('operation' => 'redirect', 'location' => 'panel/sponsor/sponsor-details?ID='.$userID , 'data' => $v));

}
