<!-- add brandModal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Add Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <p>Fields marked with <span id="redStar">*</span> are mandatory</p>
                <p class="text-danger" id="errorShow"></p>
                <hr>
                <form action="<?= base_url('Brand/addBrandPost'); ?>" method="POST" id="addBrandFrom">
                    <table>
                        <tr>
                            <td>Brand Name <span id="redStar">* </span> </td>
                            <td><input type="text" class="form-control" name="name" required id="inputAddBrand" maxlength="50"></td>
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
                <p class="text-danger" id="errorShowUpdaet"></p>
                <hr>
                <form action="<?= base_url('Brand/updateBrandPost'); ?>" method="POST" id="updateBrandFrom">
                    <table>
                        <tr>
                            <td>Brand Name <span id="redStar">* </span> </td>
                            <td><input type="text" class="form-control" name="name" required id="inputUpdateBrand" maxlength="50"></td>
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

<br>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>All Brands</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Entry Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($allBrands); $i++) { ?>
                        <tr>
                            <td><?= $i + 1; ?></td>
                            <td><?= $allBrands[$i]->name; ?></td>
                            <td><?= date('h:i:s a m/d/Y', strtotime($allBrands[$i]->entry_date)); ?></td>
                            <td>
                                <button id="btnUpdateBrand" type="button" data-brandName="<?= $allBrands[$i]->name; ?>" class="btn" data-bs-toggle="modal" data-bs-target="#updateModal">
                                    <li data-feather="edit"></li>
                                </button>
                                <i data-feather="trash"></i>
                            </td>
                        </tr>
                    <?php }

                    ?>


                </tbody>
            </table>

            <button id="btnAddBrand" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Brand</button>

        </div>

    </div>

</div>