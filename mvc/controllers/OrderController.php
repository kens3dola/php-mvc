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

        function reservation()
        {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $tblTrack = $this->model("TableTrack");
                        $tblTable = $this->model("Table");
                        $error = [];
                        if (empty($_POST['date'])) {
                                $error[] = "invalid date";
                        } else {
                                $date = trim($_POST['date']);
                        }
                        if (empty($_POST['time'])) {
                                $error[] = "invalid time";
                        } else {
                                $time = trim($_POST['time']);
                        }
                        if (empty($_POST['duration'])) {
                                $error[] = "invalid duration";
                        } else {
                                $duration = trim($_POST['duration']);
                        }
                        if (empty($_POST['guest'])) {
                                $error[] = "invalid guest";
                        } else {
                                $guest = trim($_POST['guest']);
                        }
                        if (empty($error)) {
                                $start =  date_create($date . " " . $time . ":0:0");
                                $end = date_create($date . " " . $time . ":0:0")->add(new DateInterval("PT2H"));
                                $table_list = $tblTable->getTables();
                                $unavai_table = $tblTrack->getUnAvailable($start, $end);
                                $u_tables = [];
                                while ($r = mysqli_fetch_assoc($unavai_table)) {
                                        $u_tables[] = $r;
                                }
                                $number_of_tables = ceil($guest / 6);
                                if (($table_list->num_rows - count($u_tables)) < $number_of_tables) {
                                        $_SESSION['message'] = "not enough available tables";
                                        $this->view("default", "pages/reserve");
                                        $this->view->render();
                                } else {
                                        $query_count = 0;
                                        while ($row = mysqli_fetch_assoc($table_list)) {
                                                if (!in_array($row['table_id'], $u_tables) && ($query_count != $number_of_tables)) {
                                                        $tblTrack->insert($row['id'], $start, $end, $_SESSION['account_id']);
                                                        $query_count++;
                                                }
                                        }
                                        $_SESSION['message'] = "Successfully";
                                        header("Location: /php-mvc/home");
                                }
                        } else {
                                $_SESSION['message'] = implode("-", $error);
                                $this->view("default", "pages/reserve");
                                $this->view->render();
                        }
                } else {
                        $this->view("default", "pages/reserve");
                        $this->view->render();
                }
        }
}
