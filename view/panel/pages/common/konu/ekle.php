<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Konular</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Konu</a></li>
                            <li class="breadcrumb-item active">Ekle</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
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

                                    'name' => 'tr',
                                    'id' => 'tr',
                                ],
                                [
                                    'label' => 'İsim EN',
                                    'type' => 'text',

                                    'name' => 'en',
                                    'id' => 'en',
                                ],
                                [

                                    'type' => 'hidden',
                                    'value' => 'topic/edit',
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
<!--end col-->
    </div>
</div>
</div>
