<?php
require('../cart.php');
    if(isset($_POST['function']) && isset($_POST['itemId'])){
        if($_POST['function'] == 'delete'){
            $itemId = $_POST['itemId'];
            deleteItem($itemId);
        }
    }

?>