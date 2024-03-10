<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Sergi Firmaları</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Sergi Firmaları</a></li>
                            <li class="breadcrumb-item active">Listele</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?=urlCreate('sergi/sergi-firma-ekle')?>" class="btn btn-soft-primary">Yeni Ekle</a>
                    </div>
                    <div class="card-body">

                        <table id="buttons-datatables"
                               class="table table-bordered dt-responsive nowrap table-striped align-middle"
                               style="width:100%">
                            <thead>
                            <tr>
                                <th>Firma</th>
                                <th>Sergi</th>
                                <th>Durum</th>
                                <th>Ödeme Tutarı</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            $roductList = getProducts(3);
                            $productList = [];

                            foreach ($roductList as $productItem){
                                $productList[] = $productItem['id'];
                            }


                            foreach (cartList($productList) as $item):


                                $ItemMeta = getProduct($item['product']);

                                $data = json_decode($item['data'], true);

                                if ($data['status'] == 0) {

                                    $durum1 = '<span class="badge text-bg-danger">Ödeme Bekleniyor</span>';

                                } else if ($data['status'] == 1) {

                                    $durum1 = '<span class="badge text-bg-warning">Kısmi Ödeme Alındı</span>';

                                } else if ($data['status'] == 2) {

                                    $durum1 = '<span class="badge text-bg-success">Ödeme Tamamlandı</span>';

                                }

                                if (!isset($data['payment'])) {
                                    $data['payment'] = 0;
                                }


                                ?>
                                <tr>
                                    <td><?= getUserMeta($item['user'], 'name') ?></td>
                                    <td><?= $ItemMeta['name_'.$SiteLang] ?></td>
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
                                                    <a href="<?= urlCreate('sergi/sergi-firma-details?ID=' . $item['user']) ?>"
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
        <!-- end page title -->
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
