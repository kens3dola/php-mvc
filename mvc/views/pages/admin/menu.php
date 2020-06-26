<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage food and drink</h1>
        <a href="/php-mvc/admin/item/insert/one" class="btn btn-info">Add item</a>
</div>
<div class="row">
        <?php

        while ($row = mysqli_fetch_assoc($this->view_data)) {

                if (file_exists('./public/image/food/' . $row['image'])) {
                        $i = '/php-mvc/public/image/food/' . $row['image'];
                } else {
                        $i = $row['image'];
                }
        ?>
                <div class="card mb-5 ml-1 mr-1" style="min-width:15%; max-width:23%">
                        <img src="<?php echo $i ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                                <h5><?php echo $row['name'] ?></h5>
                                <p class="card-text mb-1"><?php echo $row['description'] ?></p>
                                <p class="card-text mb-1">Price: <?php echo $row['price'] ?>$/1</p>
                        </div>
                        <div class="d-flex justify-content-around p-2">
                                <a href="/php-mvc/admin/item/update/<?php echo $row['id'] ?>" class="btn btn-primary"">Update</a>
                                <a href="/php-mvc/admin/item/delete/<?php echo $row['id'] ?>" class=" btn btn-danger"">Delete</a>
                        </div>
                </div>
        <?php
        }
        ?>
</div>