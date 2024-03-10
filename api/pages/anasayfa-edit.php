<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;

        if (isset($v['ckeditor'])) {
            if ($v['status_' . $v['ckeditor']] = 'on') {
                $v['status_' . $v['ckeditor']] = 1;
            } else {
                $v['status_' . $v['ckeditor']] = 0;
            }
        }

        $pageMeta = getPageMeta($v['pageID']);

        foreach ($v as $key => $value) {

            if (in_array($key, ['pageID', 'editorType', 'postUrl', 'ckeditor', 'pageContent', 'token']) or ($key == 'fileID' and empty($value))) {
                continue;
            }


            if ($key == 'slider_tr' or $key == 'slider_en') {
                $value = str_replace('<p>', '<span>', $value);
                $value = str_replace('</p>', '</span>', $value);
                $value = str_replace('<li>', '<li><span>', $value);
                $value = str_replace('</li>', '</span></li>', $value);
                $value = str_replace('<ul>', '<ul class="tg-matadata tg-eventmatadata">', $value);
            }

            if ($pageMeta[$key]) {
                $db->update('pageMeta')
                    ->where('page', $v['pageID'])
                    ->where('meta', $key)
                    ->set([
                        'value' => $value
                    ]);

            } else {
                $db->insert('pageMeta')
                    ->set([
                        'value' => $value,
                        'page' => $v['pageID'],
                        'meta' => $key
                    ]);
            }
        }
        echo pageReturn(array('operation' => 'none', 'data' => $v));

}
