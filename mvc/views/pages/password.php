<?php
include_once "./mvc/views/common/banner-image.php";
?>

<div class="container-fluid p-5 changeprofile" style="position:absolute;top:30%">
        <h1 class="text-center">Change Password</h1>
        <form class="profile_form" style="margin:auto" action="/php-mvc/account/password" method="POST">
                <div class="form-group">
                        <label for="">New password:</label>
                        <input type="password" class="form-control" name="pass">
                </div>
                <button type="submit" class="btn btn-danger">Change</button>
        </form>
</div>