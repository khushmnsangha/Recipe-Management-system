<?php
    require_once 'database.php';
    if (count($_POST) > 0 && isset($_POST)) {
        mysqli_query($conn, "UPDATE Recipe set recipeName='" . $_POST['recipeName'] . "', ingredients='" . $_POST['ingredients'] . "', instructions='" . $_POST['instructions'] . "', imageUrl='" . $_POST['imageUrl'] . "' WHERE recipeName='" . $_POST['recipeName'] . "'");
        $message = "Record Modified Successfully";
        header("Location: get_info.php");
        exit();
    }
    $result = mysqli_query($conn, "SELECT * FROM Recipe WHERE recipeName='" . $_GET['recipeName'] . "'");
    $row = mysqli_fetch_array($result);
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Recipe Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-submit {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        .btn-back {
            background-color: #ccc;
            color: #000;
        }
    </style>
</head>

<body>
    
    <div class="container">
        <h2>Update Movie Data</h2>
        <form name="frmUser" method="post" action="">
            <?php if (isset($message)) { ?>
                <div class="form-group">
                    <p><?php echo $message; ?></p>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="recipeName">RecipeName:</label>
                <input type="hidden" name="recipeName" value="<?php echo $row['recipeName']; ?>">
                <input type="text" name="recipeName" value="<?php echo $row['recipeName']; ?>">
            </div>
            <div class="form-group">
                <label for="ingredients">Ingredients:</label>
                <input type="text" name="ingredients" value="<?php echo $row['ingredients']; ?>">
            </div>
            <div class="form-group">
                <label for="instructions">Instructions:</label>
                <input type="text" name="instructions" value="<?php echo $row['instructions']; ?>">
            </div>
            <div class="form-group">
                <label for="imageUrl">Image Url:</label>
                <input type="text" name="imageUrl" value="<?php echo $row['imageUrl']; ?>">
            </div>
            
            <div class="form-group">
                <input type="submit" name="submit" value="Submit" class="btn-submit">
                <a href="get_info.php" class="btn-back">Back to List</a>
            </div>
        </form>
    </div>
</body>

</html>
