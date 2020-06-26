<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage account</h1>
</div>

<div class="row">
        <table class="table text-center">
                <thead>
                        <tr>
                                <td>ID</td>
                                <td>username</td>
                                <td>Password</td>
                                <td>Role</td>
                                <td>#</td>
                        </tr>
                </thead>
                <tbody>
                        <?php while ($row = mysqli_fetch_assoc($this->view_data)) { ?>
                                <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["username"]; ?></td>
                                        <td><?php echo $row["password"]; ?></td>
                                        <td><?php echo $row["role"]; ?></td>
                                        <td><a href="/php-mvc/admin/user/update/<?php echo $row["id"]; ?>" class="btn btn-primary">Update</a>
                                                <a href="/php-mvc/admin/user/delete/<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                        <?php } ?>
                </tbody>
        </table>
</div>