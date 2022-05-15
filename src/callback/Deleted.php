<?php
$sql = mysqli_query($connect, "DELETE FROM `hosting_account` WHERE `account_username` = '".$_POST['username']."'");