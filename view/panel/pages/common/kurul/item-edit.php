<?php


$kurulMeta = $db->from('kurulMeta')->where('id',$_GET['pageID'])->first();

$kurulData = json_decode($kurulMeta['data'],true);

?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Liste Ekle</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Liste</a></li>
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

                <div class="card-header">
                    <a class="btn btn-warning" href="panel/kurul/details?id=<?=$kurulMeta['kurul']?>">
                        Listeye Dön
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
                                        'name' => 'title',
                                        'title' => 'title',
                                        'value' => $kurulData['title']
                                    ),
                                    array(
                                        'type' => 'text',
                                        'label' => 'Web Sitesi',
                                        'name' => 'web',
                                        'value' => $kurulData['web']
                                    ),
                                    [
                                        'type' => 'file',
                                        'label' => 'Logo',
                                        'name' => 'logo',
                                        'id' => 'logo'
                                    ],
                                    [
                                        'type' => 'hidden',
                                        'name' => 'upload',
                                        'value' => 'logo'
                                    ],
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'itemid',
                                        'value' => $_GET['pageID']
                                    ),
                                    array(
                                        'type' => 'hidden',
                                        'name' => 'postUrl',
                                        'value' => 'kurul/item-edit'
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
