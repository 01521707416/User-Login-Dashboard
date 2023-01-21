<?php
$h1 = "Service Item Page";                                         /* This h1 tag is related to "header.php" file. */
$title = "Service Item";
session_start();
require_once '../header.php';
require_once '../database.php';
require_once 'navbar.php';

if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');                               /* Condition for going to login page */
}

$get_query = "SELECT * from service_items";
$from_db = mysqli_query($db_connection, $get_query);

?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-success text-center">Service Heading Add Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="service_item_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="" class="form-label">Heading</label>
                                <input type="text" class="form-control" name="service_item_head">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Details</label>
                                <input type="text" class="form-control" name="service_item_detail">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Image</label>
                                <input type="file" class="form-control" name="service_item_image">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-success">ADD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title text-success text-center">Service Head Table</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>Heading</th>
                                <th>Details</th>
                                <th>Image</th>
                            </thead>

                            <tbody>

                                <?php
                                foreach ($from_db as $services) :
                                ?>

                                    <tr>
                                        <td><?= $services['service_item_head'] ?></td>
                                        <td><?= $services['service_item_detail'] ?></td>
                                        <td><img src=" ../<?= $services['image_location'] ?>" alt="" style="width: 200px">
                                        </td>
                                    </tr>

                                <?php
                                endforeach
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<?php
require_once('../footer.php');
?>