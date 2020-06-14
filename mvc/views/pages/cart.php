<?php
include './mvc/views/common/background-image.php';
?>
<div class="container-fluid w-50 h-75 p-5 cart" style="position:absolute; top:20%; left:45%; background-color:white; color:black">
        <?php
        $total = 0;
        while ($row = mysqli_fetch_assoc($this->view_data)) {
                $total += $row['amount'];
        ?>
                <div class="cart_item">
                        <img src="/php-mvc/public/image/food/<?php echo $row['image'] ?>" class="card-img-top" alt="...">
                        <span><?php echo $row['name'] ?></span>
                        <span><?php echo $row['amount'] ?>$</span>
                        <span><?php echo $row['item_quantity'] ?></span>
                        <span><a href="/php-mvc/order/deleteitem/<?php echo $row['id'] ?>">Delete</a></span>
                </div>
                <hr>
        <?php
        }
        ?>
        <div class="total">
                <span>Total: <?php echo $total ?>$</span>
        </div>
        <a href="/php-mvc/order/submit" class="order_submit_btn">Proceed to checkout</a>
</div>