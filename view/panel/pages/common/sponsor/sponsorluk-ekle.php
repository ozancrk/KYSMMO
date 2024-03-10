<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Sponsorluk Bilgileri</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sponsorluk</a></li>
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
                                                    'label' => 'İsim TR',
                                                    'type' => 'text',
                                                    'name' => 'name_tr',
                                                    'id' => 'name_tr',
                                                ],
                                                [
                                                    'label' => 'İsim EN',
                                                    'type' => 'text',
                                                    'name' => 'name_en',
                                                    'id' => 'name_en',
                                                ],
                                                [
                                                    'label' => 'Fiyat',
                                                    'type' => 'text',
                                                    'name' => 'price',
                                                    'id' => 'price',
                                                ],
                                                [
                                                    'label' => 'Para Birimi',
                                                    'type' => 'select',
                                                    'name' => 'currency',
                                                    'option' => $db->from('currency')->all(),
                                                    'optionValue' => 'id',
                                                    'optionText' => 'name',
                                                ],
                                                [
                                                    'label' => 'Satışta',
                                                    'type' => 'checkbox',
                                                    'name' => 'productStatus',
                                                    'id' => 'productStatus',
                                                ],
                                                [
                                                    'label' => 'İçerik TR',
                                                    'type' => 'editor',
                                                    'name' => 'content_tr',
                                                    'id' => 'content_tr',
                                                ],
                                                [
                                                    'label' => 'İçerik EN',
                                                    'type' => 'editor',
                                                    'name' => 'content_en',
                                                    'id' => 'content_en',
                                                ],
                                                [
                                                    'type' => 'hidden',
                                                    'name' => 'id',
                                                    'id' => 'id',
                                                ],
                                                [
                                                    'type' => 'hidden',
                                                    'value' => 'content_en',
                                                    'name' => 'editorType',
                                                    'id' => 'editorType',
                                                ],
                                                [
                                                    'type' => 'hidden',
                                                    'value' => 'content_tr',
                                                    'name' => 'editorType',
                                                    'id' => 'editorType',
                                                ],
                                                [
                                                    'type' => 'hidden',
                                                    'value' => 2,
                                                    'name' => 'cat',
                                                    'id' => 'cat',
                                                ],
                                                [
                                                    'type' => 'hidden',
                                                    'value' => 'product/ekle',
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
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!--end col-->


</div>

