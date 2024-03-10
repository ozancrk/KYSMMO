<?php


$ItemMeta = $db->from('mailsablon')
    ->where('id', $_GET['ID'])
    ->first();

?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Mesaj Metinleri</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Mesaj Metinleri</a></li>
                            <li class="breadcrumb-item active"><?= $ItemMeta['aciklama'] ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!$ItemMeta){ ?>
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">


                    <?php
                    echo createForm(
                        [
                            'id' => 'serialize',
                            'buttonText' => 'Kaydet',
                            'elements' => [
                                [
                                        'type' => 'custom',
                                    'value' => '<h5>'.$ItemMeta['aciklama'].'</h5>'
                                ],
                                [
                                    'label' => 'İçerik TR',
                                    'type' => 'editor',
                                    'value' => $ItemMeta['tr'],
                                    'name' => 'tr',
                                    'id' => 'tr',
                                ],
                                [
                                    'label' => 'İçerik EN',
                                    'type' => 'editor',
                                    'value' => $ItemMeta['en'],
                                    'name' => 'en',
                                    'id' => 'en',
                                ],
                                [

                                    'type' => 'hidden',
                                    'value' => $ItemMeta['id'],
                                    'name' => 'id',
                                    'id' => 'id',
                                ],
                                [

                                    'type' => 'hidden',
                                    'value' => 'tr',
                                    'name' => 'editorType',
                                    'id' => 'editorType',
                                ],
                                [

                                    'type' => 'hidden',
                                    'value' => 'en',
                                    'name' => 'editorType',
                                    'id' => 'editorType',
                                ],
                                [

                                    'type' => 'hidden',
                                    'value' => 'mesaj/edit',
                                    'name' => 'postUrl',
                                    'id' => 'postUrl',
                                ]
                            ]
                        ]
                    );

                    ?>


                </div>


            </div>
        </div><!-- end card-body -->
    </div><!-- end card -->
</div>
<!--end col-->
    </div>

<?php } ?>
</div>
</div>
