<?php
include_once "./mvc/views/common/banner-image.php";
?>

<div class="container-fluid p-5 changeprofile" style="position:absolute;top:30%">
        <h1 class="text-center">Profile</h1>
        <form class="profile_form" style="margin:auto" action="/php-mvc/account/profile" method="POST">

                <div class="form-group">
                        <label for="">Name:</label>
                        <input type="text" class="form-control" value="<?php echo $this->view_data['name'] ?>" name="name">
                </div>
                <div class="form-group">
                        <label for="">Phone:</label>
                        <input type="text" class="form-control" value="<?php echo $this->view_data['phone'] ?>" name="phone">
                </div>
                <div class="form-group">
                        <label for="">Address:</label>
                        <input type="text" class="form-control" value="<?php echo $this->view_data['address'] ?>" name="address">
                </div>
                <button type="submit" class="btn btn-danger">Change</button>
        </form>
</div>