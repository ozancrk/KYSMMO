<?php


$ItemMeta = getUserMeta($_GET['ID']);

?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Sponsor Bilgileri</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sponsor</a></li>
                            <li class="breadcrumb-item active"><?= $ItemMeta['name'] ?></li>
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
                    <!-- Tab panes -->
                    <div class="row">
                        <div class="col-md-6 col-12">
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
                                                    'value' => '<h5>Firma Yetkilisinin</h5>'
                                                ],
                                                [
                                                    'type' => 'text',
                                                    'label' => 'İsim Soyisim',
                                                    'name' => 'personelName',
                                                    'id' => 'personelName',
                                                    'value' => $ItemMeta['personelName'],
                                                ],
                                                [
                                                    'type' => 'text',
                                                    'label' => 'Telefon',
                                                    'name' => 'telefon',
                                                    'id' => 'telefon',
                                                    'value' => $ItemMeta['telefon'],
                                                ],
                                                [
                                                    'type' => 'text',
                                                    'label' => 'E-Posta',
                                                    'name' => 'username',
                                                    'id' => 'username',
                                                    'value' => $ItemMeta['username'],
                                                ],
                                                [
                                                    'type' => 'text',
                                                    'label' => 'Görev Unvan',
                                                    'name' => 'gorev',
                                                    'id' => 'gorev',
                                                    'value' => $ItemMeta['gorev'],
                                                ],
                                                [
                                                    'type' => 'custom',
                                                    'value' => '<h5>Sponsor Firmanın</h5>'
                                                ],
                                                [
                                                    'type' => 'text',
                                                    'label' => 'Firma Adı',
                                                    'name' => 'name',
                                                    'id' => 'name',
                                                    'value' => $ItemMeta['name'],
                                                ],
                                                [
                                                    'type' => 'text',
                                                    'label' => 'Firma Web Sitesi',
                                                    'name' => 'web',
                                                    'id' => 'web',
                                                    'value' => $ItemMeta['web'],
                                                ],
                                                [
                                                    'type' => 'textarea',
                                                    'label' => 'Açıklama',
                                                    'name' => 'aciklama',
                                                    'id' => 'aciklama',
                                                    'value' => $ItemMeta['aciklama'],
                                                ],
                                                [
                                                    'type' => 'select',
                                                    'label' => 'ülke',
                                                    'name' => 'ulke',
                                                    'value' => $ItemMeta['ulke'],
                                                    'id' => 'ulke',
                                                    'option' => $db->from('ulkeler')->all(),
                                                    'optionValue' => 'kod',
                                                    'optionText' => $SiteLang
                                                ],
                                                [
                                                    'type' => 'file',
                                                    'label' => 'Firma Logosu',
                                                    'name' => 'logo',
                                                    'id' => 'logo',
                                                ],
                                                [
                                                    'type' => 'hidden',
                                                    'name' => 'upload',
                                                    'value' => 'logo'
                                                ],
                                                [
                                                    'type' => 'text',
                                                    'label' => 'Vergi Dairesi',
                                                    'name' => 'vergiDairesi',
                                                    'id' => 'vergiDairesi',
                                                    'value' => $ItemMeta['vergiDairesi'],
                                                ],
                                                [
                                                    'type' => 'text',
                                                    'label' => 'Vergi Numarası',
                                                    'name' => 'vergiNo',
                                                    'id' => 'vergiNo',
                                                    'value' => $ItemMeta['vergiNo'],
                                                ],
                                                [
                                                    'type' => 'hidden',
                                                    'value' => $_GET['ID'],
                                                    'name' => 'userID',
                                                    'id' => 'userID',
                                                ],
                                                [
                                                    'type' => 'hidden',
                                                    'value' => 'sponsor/edit',
                                                    'name' => 'postUrl',
                                                    'id' => 'postUrl',
                                                ]
                                            ]
                                        ]
                                    );

                                    ?>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-body">

                                    <table class="table table-nowrap">
                                        <thead>
                                        <tr>
                                            <th scope="col">Sponsorluk Paketi</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        foreach (getProducts(2) as $item) {

                                            $cartCheck = $db->from('cart')
                                                ->where('user', $_GET['ID'])
                                                ->where('product', $item['id'])
                                                ->where('deleteStatus', 0)
                                                ->first();


                                            ?>
                                            <tr>
                                                <td scope="row">
                                                    <?= $item['name_' . $SiteLang] ?>
                                                </td>
                                                <?php createJSObj('cart' . $item['id'], array('userID' => $_GET['ID'], 'product' => $item['id'])); ?>
                                                <td class="text-muted">
                                                    <?php if ($cartCheck): ?>
                                                        <button class="btn btn-danger"
                                                                onclick="processConfirm('cartUSer','<?= setFormTokenSession() ?>',<?= 'cart' . $item['id'] ?>,'')">
                                                            KALDIR
                                                        </button>
                                                    <?php else: ?>
                                                        <button class="btn btn-success"
                                                                onclick="processConfirm('cartUSer','<?= setFormTokenSession() ?>',<?= 'cart' . $item['id'] ?>,'')">
                                                            EKLE
                                                        </button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>

                                        <?php } ?>


                                        </tbody>
                                    </table>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div>
                    </div>
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
