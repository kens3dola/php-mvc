<?php

?>
<div style="
        position: absolute;
  background: url(/php-mvc/public/image/login.jpg);
  background-size: cover;
    width: 45%;
    height: 85%;
    top: 13%;
    left: 5%;
    z-index:-9999;">
</div>
<div class="container-fluid w-50 h-75 p-5" style="position:absolute; top:20%; left:45%; background-color:white; color:black">
        <form action="<?php echo DIR ?>account/login" method="POST" class="login_form">
                <div class="form-group login_field">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group login_field">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                </div>
                <br>
                <button type="submit" class="login_button">Submit</button>
        </form>
        <br>
        <a href="/php-mvc/account/forgot" class="login_link">Forgot password</a>
        <br>
        <a href="/php-mvc/account/register" class="login_link">Register</a>
</div>