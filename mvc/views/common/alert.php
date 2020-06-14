<div id='alrt' style="font-weight:'bold'"></div>
<script>
        document.getElementById('alrt').innerHTML = "<b><?php echo $_SESSION['message'] ?></b>";
        setTimeout(function() {
                document.getElementById('alrt').innerHTML = '';
        }, 3000);
</script>
<?php unset($_SESSION['message']) ?>