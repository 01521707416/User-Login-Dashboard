<?php
$h1 = "Banner";                                         /* This h1 tag is related to "header.php" file. */
$title = "Banner Page";
session_start();
require_once '../header.php';
require_once '../database.php';
require_once 'navbar.php';

if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');                               /* Condition for going to login page */
}

$get_query = "SELECT * FROM banners";                         /* Query for reading table data from database*/
$from_db = mysqli_query($db_connection, $get_query);                /* Biilding connection */
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mt-4">
                    <div class="card-header bg-dark">
                        <h5 class="card-title text-center text-info">Banner Add Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="banner_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label text-primary">Banner Sub Title</label>
                                <input type="text" name='banner_sub_title' class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary">Banner Title</label>
                                <input type="text" name='banner_title' class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary">Banner Detail</label>
                                <input type="text" name='banner_detail' class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary">Banner Image</label>
                                <input type="file" name='banner_image' class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="form-control btn btn-primary ">Add Banner</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card mt-4">
                    <div class="card-header bg-dark text-center">
                        <h5 class="card-title text-info">Banner List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>Serial</th>
                                <th>Banner Sub Title</th>
                                <th>Banner Title</th>
                                <th>Banner Detail</th>
                                <th>Location</th>
                                <th>Active Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($from_db as $key => $ban) : ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $ban['banner_sub_title'] ?></td>
                                        <td><?= $ban['banner_title'] ?></td>
                                        <td><?= $ban['banner_detail'] ?></td>
                                        <td>
                                            <img src="../<?= $ban['image_location'] ?>" alt="" style="width: 100px; height: 100px">
                                        </td>
                                        <td>
                                            <?php
                                            if ($ban['active_status'] == 1) :
                                            ?>
                                                <span class="badge badge-sm bg-success">Active</span>
                                            <?php
                                            else :
                                            ?>
                                                <span class="badge badge-sm bg-danger">Inactive</span>
                                            <?php
                                            endif
                                            ?>
                                        </td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <?php
                                                if ($ban['active_status'] == 1) :
                                                ?>
                                                    <a href="banner_deactive.php?banner_id=<?= $ban['id'] ?>" class="btn btn-sm btn-warning">De-Activate</a>
                                                <?php
                                                else :
                                                ?>
                                                    <a href="banner_active.php?banner_id=<?= $ban['id'] ?>" class="btn btn-sm btn-primary">Activate</a>
                                                <?php
                                                endif
                                                ?>
                                                <a href="banner_edit.php?banner_id=<?= $ban['id'] ?>" class="btn btn-sm btn-info">Edit</a>
                                                <a href="banner_delete.php?banner_id=<?= $ban['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
require_once('../footer.php');
?>