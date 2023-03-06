<?php
require_once('../db/connection.php');
$uId = $_POST['user_id'];
$res = $conn->query('select * from user');
$result = "";
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        if ($uId == $row["user_id"]) {
            $result = "user_id already exists.";
            ?>
            <span class="error">Username not available</span>
            <?php
            break;
        }
    }
}
?>