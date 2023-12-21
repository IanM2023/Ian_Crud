<?php
    include("db/process.php");
    // print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>CRUD</title>
</head>
<body>
<div class="container">
    <div class="container-fluid">
<?php
            if(isset($_SESSION['success_message'])) {
?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['success_message']; ?>
                </div>
<?php
            }
            unset($_SESSION['success_message']);
?>
        <h1>Client Information</h1>
        <p><a href="add.php"><button type="button" class="btn btn-primary" value="Primary"><span class="glyphicon glyphicon-plus"></span></button></a></p>
<?php
            $user_data = fetch_all_data();
?>
        <table id="customers">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Email Address</th>
                <th>Location</th>
                <th>Created At</th>
                <th colspan="2">Action</th>
            </tr>
            
<?php
            if($user_data) {
                foreach($user_data as $data){
?>
                <tr>    
                    <td><?= $data['id']; ?></td>
                    <td><?= $data['firstName']; ?></td>
                    <td><?= $data['lastName']; ?></td>
                    <td><?= $data['userAge']; ?></td>
                    <td><?= $data['emailAdress']; ?></td>
                    <td><?= $data['locatedAt']; ?></td>
                    <td><?= $data['created_at']; ?></td>
                    <td><a href="edit.php?id=<?= $data['id']; ?>" class="btn btn-info btn-sm"> <span class="glyphicon glyphicon-edit"></span></a></td>
                    <td><a href="delete.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
<?php
                }
            } else {
?>
                <tr>
                    <td>No Record Found</td>
                </tr>
<?php
            }
?>
        </table>
    </div>
</div>

    
</body>
</html>

