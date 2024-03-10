<?php


$pageMeta = getPageMeta(1);


if ($_GET['pageLang']) {
    $pageLang = $_GET['pageLang'];
} else {
    $pageLang = 'tr';
}

?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?= $pageMeta[$SiteLang] ?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sayfalar</a></li>
                            <li class="breadcrumb-item active"><?= $pageMeta[$SiteLang] ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!$pageMeta){ ?>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Hatalı Bildiri ID'si</h4>
                        </div><!-- end card header -->
                    </div>
                </div>
            </div>
        <?php }else{ ?>
    </div>
    <div class="row">
        <div class="col-12">

            <div class="card" data-id="slider">
                <div class="card-header">
                    <a class="btn btn-primary"
                       href="/panel/sayfa/anasayfa?pageLang=<?= ($pageLang == 'tr' ? 'en' : 'tr') ?>">
                        <?= ($pageLang == 'tr' ? 'İngilizce İçerik Düzenle' : 'Türkçe İçerik Düzenle') ?>
                    </a>
                    <a target="_blank" class="btn btn-success"
                       href="<?= $scriptConfig['mainURL'] . '/' . $pageMeta['guid_' . $pageLang] ?>">
                        Sayfayı Aç
                    </a>
                </div>
                <div class="card-body">

                    <?php

                    echo createForm(
                        array(
                            'id' => 'serialize',
                            'buttonText' => 'Gönder',
                            'elements' =>
                                array(
                                    array(
                                        'type' => 'text',
                                        'label' => 'Başlık',
                                        'name' => $pageLang,
                                        'value' => $pageMeta[$pageLang]
                                    ),
                                    array(
                                        'type' => 'text',
                                        'label' => 'URL',
                                        'name' => 'url',
                                        'value' => $scriptConfig['mainURL'] . '/' . $pageMeta['guid_' . $pageLang],
                                        'disabled' => true
                                    ),
                                    [
                                        'type' => 'file',
                                        'label' => 'Arkaplan',
                                        'name' => 'slider_bg',
                                        'id' => 'slider_bg',
                                    ],
                                    [
                                        'type' => 'hidden',
                                        'name' => 'upload',
                                        'value' => 'slider_bg'
                                    ],
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'id',
                                        'value' => 1
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'lang',
                                        'value' => $pageLang
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'postUrl',
                                        'value' => 'pages/anasayfa-edit'
                                    )
                                )
                        )
                    );


                    ?>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <?php

                    echo createForm(
                        array(
                            'id' => 'serialize',
                            'buttonText' => 'Gönder',
                            'elements' =>
                                array(
                                    array(
                                        'type' => 'editor',
                                        'label' => 'Slider',
                                        'name' => 'slider_' . $pageLang,
                                        'id' => 'slider_' . $pageLang,
                                        'value' => $pageMeta['slider_' . $pageLang]
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'pageID',
                                        'id' => 'pageID',
                                        'value' => 1
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'editorType',
                                        'id' => 'editorType',
                                        'value' => 'slider_' . $pageLang
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'postUrl',
                                        'id' => 'postUrl',
                                        'value' => 'pages/anasayfa-edit'
                                    )
                                )
                        )
                    );


                    ?>

                </div>


            </div>
            <div class="card">
                <div class="card-body">
                    <?php
                    echo createForm(
                        array(
                            'id' => 'serialize',
                            'buttonText' => 'Gönder',
                            'elements' =>
                                array(
                                    array(
                                        'type' => 'custom',
                                        'value' => '<h5>Destekleyen Kurumlar</h5>'
                                    ),
                                    array(
                                        'type' => 'checkbox',
                                        'label' => 'Anasayfada Göster / Gizle',
                                        'name' => 'status_destek_' . $pageLang,
                                        'value' => $pageMeta['status_destek_' . $pageLang]
                                    ),
                                    [
                                        'type' => 'select',
                                        'option' => $db->from('kurullar')->all(),
                                        'label' => 'Liste',
                                        'optionValue' => 'id',
                                        'optionText' => 'name_' . $pageLang,
                                        'name' => 'kurul_destek'
                                    ],
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'pageID',
                                        'id' => 'pageID',
                                        'value' => 1
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'ckeditor',
                                        'value' => 'cagri_' . $pageLang,
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'postUrl',
                                        'id' => 'postUrl',
                                        'value' => 'pages/anasayfa-edit'
                                    )
                                )
                        )
                    );

                    ?>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <?php
                    echo createForm(
                        array(
                            'id' => 'serialize',
                            'buttonText' => 'Gönder',
                            'elements' =>
                                array(
                                    array(
                                        'type' => 'custom',
                                        'value' => '<h5>Çağrı Metni</h5>'
                                    ),
                                    array(
                                        'type' => 'checkbox',
                                        'label' => 'Anasayfada Göster / Gizle',
                                        'name' => 'status_cagri_' . $pageLang,
                                        'value' => $pageMeta['status_cagri_' . $pageLang]
                                    ),
                                    array(
                                        'type' => 'ckeditor',
                                        'label' => 'Slider',
                                        'name' => 'cagri_' . $pageLang,
                                        'id' => 'cagri_' . $pageLang,
                                        'value' => $pageMeta['cagri_' . $pageLang]
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'pageID',
                                        'id' => 'pageID',
                                        'value' => 1
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'ckeditor',
                                        'value' => 'cagri_' . $pageLang,
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'postUrl',
                                        'id' => 'postUrl',
                                        'value' => 'pages/anasayfa-edit'
                                    )
                                )
                        )
                    );

                    ?>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <?php

                    echo createForm(
                        array(
                            'id' => 'serialize',
                            'buttonText' => 'Gönder',
                            'elements' =>
                                array(
                                    array(
                                        'type' => 'custom',
                                        'value' => '<h5>Önemli Tarihler</h5>'
                                    ),
                                    array(
                                        'type' => 'checkbox',
                                        'label' => 'Anasayfada Göster / Gizle',
                                        'name' => 'status_onemliTarihler_' . $pageLang,
                                        'value' => $pageMeta['status_onemliTarihler_' . $pageLang]
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'pageID',
                                        'id' => 'pageID',
                                        'value' => 1
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'postUrl',
                                        'id' => 'postUrl',
                                        'value' => 'pages/anasayfa-edit'
                                    )
                                )
                        )
                    );


                    ?>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <?php

                    echo createForm(
                        array(
                            'id' => 'serialize',
                            'buttonText' => 'Kaydet',
                            'elements' =>
                                array(
                                    array(
                                        'type' => 'text',
                                        'label' => 'Başlık',
                                        'name' => 'title_sponsor_' . $pageLang,
                                        'id' => 'title_sponsor_' . $pageLang,
                                        'value' => $pageMeta['title_sponsor_' . $pageLang]
                                    ),
                                    array(
                                        'type' => 'checkbox',
                                        'label' => 'Anasayfada Göster / Gizle',
                                        'name' => 'status_sponsor_' . $pageLang,
                                        'value' => $pageMeta['status_sponsor_' . $pageLang]
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'pageID',
                                        'id' => 'pageID',
                                        'value' => 1
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'postUrl',
                                        'id' => 'postUrl',
                                        'value' => 'pages/anasayfa-edit'
                                    )
                                )
                        )
                    );


                    ?>
                </div>
                <div class="card-body">
                    <?php createJSObj('sponsor', array('list' => 'sponsorlist')); ?>
                    <button class="btn btn-success"
                            onclick="processConfirm('sortSave','<?= setFormTokenSession() ?>',sponsor,'')">
                        Sıralamayı
                        Kaydet
                    </button>
                    <ul id="multiDragDemo" class="list-group col sponsorlist mt-4">
                        <?php

                        $cartList = cartListbyCat(2);

                        foreach ($cartList as $item):

                            $ItemMeta = getProduct($item['product']);

                            if ($item['sort'] == 0) {
                                continue;
                            }

                            ?>
                            <li class="list-group-item"
                                data-id="<?= $item['id'] ?>"><?= $ItemMeta['name_' . $SiteLang] ?>
                                <pre><?= getUserMeta($item['user'], 'name') ?></pre>
                            </li>
                        <?php endforeach; ?>
                        <?php

                        foreach ($cartList as $item):

                            $ItemMeta = getProduct($item['product']);

                            if ($item['sort'] != 0) {
                                continue;
                            }

                            ?>
                            <li class="list-group-item"
                                data-id="<?= $item['id'] ?>"><?= $ItemMeta['name_' . $SiteLang] ?>
                                <pre><?= getUserMeta($item['user'], 'name') ?></pre>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <?php

                    echo createForm(
                        array(
                            'id' => 'serialize',
                            'buttonText' => 'Kaydet',
                            'elements' =>
                                array(
                                    array(
                                        'type' => 'text',
                                        'label' => 'Başlık',
                                        'name' => 'title_sergi_' . $pageLang,
                                        'id' => 'title_sergi_' . $pageLang,
                                        'value' => $pageMeta['title_sergi_' . $pageLang]
                                    ),
                                    array(
                                        'type' => 'checkbox',
                                        'label' => 'Anasayfada Göster / Gizle',
                                        'name' => 'status_sergi_' . $pageLang,
                                        'value' => $pageMeta['status_sergi_' . $pageLang]
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'pageID',
                                        'id' => 'pageID',
                                        'value' => 1
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'postUrl',
                                        'id' => 'postUrl',
                                        'value' => 'pages/anasayfa-edit'
                                    )
                                )
                        )
                    );


                    ?>
                </div>

                <div class="card-body">
                    <?php createJSObj('sergi', array('list' => 'sergilist')); ?>
                    <button class="btn btn-success"
                            onclick="processConfirm('sortSave','<?= setFormTokenSession() ?>',sergi,'')">Sıralamayı
                        Kaydet
                    </button>
                    <ul id="multiDragDemo" class="list-group col sergilist mt-4">
                        <?php

                        $cartList = cartListbyCat(3);

                        foreach ($cartList as $item):

                            $ItemMeta = getProduct($item['product']);

                            if ($item['sort'] == 0) {
                                continue;
                            }

                            ?>
                            <li class="list-group-item"
                                data-id="<?= $item['id'] ?>"> <?= $ItemMeta['name_' . $SiteLang] ?>
                                <pre><?= getUserMeta($item['user'], 'name') ?> </pre>
                            </li>
                        <?php endforeach; ?>
                        <?php

                        foreach ($cartList as $item):

                            $ItemMeta = getProduct($item['product']);

                            if ($item['sort'] != 0) {
                                continue;
                            }

                            ?>
                            <li class="list-group-item"
                                data-id="<?= $item['id'] ?>"><?= $ItemMeta['name_' . $SiteLang] ?>
                                <pre><?= getUserMeta($item['user'], 'name') ?></pre>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>
            </div>
            <div class="card" data-id="slider">
                <div class="card-header">
                    <h5>Katılmcı Firmalar</h5>
                </div>
                <div class="card-body">

                    <?php

                    echo createForm(
                        array(
                            'id' => 'serialize',
                            'buttonText' => 'Gönder',
                            'elements' =>
                                array(
                                    [
                                        'type' => 'file',
                                        'label' => 'Katılmıcı Firmalar',
                                        'name' => 'katilimci_' . $pageLang,
                                        'id' => 'katilimci_' . $pageLang,
                                    ],
                                    [
                                        'type' => 'hidden',
                                        'name' => 'upload',
                                        'value' => 'katilimci_' . $pageLang,
                                    ],
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'id',
                                        'value' => $_GET['pageID']
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'lang',
                                        'value' => $pageLang
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'postUrl',
                                        'value' => 'pages/anasayfa-edit'
                                    )
                                )
                        )
                    );


                    ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
