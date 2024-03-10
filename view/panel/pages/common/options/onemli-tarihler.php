<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Önemli Tarihler</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ayarlar</a></li>
                            <li class="breadcrumb-item active">Önemli Tarihler</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

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
                                            'type' => 'date',
                                            'label' => 'Bildiri Özet Teslim Tarihi',
                                            'name' => 'ozetTeslimDate',
                                            'value' => getOption('ozetTeslimDate')
                                        ),

                                        array(
                                            'type' => 'date',
                                            'label' => 'Bildiri Özet Kabul Bildirimi',
                                            'name' => 'ozetKabulDate',
                                            'value' => getOption('ozetKabulDate')
                                        ),

                                        array(
                                            'type' => 'date',
                                            'label' => 'Tam Metin Bildirilerin Teslim Tarihi',
                                            'name' => 'tamMetinDate',
                                            'value' => getOption('tamMetinDate')
                                        ),
                                        array(
                                            'type' => 'date',
                                            'label' => 'Tam Metin Kabul Bildirimi',
                                            'name' => 'tamMetinKabulDate',
                                            'value' => getOption('tamMetinKabulDate')
                                        ), array(
                                            'type' => 'date',
                                            'label' => 'Sempozyum Programı',
                                            'name' => 'programDate',
                                            'value' => getOption('programDate')
                                        ),
                                        array(
                                            'type' => 'hidden',
                                            'name' => 'postUrl',
                                            'value' => 'options/edit'
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
