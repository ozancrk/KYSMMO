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
                            <li class="breadcrumb-item active">Ekle</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

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
                                                ],
                                                [
                                                    'type' => 'text',
                                                    'label' => 'Telefon',
                                                    'name' => 'telefon',
                                                    'id' => 'telefon',
                                                ],
                                                [
                                                    'type' => 'text',
                                                    'label' => 'E-Posta',
                                                    'name' => 'username',
                                                    'id' => 'username',
                                                ],
                                                [
                                                    'type' => 'text',
                                                    'label' => 'Görev Unvan',
                                                    'name' => 'gorev',
                                                    'id' => 'gorev',
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
                                                ],
                                                [
                                                    'type' => 'text',
                                                    'label' => 'Firma Web Sitesi',
                                                    'name' => 'web',
                                                    'id' => 'web',
                                                ],
                                                [
                                                    'type' => 'textarea',
                                                    'label' => 'Açıklama',
                                                    'name' => 'aciklama',
                                                    'id' => 'aciklama',
                                                ],
                                                [
                                                    'type' => 'select',
                                                    'label' => 'ülke',
                                                    'name' => 'ulke',
                                                    'id' => 'ulke',
                                                    'option' => $db->from('ulkeler')->all(),
                                                    'optionValue' => 'kod',
                                                    'optionText' => $SiteLang
                                                ],
                                                [
                                                    'type' => 'file',
                                                    'label' => 'Firma Logosu',
                                                    'name' => 'upload',
                                                    'id' => 'upload',
                                                ],
                                                [
                                                    'type' => 'text',
                                                    'label' => 'Vergi Dairesi',
                                                    'name' => 'vergiDairesi',
                                                    'id' => 'vergiDairesi',
                                                ],
                                                [
                                                    'type' => 'text',
                                                    'label' => 'Vergi Numarası',
                                                    'name' => 'vergiNo',
                                                    'id' => 'vergiNo',
                                                ],
                                                [
                                                    'type' => 'hidden',
                                                    'value' => 'sponsor',
                                                    'name' => 'userType',
                                                    'id' => 'userType',
                                                ],
                                                [
                                                    'type' => 'hidden',
                                                    'value' => 'sponsor/ekle',
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
                    </div>
                </div>
            </div>
        </div><!-- end card-body -->
    </div><!-- end card -->
</div>
<!--end col-->
    </div>


</div>
</div>
