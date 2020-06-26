<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Item</h1>
</div>

<div class="row col-lg-7">
        <?php
        $id = "";
        $name = "";
        $description = "";
        $image = "";
        $price = 0;
        if (count($this->view_data) == 0) {
                $method = "insert";
        } else {
                $method = "update";
                $id = $this->view_data['id'];
                $name = $this->view_data['name'];
                $description = $this->view_data['description'];
                $price = $this->view_data['price'];
                $image = $this->view_data['image'];
        }
        ?>
        <form action="<?php echo DIR ?>admin/item/<?php echo $method ?>/<?php echo ($id == "") ? "one" : $id ?>" method="POST" class="login_form">
                <div class="form-group login_field">
                        <label for="username">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>">
                </div>
                <div class="form-group login_field">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="<?php echo $description ?>">
                </div>
                <div class="form-group login_field">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $price ?>">
                </div>
                <div class="form-group login_field">
                        <label for="password">Image</label>
                        <input type="text" class="form-control" name="image" id="image" value="<?php echo $image ?>">
                </div>
                <br>
                <button type="submit" class="btn btn-primary"><?php echo ucfirst($method) ?></button>
        </form>
</div>