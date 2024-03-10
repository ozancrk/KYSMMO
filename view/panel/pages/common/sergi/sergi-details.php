<?php


$ItemMeta = getProduct($_GET['ID']);

?>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Bildiri Bilgileri</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sergi</a></li>
                            <li class="breadcrumb-item active"><?= $ItemMeta['name_' . $SiteLang] ?></li>
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
                    <ul class="nav nav-tabs nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                Paket Bilgileri
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#options" role="tab">
                                Satış Bilgileri
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="home" role="tabpanel">
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
                                                            'value' => $ItemMeta['name_tr'],
                                                            'name' => 'name_tr',
                                                            'id' => 'name_tr',
                                                        ],
                                                        [
                                                            'label' => 'İsim EN',
                                                            'type' => 'text',
                                                            'value' => $ItemMeta['name_en'],
                                                            'name' => 'name_en',
                                                            'id' => 'name_en',
                                                        ],
                                                        [
                                                            'label' => 'Fiyat',
                                                            'type' => 'text',
                                                            'value' => $ItemMeta['price'],
                                                            'name' => 'price',
                                                            'id' => 'price',
                                                            'disabled' => (count(cartList($_GET['ID']) > 0 ? 'disabled' : ''))
                                                        ],
                                                        [
                                                            'label' => 'Para Birimi',
                                                            'type' => 'select',
                                                            'name' => 'currency',
                                                            'option' => $db->from('currency')->all(),
                                                            'optionValue' => 'id',
                                                            'optionText' => 'name',
                                                            'value' => $ItemMeta['currency'],
                                                            'disabled' => (count(cartList($_GET['ID']) > 0 ? 'disabled' : ''))
                                                        ],
                                                        [
                                                            'label' => 'Satışta',
                                                            'type' => 'checkbox',
                                                            'value' => $ItemMeta['status'],
                                                            'name' => 'productStatus',
                                                            'id' => 'productStatus',
                                                        ],
                                                        [
                                                            'label' => 'İçerik TR',
                                                            'type' => 'editor',
                                                            'value' => $ItemMeta['content_tr'],
                                                            'name' => 'content_tr',
                                                            'id' => 'content_tr',
                                                        ],
                                                        [
                                                            'label' => 'İçerik EN',
                                                            'type' => 'editor',
                                                            'value' => $ItemMeta['content_en'],
                                                            'name' => 'content_en',
                                                            'id' => 'content_en',
                                                        ],
                                                        [

                                                            'type' => 'hidden',
                                                            'value' => $ItemMeta['id'],
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
                                                            'value' => 'product/edit',
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
                        <div class="tab-pane" id="options" role="tabpanel">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="example"
                                                   class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                                   style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Sponsor</th>
                                                    <th>Durum</th>
                                                    <th>Ödeme Tutarı</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php


                                                foreach (cartList($_GET['ID']) as $item):

                                                    $data = json_decode($item['data'], true);

                                                    if ($data['status'] == 0) {

                                                        $durum1 = '<span class="badge text-bg-danger">Ödeme Bekleniyor</span>';

                                                    } else if ($data['status'] == 1) {

                                                        $durum1 = '<span class="badge text-bg-warning">Kısmi Ödeme Alındı</span>';

                                                    } else if ($data['status'] == 2) {

                                                        $durum1 = '<span class="badge text-bg-success">Ödeme Alındı</span>';

                                                    }

                                                    if (!isset($data['payment'])) {
                                                        $data['payment'] = 0;
                                                    }


                                                    ?>
                                                    <tr>
                                                        <td><?= getUserMeta($item['user'], 'name') ?></td>
                                                        <td><?= $durum1 ?></td>
                                                        <td><?= $data['payment'] . ' ' . currencyMeta($ItemMeta['currency'])['icon'] ?></td>
                                                        <td>
                                                            <div class="dropdown d-inline-block">
                                                                <button class="btn btn-soft-secondary btn-sm dropdown"
                                                                        type="button"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill align-middle"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li>
                                                                        <a href="<?= urlCreate('sponsor/sponsor-details?ID=' . $item['user']) ?>"
                                                                           class="dropdown-item edit-item-btn"><i
                                                                                    class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                            Detaylar</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
