<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Item</h1>
</div>

<div class="row col-lg-7">
        <form action="<?php echo DIR ?>admin/user/update/<?php echo $this->view_data['id'] ?>" method="POST" class="login_form">
                <div class="form-group login_field">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="name" name="username" value="<?php echo $this->view_data['username'] ?>">
                </div>
                <div class="form-group login_field">
                        <label for="description">Password</label>
                        <input type="text" class="form-control" name="password" id="description" value=<?php echo $this->view_data['password'] ?>>
                </div>
                <div class="form-group login_field">
                        <label for="price">Role</label>
                        <input type="text" class="form-control" id="price" name="role" value="<?php echo $this->view_data['role'] ?>">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
        </form>
</div>