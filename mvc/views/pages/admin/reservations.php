<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reservations</h1>
</div>
<div class="row">
        <table class="table text-center">
                <thead>
                        <tr>
                                <td>ID</td>
                                <td>Table id</td>
                                <td>Start</td>
                                <td>End</td>
                                <td>AccountID</td>
                        </tr>
                </thead>
                <tbody>
                        <?php while ($row = mysqli_fetch_assoc($this->view_data)) { ?>
                                <tr>
                                        <td><?php echo $row["id"] ?></td>
                                        <td><?php echo $row["table_id"] ?> $</td>
                                        <td><?php echo $row["start"] ?></td>
                                        <td><?php echo $row["end"] ?></td>
                                        <td><?php echo $row["account_id"] ?></td>
                                </tr>
                        <?php } ?>
                </tbody>
        </table>
</div>