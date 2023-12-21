<?php

    include("database.php");

    if(isset($_POST['action']) && $_POST['action'] == "add_info") {

        $firstName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
        $lastName = filter_var($_POST["lastName"], FILTER_SANITIZE_STRING);
        $userAge = filter_var($_POST["userAge"], FILTER_VALIDATE_INT);
        $emailAdress = filter_var($_POST["emailAdress"], FILTER_VALIDATE_EMAIL);
        $locatedAt = filter_var($_POST["locatedAt"], FILTER_SANITIZE_STRING);

        $_SESSION['error_message'] = array();
        if(empty($firstName) || empty($lastName) || empty($emailAdress) || empty($locatedAt)) {
            $_SESSION['error_message'][] = "Input field required";  
        }
        if(count($_SESSION['error_message']) > 0) {
            header("Location: ../add.php");
            exit();
        } else {
            $sql = "INSERT INTO crud_tbl (firstName, lastName, userAge, emailAdress,  locatedAt) VALUES (?,?,?,?,?)";
            $stmt= $mysqli->prepare($sql);
            $stmt->bind_param("sssss",  $firstName, $lastName, $userAge, $emailAdress, $locatedAt);
            if($stmt->execute()) {
                header("Location: ../index.php");
                $_SESSION['success_message'] = "New info added"; 
                exit();
            } else {
                header("Location: ../add.php");
                $_SESSION['error_message'][] = "There's an error"; 
                exit();
            }
        }
        
    }

    if(isset($_POST['action']) && $_POST['action'] == "update_info") {

        $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);
        $firstName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
        $lastName = filter_var($_POST["lastName"], FILTER_SANITIZE_STRING);
        $userAge = filter_var($_POST["userAge"], FILTER_VALIDATE_INT);
        $emailAdress = filter_var($_POST["emailAdress"], FILTER_VALIDATE_EMAIL);
        $locatedAt = filter_var($_POST["locatedAt"], FILTER_SANITIZE_STRING);

        $sql = "UPDATE crud_tbl SET firstName=?, lastName=?, userAge=?, emailAdress=?, locatedAt=? WHERE id=?";
        $stmt= $mysqli->prepare($sql);
        if(!$stmt) {
            die("SQL error: " . $mysqli->error);
        }
        $stmt->bind_param("ssissi", $firstName, $lastName, $userAge, $emailAdress, $locatedAt, $id);
        if($stmt->execute()){
            header("Location: ../index.php");
            $_SESSION['success_message'] = "Update successfully"; 
            exit();
        }else {
            header("Location: ../edit.php");
            $_SESSION['error_message'][] = "There's an error"; 
            exit();
        }

    }

    if(isset($_POST['action']) && $_POST['action'] == "delete_info") {
        $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);
        $sql = $mysqli->prepare("DELETE FROM crud_tbl WHERE id=?");
        $sql->bind_param("i", $id);
        if($sql->execute()) {
            header("Location: ../index.php");
            $_SESSION['success_message'] = "Delete successfully"; 
            exit();
        } else {
            header("Location: ../delete.php");
            $_SESSION['error_message'][] = "There's an error"; 
            exit();
        }
    }

    function fetch_all_data() {

        global $mysqli;
        $sql = "SELECT id, firstName, lastName, userAge, emailAdress, locatedAt, created_at FROM crud_tbl ORDER BY id ASC"; // SQL with parameters
        $fetch_data = $mysqli->prepare($sql);
        if(!$fetch_data) {
            die("SQL error: " . $mysqli->error);
        }
        $fetch_data->execute();
        $result =$fetch_data->get_result();
        $data = array();
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return  $data; 
    }
    function view_user_data($id) {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT id, firstName, lastName, userAge, emailAdress, locatedAt, created_at FROM crud_tbl WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1) {
            $userData = $result->fetch_assoc();
            $stmt->close();
            return $userData;
        }else {
            $_SESSION['errors'] == "Profile not found";
            return false;
        }
    }



?>