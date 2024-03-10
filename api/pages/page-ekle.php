<?php

require_once '../api_include.php';

switch ($requestMethod) {
    case 'POST':
        $v = $_POST;

        $db->insert('pages')
            ->set([
                'tr' => $v['tr'],
                'en' => $v['en'],
                'menu' => 0,
                'parent' => 0,
                'type' => 0,
                'guid_tr' => seoLink($v['tr']),
                'guid_en' => seoLink($v['en']),
            ]);





        echo pageReturn(array('operation' => 'redirect','location' => 'panel/sayfa/details?pageID='.$db->lastInsertId(), 'data' => $v));

}
