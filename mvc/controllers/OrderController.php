<?php

class Order extends Controller
{
        function index()
        {
        }

        function cart($item_id, $item_price)
        {
                $tblOrder = $this->model('Order');
                $tblOrderLine = $this->model('OrderLine');
                $order = $tblOrder->getOrder($_SESSION['account_id']);
                $data = ['item_id' => $item_id, 'item_quantity' => $_GET['quantity'], 'amount' => $item_price * $_GET['quantity'], 'account_id' => $_SESSION['account_id']];
                $tblOrderLine->addOrderLine($data);
                echo '<script>alert("Added")</script>';
        }
}
