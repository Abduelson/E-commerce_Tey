<?php
require("../cart.php");
if (isset($_POST['user_id']) && isset($_POST['function'])){
    if($_POST['function'] == 'commander'){
        $user_id = $_POST['user_id'];
        commander($user_id);
    }
}

?>