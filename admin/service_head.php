<?php
$h1 = "Service Heading Page";                                         /* This h1 tag is related to "header.php" file. */
$title = "Service Head";
session_start();
require_once '../header.php';
require_once '../database.php';
require_once 'navbar.php';

if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');                               /* Condition for going to login page */
}

$get_query = "SELECT * from service_heads";
$from_db = mysqli_query($db_connection, $get_query);
// $after_assoc = mysqli_fetch_assoc($from_db);

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
                        <form action="service_head_post.php" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Black Heading</label>
                                <input type="text" class="form-control" name="black_head">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Blue Heading</label>
                                <input type="text" class="form-control" name="blue_head">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Service Sub Heading</label>
                                <input type="text" class="form-control" name="service_sub_head">
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
                                <th>Black Heading</th>
                                <th>Blue Heading</th>
                                <th>Service Sub Heading</th>
                                <th>Action</th>
                            </thead>

                            <tbody>

                                <?php foreach ($from_db as $service_head) : ?>

                                    <tr>
                                        <td><?= $service_head['black_head'] ?></td>
                                        <td><?= $service_head['blue_head'] ?></td>
                                        <td><?= $service_head['service_sub_head'] ?></td>
                                        <td>
                                            <?php if ($service_head['active_status'] == 2) : ?>
                                                <a href="service_head_active.php?id=<?= $service_head['id'] ?>" class="btn btn-sm btn-primary">Activate</a>
                                            <?php else : ?>
                                                <a href="" class="btn btn-sm btn-danger">Deactivate</a>
                                            <?php endif ?>
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
    </div>
</section>


<?php
require_once('../footer.php');
?>