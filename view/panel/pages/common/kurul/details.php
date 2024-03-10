<?php


$pageMeta = $db->from('kurullar')->where('id',$_GET['id'])->first();


?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?= $pageMeta['name_'.$SiteLang] ?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Kurul</a></li>
                            <li class="breadcrumb-item active"><?= $pageMeta['name_'.$SiteLang] ?></li>
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
            <div class="card">
                <div class="card-header">

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
                                        'label' => 'Başlık TR',
                                        'name' => 'name_tr',
                                        'value' => $pageMeta['name_tr']
                                    ),
                                    array(
                                        'type' => 'text',
                                        'label' => 'Başlık EN',
                                        'name' => 'name_en',
                                        'value' => $pageMeta['name_en']
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'postUrl',
                                        'value' => 'kurul/edit'
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'id',
                                        'value' => $_GET['id']
                                    )
                                )
                        )
                    );


                    ?>

                </div>
            </div>
        </div>
            <div class="card">

                <div class="card-body">
                    <?php createJSObj('kurul', array('list' => 'kurul','kurulID' => $_GET['id'])); ?>
                    <button class="btn btn-success"
                            onclick="processConfirm('sortSaveKurul','<?= setFormTokenSession() ?>',kurul,'')">
                        Sıralamayı
                        Kaydet
                    </button>
                    <a target="_blank" class="btn btn-warning" href="panel/kurul/item-add?id=<?=$_GET['id']?>">
                        Ekle
                    </a>
                    <ul id="multiDragDemo" class="list-group col kurul mt-4">
                        <?php

                        $cartList = $db->from('kurulMeta')->where('kurul',$_GET['id'])->all();



                        foreach ($cartList as $item):

                            $data = json_decode($item['data'],true);

                            if ($item['sort'] == 0) {
                                continue;
                            }

                            ?>
                            <li class="list-group-item"
                                data-id="<?= $item['id'] ?>"><?= $data['title'] ?>

                                <div class="text-end">
                                    <a class="btn btn-primary" href="panel/kurul/item-edit?pageID=<?= $item['id'] ?>">Düzenle</a>
                                </div>

                                <?php

                                echo createForm(
                                    array(
                                        'id' => 'serialize',
                                        'buttonText' => 'Sil',
                                        'btnclass' => 'btn-danger',
                                        'elements' =>
                                            array(
                                                array(
                                                    'type' => 'hidden',
                                                    'name' => 'postUrl',
                                                    'value' => 'kurul/item-delete'
                                                ),
                                                array(
                                                    'type' => 'hidden',
                                                    'name' => 'itemid',
                                                    'value' => $item['id']
                                                )
                                            )
                                    )
                                );


                                ?>
                            </li>
                        <?php endforeach; ?>
                        <?php

                        foreach ($cartList as $item):
                            $data = json_decode($item['data'],true);

                            if ($item['sort'] != 0) {
                                continue;
                            }

                            ?>
                            <li class="list-group-item"
                                data-id="<?= $item['id'] ?>"><?= $data['title'] ?>

                                <div class="text-end">
                                    <a class="btn btn-primary" href="panel/kurul/item-edit?pageID=<?= $item['id'] ?>">Düzenle</a>
                                </div>

                                <?php

                                echo createForm(
                                    array(
                                        'id' => 'serialize',
                                        'buttonText' => 'Sil',
                                        'btnclass' => 'btn-danger',
                                        'elements' =>
                                            array(
                                                array(
                                                    'type' => 'hidden',
                                                    'name' => 'postUrl',
                                                    'value' => 'kurul/item-delete'
                                                ),
                                                array(
                                                    'type' => 'hidden',
                                                    'name' => 'itemid',
                                                    'value' => $item['id']
                                                )
                                            )
                                    )
                                );


                                ?>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>
            </div>
    </div>
    <?php } ?>
</div>
</div>
