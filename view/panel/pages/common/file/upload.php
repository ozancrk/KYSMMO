<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dosyalar</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dosyalar</a></li>
                            <li class="breadcrumb-item active">Dosya Listesi</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dropzone">
                            <div class="fallback">
                                <input name="file" type="file" multiple="multiple">
                                <input type="hidden" id="token" name="token" value="<?= setFormTokenSession() ?>">
                            </div>
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                </div>

                                <h4>Yüklemek istediğiniz dosyayı sürükleyip bırakın ya da tıklayarak seçin</h4>
                            </div>
                        </div>

                        <ul class="list-unstyled mb-0" id="dropzone-preview">
                            <li class="mt-2" id="dropzone-preview-list">
                                <!-- This is used as the file preview template -->
                                <div class="border rounded">
                                    <div class="d-flex p-2">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-sm bg-light rounded">
                                                <img data-dz-thumbnail class="img-fluid rounded d-block" src="#"
                                                     alt="Dropzone-Image"/>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="pt-1">
                                                <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 ms-3">
                                            <button data-dz-remove class="btn btn-sm btn-primary">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- end dropzon-preview -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div> <!-- end col -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Dosyalar</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <ul class="list-unstyled mb-0" id="dropzone-preview">

                            <?php foreach ($db->from('files')->where('area', 1)->all() as $item) { ?>
                                <li class="mt-2" id="dropzone-preview-list">
                                    <!-- This is used as the file preview template -->
                                    <div class="border rounded">
                                        <div class="d-flex p-2">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar-sm bg-light rounded">
                                                    <?php

                                                    $types = array('jpeg', 'jpg', 'png', 'JPG', 'JPEG', 'PNG');
                                                    if (in_array($item['type'], $types)) {

                                                        ?>
                                                        <img data-dz-thumbnail class="img-fluid rounded d-block" style="object-fit: cover;
height: 100%;" src="<?= $item['url'] ?>" alt="Dropzone-Image"/>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div class="pt-1">
                                                    <h5 class="fs-14 mb-1" data-dz-name><?= $item['name'] ?></h5>
                                                    <input type="text" class="form-control"
                                                           value="<?= $scriptConfig['mainURL'] . '/' . $item['url'] ?>">
                                                    <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                        <!-- end dropzon-preview -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div> <!-- end col -->
        </div>

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
