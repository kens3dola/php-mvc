<?php

class Account extends Controller
{
        function index()
        {
        }

        function profile()
        {
                $account_id = $_SESSION['account_id'];
                $tblCustomer = $this->model("Customer");
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $error = [];
                        if (empty($_POST['name'])) {
                                $error[] = "invalid name";
                        } else {
                                $name = trim($_POST['name']);
                        }
                        if (empty($_POST['phone'])) {
                                $error[] = "invalid phone";
                        } else {
                                $phone = trim($_POST['phone']);
                        }
                        if (empty($_POST['address'])) {
                                $error[] = "invalid address";
                        } else {
                                $address = trim($_POST['address']);
                        }
                        if (empty($error)) {
                                $tblCustomer->updateProfile($account_id, $name, $phone, $address);
                                $_SESSION['message'] = "updated";
                                header("Location: /php-mvc/home");
                        } else {
                                $_SESSION['message'] = implode("\n", $error);
                                $this->view("default", "pages/profile", ['name' => "", 'phone' => "", 'address' => ""]);
                                $this->view->render();
                        }
                } else {
                        $cust = mysqli_fetch_assoc($tblCustomer->getCustomer($account_id));
                        $this->view("default", "pages/profile", $cust);
                        $this->view->render();
                }
        }

        function password()
        {
        }

        function login()
        {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $tblAccount = $this->model("Accounts");
                        $username = $this->test_input($_POST["username"]);
                        $password = $this->test_input($_POST["password"]);
                        $acc = $tblAccount->validate($username, $password);
                        if ($acc->num_rows != null) {
                                $row = mysqli_fetch_assoc($acc);
                                $_SESSION['account_id'] = $row['id'];
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['role'] = $row['role'];
                                header("Location: /php-mvc/home");
                        }
                } else {
                        $this->view("default", "pages/login");
                        $this->view->render();
                }
        }
        function logout()
        {
                unset($_SESSION['account_id']);
                unset($_SESSION['username']);
                unset($_SESSION['role']);
                header("Location: /php-mvc/home");
        }
        function test_input($data)
        {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }
}
