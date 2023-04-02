<!-- add itemModal -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Add Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <p>Fields marked with <span id="redStar">*</span> are mandatory</p>
                <p class="text-danger" id="errorShow"></p>
                <hr>
                <form action="<?= base_url('Item/addItemPost'); ?>" method="POST" id="addItemFrom">
                    <table>
                        <tr>
                            <td>Brand <span id="redStar">* </span> </td>
                            <td>
                                <select name="brand_id" id="brandSelectItem" class="form-select ">
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
                            <td>Model <span id="redStar">* </span> </td>
                            <td>
                                <select name="model_id" id="modelSelect" class="form-select">
                                    <option value="-1">---- Select Model ----</option>
                                    <?php
                                    if (isset($allModels) && count($allModels)) {
                                        foreach ($allModels as $model) { ?>
                                            <option class="modelOption brandID_<?= $model->brand_id; ?>" value="<?= $model->id; ?>"><?= $model->name; ?></option>

                                    <?php }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Item Name <span id="redStar">* </span> </td>
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
                        <th>Item</th>
                        <th>Model Name</th>
                        <th>Brand Name</th>
                        <th>Entry Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($allItems); $i++) { ?>
                        <tr>
                            <td><?= $i + 1; ?></td>
                            <td><?= $allItems[$i]->item_name; ?></td>
                            <td><?= $allItems[$i]->model_name; ?></td>
                            <td><?= $allItems[$i]->brand_name; ?></td>
                            <td><?= date('h:i:s a m/d/Y', strtotime($allItems[$i]->entry_date)); ?></td>
                            <td>
                                <button id="btnUpdateItem" type="button" data-brandId="<?= $allItems[$i]->brand_id; ?>" data-ModelId=<?= $allItems[$i]->model_id; ?> data-ItemId=<?= $allItems[$i]->id; ?> data-ItemName="<?= $allItems[$i]->item_name; ?>" class="btn" data-bs-toggle="modal" data-bs-target="#updateModal">
                                    <li data-feather="edit"></li>
                                </button>

                                <button type="button" class="btn" data-ItemId="<?= $allItems[$i]->id; ?>" data-bs-toggle="modal" data-bs-target="#DeleteItemModel">
                                    <i data-feather="trash"></i>
                                </button>

                            </td>
                        </tr>
                    <?php }

                    ?>


                </tbody>
            </table>

            <button id="btnAddBrand" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addItemModal">Add Item</button>

        </div>

    </div>

</div>