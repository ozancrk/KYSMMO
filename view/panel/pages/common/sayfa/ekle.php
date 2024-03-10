<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Sayfa Ekle</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sayfalar</a></li>
                            <li class="breadcrumb-item active">Ekle</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
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
                                        'type' => 'text',
                                        'label' => 'Başlık TR',
                                        'name' => 'tr',
                                    ),
                                    array(
                                        'type' => 'text',
                                        'label' => 'Başlık EN',
                                        'name' => 'en',
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'postUrl',
                                        'value' => 'pages/page-ekle'
                                    )
                                )
                        )
                    );


                    ?>

                </div>
            </div>
        </div>
    </div>

</div>
</div>
