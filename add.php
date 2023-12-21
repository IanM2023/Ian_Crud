<?php
    include("db/process.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>CRUD</title>
</head>
<body>
<div class="container">
    <div class="container-fluid">
        <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-6">
<?php
            if(isset($_SESSION['error_message'])) {
                foreach($_SESSION['error_message'] as $errors) {
?>
                 <div class="alert alert-danger" role="alert">
                    <?=  $errors; ?>
                </div>
<?php
                }
                unset($_SESSION['error_message']);
            }
?>
            <!-- Form -->
            <h1>Add New information to the list</h1>
            <p><a href="index.php" class="btn btn-info btn-sm"> <span class="glyphicon glyphicon-edit">BACK</span></a></p>
            <form class="form-example" action="db/process.php" method="post">
            
            <!-- Input fields -->
            <div class="form-group">
                <input type="hidden" class="form-control username"  name="action" value="add_info"/>
            </div>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" class="form-control username" id="firstName" name="firstName"/>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" class="form-control username" id="lastName" name="lastName"/>
            </div>
            <div class="form-group">
                <label for="userAge">Age:</label>
                <input type="number" class="form-control username" id="userAge" name="userAge"/>
            </div>
            <div class="form-group">
                <label for="emailAdress">Email Address:</label>
                <input type="text" class="form-control username" id="emailAdress" name="emailAdress"/>
            </div>
            <div class="form-group">
                <label for="locatedAt">Location:</label>
                <input type="text" class="form-control username" id="locatedAt" name="locatedAt"/>
            </div>
            <button type="submit" class="btn btn-primary btn-customized mt-4" name="submit">
                ADD
            </button>         
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>

    
</body>
</html>

