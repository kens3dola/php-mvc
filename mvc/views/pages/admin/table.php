<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage table</h1>
        <a href="/php-mvc/admin/table/insert" class="btn btn-info">Add 1 table</a>
</div>

<div class="row">
        <table class="table text-center">
                <thead>
                        <tr>
                                <td>ID</td>
                                <td>Number of chairs</td>
                                <td>#</td>
                        </tr>
                </thead>
                <tbody>
                        <?php while ($row = mysqli_fetch_assoc($this->view_data)) { ?>
                                <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["chairs_count"]; ?></td>
                                        <td><a href="/php-mvc/admin/table/<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                        <?php } ?>
                </tbody>
        </table>
</div>