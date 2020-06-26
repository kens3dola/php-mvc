<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">History order</h1>
</div>
<div class="row">
        <table class="table text-center">
                <thead>
                        <tr>
                                <td>ID</td>
                                <td>Date</td>
                                <td>Amount</td>
                                <td>Account id</td>
                                <td>Item</td>
                                <td>Quantity</td>
                        </tr>
                </thead>
                <tbody>
                        <?php while ($row = mysqli_fetch_array($this->view_data)) { ?>
                                <tr>
                                        <td><?php echo $row[0] ?></td>
                                        <td><?php echo ($row[1] == "") ? "not checkout yet" : $row[1] ?></td>
                                        <td><?php echo $row[3] ?> $</td>
                                        <td><?php echo $row[4] ?></td>
                                        <td><?php echo $row[11] ?></td>
                                        <td><?php echo $row[7] ?></td>
                                </tr>
                        <?php } ?>
                </tbody>
        </table>
</div>