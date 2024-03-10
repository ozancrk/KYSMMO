<?php

require_once '../api_include.php';

switch ( $requestMethod ) {
	case 'POST':
		$v = $_POST;
        $userID = $v['userID'];

        if($v['fileID']){
            userMetaCreate( $userID, 'logo', fileMeta($v['fileID'],'url') );

        }


		$ignoreKey = array('userEmail','userType','lang','fileID','userID');
		foreach ($v as $key => $value){
			if(in_array($key,$ignoreKey)){
				continue;
			}
			userMetaCreate( $userID, $key, $value );
		}
		echo pageReturn(array( 'operation' => 'reload','data' => $v ));

}
