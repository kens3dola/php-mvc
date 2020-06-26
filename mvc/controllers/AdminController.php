<?php

class Admin extends Controller
{

        function index()
        {
                $this->view("admin", "pages/admin/index");
                $this->view->render();
        }

        function menu()
        {
                $item_model = $this->model("Item");
                $list_items = $item_model->getItems();
                $this->view("admin", "pages/admin/menu", $list_items);
                $this->view->render();
        }

        function item($method, $id)
        {
                $tblItem = $this->model("item");
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $error = [];
                        if (empty($_POST['name'])) {
                                $error[] = "invalid name";
                        } else {
                                $name = trim($_POST['name']);
                        }
                        if (empty($_POST['description'])) {
                                $error[] = "invalid description";
                        } else {
                                $description = trim($_POST['description']);
                        }
                        if (empty($_POST['price'])) {
                                $error[] = "invalid price";
                        } else {
                                $price = trim($_POST['price']);
                        }
                        if (empty($_POST['image'])) {
                                $error[] = "invalid image";
                        } else {
                                $image = trim($_POST['image']);
                        }
                        if ($method == "update") {
                                $tblItem->update($id, $name, $description, $price, $image);
                        } else {
                                $tblItem->insert($id, $name, $description, $price, $image);
                        }
                        header("Location: /php-mvc/admin/menu");
                }
                if ($method == "update") {
                        $item = $tblItem->getItem($id);
                        $this->view("admin", "pages/admin/update_item", mysqli_fetch_assoc($item));
                        $this->view->render();
                } elseif ($method == "delete") {
                        $tblItem->delete($id);
                        header("Location: /php-mvc/admin/menu");
                } elseif ($method == "insert") {
                        $this->view("admin", "pages/admin/update_item");
                        $this->view->render();
                } else {
                        $this->view("admin", "pages/admin/menu");
                        $this->view->render();
                }
        }

        function table($method)
        {
                $tblTable = $this->model("Table");
                if ($method == "insert") {
                        $tblTable->insert();
                        header("Location: /php-mvc/admin/table/list");
                } elseif ($method == "list") {
                        $list_tables = $tblTable->getTables();
                        $this->view("admin", "pages/admin/table", $list_tables);
                        $this->view->render();
                } else {
                        $tblTable->delete($method);
                        header("Location: /php-mvc/admin/table/list");
                }
        }

        function account()
        {
                $tblAccount = $this->model("Accounts");
                $list_acc = $tblAccount->getAccounts();
                $this->view("admin", "pages/admin/accounts", $list_acc);
                $this->view->render();
        }

        function user($method, $id)
        {
                $tblAccount = $this->model("Accounts");
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $error = [];
                        if (empty($_POST['username'])) {
                                $error[] = "invalid username";
                        } else {
                                $username = trim($_POST['username']);
                        }
                        if (empty($_POST['password'])) {
                                $error[] = "invalid password";
                        } else {
                                $password = trim($_POST['password']);
                        }
                        if (empty($_POST['role'])) {
                                $error[] = "invalid role";
                        } else {
                                $role = trim($_POST['role']);
                        }
                        $tblAccount->update($id, $username, $password, $role);
                        header("Location: /php-mvc/admin/account");
                }
                if ($method == "update") {
                        $acc = $tblAccount->getAccount($id);
                        $this->view("admin", "pages/admin/update_account", mysqli_fetch_assoc($acc));
                        $this->view->render();
                } elseif ($method == "delete") {
                        $tblAccount->delete($id);
                        header("Location: /php-mvc/admin/account");
                } else {
                        $this->view("admin", "pages/admin/account");
                        $this->view->render();
                }
        }

        function orders()
        {
                $tblOrder = $this->model("Orders");
                $order_list = $tblOrder->getHistoryOrders();
                $this->view("admin", "pages/admin/orders", $order_list);
                $this->view->render();
        }

        function reservations()
        {
                $tblTrack = $this->model("TableTrack");
                $tbTrack_list = $tblTrack->getReservations();
                $this->view("admin", "pages/admin/reservations", $tbTrack_list);
                $this->view->render();
        }
}
