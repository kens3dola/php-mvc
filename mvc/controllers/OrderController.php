<?php

class Order extends Controller
{
        function index()
        {
                $tblOrder = $this->model('Orders');
                $tblOrderLine = $this->model('OrderLine');
                $order = mysqli_fetch_assoc($tblOrder->getOrder($_SESSION['account_id']));
                $order_lines = $tblOrderLine->getOrderLines($order['id']);
                $this->view("default", "pages/cart", $order_lines);
                $this->view->render();
        }

        function cart($item_id, $item_price)
        {
                $tblOrder = $this->model('Orders');
                $tblOrderLine = $this->model('OrderLine');
                $order = mysqli_fetch_assoc($tblOrder->getOrder($_SESSION['account_id']));
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

        function deleteitem($order_line_id)
        {
                $tblOrderLine = $this->model('OrderLine');
                $tblOrderLine->delete($order_line_id);
                $_SESSION['message'] = "Deleted";
                header("Location: /php-mvc/order");
        }
        function submit()
        {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date("Y-m-d H:i:s");
                $tblOrder = $this->model('Orders');
                $tblOrder->submitOrder($date, $_SESSION['account_id']);
                $_SESSION['message'] = "Sucessfully";
                header("Location: /php-mvc/home");
        }
}
