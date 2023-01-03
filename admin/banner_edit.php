<?php
$h1 = "Banner Edit";                                         /* This h1 tag is related to "header.php" file. */
$title = "Banner Edit";
session_start();
require_once '../header.php';
require_once '../database.php';
require_once 'navbar.php';
$id = $_GET['banner_id'];

if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');                               /* Condition for going to login page */
}

$get_query = "SELECT * FROM banners WHERE id = $id";
$banner_from_db = mysqli_query($db_connection, $get_query);
$after_assoc = mysqli_fetch_assoc($banner_from_db);

?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title text-center">Banner Edit Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="banner_edit_post.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label text-primary">Banner Sub Title</label>
                                <input type="hidden" name='id' class="form-control" value="<?= $after_assoc['id'] ?>">
                                <input type="text" name='banner_sub_title' class="form-control" value="<?= $after_assoc['banner_sub_title'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary">Banner Title</label>
                                <input type="text" name='banner_title' class="form-control" value="<?= $after_assoc['banner_title'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary">Banner Detail</label>
                                <input type="text" name='banner_detail' class="form-control" value="<?= $after_assoc['banner_detail'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label text-primary">Banner Image</label>
                                <input type="file" name='banner_image' class="form-control">
                            </div>
                            <div class="mb-3">
                                <img src="../<?= $after_assoc['image_location'] ?>" alt="" style="width: 250px">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="form-control btn btn-primary ">Add Banner</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once '../footer.php';
?>