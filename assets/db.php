<?php error_reporting(0)?>
<?php 
    $con = new mysqli('localhost','root','','web-bank');
    define('bankName', 'WEB-Bank',true);
    $ar = $con->query("select * from userAccounts,branch where id = '$_SESSION[userId]' AND userAccounts.branch = branch.branchId");
    $userData = $ar->fetch_assoc();
?>
<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>