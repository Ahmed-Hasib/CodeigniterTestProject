<!-- add ModelModal -->
<div class="modal fade" id="addModelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Add Model</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <p>Fields marked with <span id="redStar">*</span> are mandatory</p>
                <p class="text-danger" id="errorShow"></p>
                <hr>
                <form action="<?= base_url('Model/addModelPost'); ?>" method="POST" id="addModelFrom">
                    <table>
                        <tr>
                            <td>Brand <span id="redStar">* </span> </td>
                            <td>
                                <select name="brand_id" id="brandSelect" class="form-select">
                                    <option value="-1">---- Select Brand ----</option>
                                    <?php
                                    if (isset($allBrands) && count($allBrands)) {
                                        foreach ($allBrands as $brand) { ?>
                                            <option value="<?= $brand->id ?>"><?= $brand->name; ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Model Name <span id="redStar">* </span> </td>
                            <td><input type="text" class="form-control" name="name" required id="inputAddModel" maxlength="100"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-success text-white">Add</button></td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>
    </div>
</div>

<!--update brand Modal  -->

<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Edit Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <p>Fields marked with <span id="redStar">*</span> are mandatory</p>
                <p class="text-danger" id="errorShowUpdate"></p>
                <hr>
                <form action="<?= base_url('Model/updateModelPost'); ?>" method="POST" id="updateModelFrom">
                    <table>
                        <tr>
                            <td>Brand <span id="redStar">* </span> </td>
                            <td>
                                <select name="brand_id" id="brandSelectUpdate" class="form-select">
                                    <option value="-1">---- Select Brand ----</option>
                                    <?php
                                    if (isset($allBrands) && count($allBrands)) {
                                        foreach ($allBrands as $brand) { ?>
                                            <option value="<?= $brand->id ?>"><?= $brand->name; ?></option>
                                    <?php }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Model Name <span id="redStar">* </span> </td>
                            <input type="hidden" name="id" id="modelID">
                            <td><input type="text" class="form-control" name="name" required id="inputUpdateModel" maxlength="50"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-success text-white">Update</button></td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Delete Modal -->
<!-- Modal -->
<div class="modal fade" id="DeleteModalModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body text-center">
                <h6> Are You sure to delete the selected Model?</h6>
            </div>
            <div class="modal-footer h-100 d-flex align-items-center justify-content-center">
                <a type="button" class="btn btn-danger" id="deleteBtnModel">Ok</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

            </div>


        </div>
    </div>
</div>

<br>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>All Models <span class="text-danger"><?= $this->session->flashdata('deleteModelStatus'); ?></span></h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Brand Name</th>
                        <th>Entry Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($allModels); $i++) { ?>
                        <tr>
                            <td><?= $i + 1; ?></td>
                            <td><?= $allModels[$i]->name; ?></td>
                            <td><?= $allModels[$i]->brand_name; ?></td>
                            <td><?= date('d/m/Y', strtotime($allModels[$i]->entry_date)); ?></td>
                            <td>
                                <button id="btnUpdateBrand" type="button" data-brandId="<?= $allModels[$i]->brand_id; ?>" data-ModelId=<?= $allModels[$i]->model_id; ?> data-ModelName="<?= $allModels[$i]->name; ?>" class="btn" data-bs-toggle="modal" data-bs-target="#updateModal">
                                    <li data-feather="edit"></li>
                                </button>

                                <button type="button" class="btn" data-ModelId="<?= $allModels[$i]->model_id; ?>" data-bs-toggle="modal" data-bs-target="#DeleteModalModel">
                                    <i data-feather="trash"></i>
                                </button>

                            </td>
                        </tr>
                    <?php }

                    ?>


                </tbody>
            </table>

            <button id="btnAddBrand" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addModelModal">Add Model</button>

        </div>

    </div>

</div>