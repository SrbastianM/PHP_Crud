<?php
    
    
    include("db.php");

    $id = $_GET['id'];
    
    if(isset($_GET)){
        $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result){
        die("Not Found");
    } 

    $_SESSION['message'] = "Task Deleted Successfully";
    $_SESSION['message_type'] = "danger";
    header("Location: index.php");
    }
?>