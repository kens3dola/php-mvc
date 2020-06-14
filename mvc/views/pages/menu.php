<?php
require_once './mvc/views/common/banner-image.php';
?>
<div class="container-fluid" style="position:absolute; top:30%">
        <h3 class="text-center p-4">MENU & DRINK LIST</h3>
        <div class="d-flex justify-content-between align-content-between flex-wrap">
                <?php

                while ($row = mysqli_fetch_assoc($this->view_data)) {
                ?>
                        <div class="card mb-5 ml-1 mr-1" style="min-width:15%; max-width:23%">
                                <form action="/php-mvc/order/cart/<?php echo $row['id'] . '/' . $row['price'] ?>">
                                        <img src="/php-mvc/public/image/food/<?php echo $row['image'] ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                                <h5><?php echo $row['name'] ?></h5>
                                                <p class="card-text mb-1"><?php echo $row['description'] ?></p>
                                                <p class="card-text mb-1">Price: <?php echo $row['price'] ?>$/1</p>
                                                <p class="card-text mb-1"><label>Quantity: <input type="number" name="quantity" value="1"></label></p>
                                        </div>

                                        <button class="btn" style="width:100%; background-color:red;height:15%; color:white">Add to cart</button>
                                </form>
                        </div>
                <?php
                }

                ?>
        </div>
</div>