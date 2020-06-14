<?php

class Order extends Controller
{
        function index()
        {
                $tblOrder = $this->model('Orders');
                $tblOrderLine = $this->model('OrderLine');
                $order = mysqli_fetch_assoc($tblOrder->getOrder($_SESSION['user_id']));
                $order_lines = $tblOrderLine->getOrderLines($order['id']);
                $this->view("default", "pages/cart", $order_lines);
                $this->view->render();
        }

        function cart($item_id, $item_price)
        {
                $tblOrder = $this->model('Orders');
                $tblOrderLine = $this->model('OrderLine');
                $order = mysqli_fetch_assoc($tblOrder->getOrder($_SESSION['user_id']));
                $order_line_amount = $item_price * $_POST['quantity'];
                $data = [
                        'item_id' => $item_id,
                        'item_quantity' => $_POST['quantity'],
                        'amount' => $order_line_amount,
                        'order_id' => $order['id']
                ];
                $tblOrderLine->addOrderLine($data);
                $tblOrder->updatePrice($order['id'], (int) $order['amount'] + (int) $order_line_amount);
                $_SESSION['message'] = "Added";
                header("Location: /php-mvc/home/menu");
        }
}
