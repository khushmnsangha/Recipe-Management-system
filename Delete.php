<?php
include_once 'database.php';
if (count($_POST) > 0) {
    mysqli_query($conn, "DELETE FROM Recipe WHERE recipeName='" . $_POST['recipeName'] . "'");
    $message = "Record Deleted Successfully";

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
    <title>Delete Recipe Data</title>
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
        <h2>Delete Recipe Data</h2>
        <form name="frmUser" method="post" action="">
            <div><?php if (isset($message)) {
                        echo $message;
                    } ?>
            </div>
            <div style="padding-bottom:5px;">
                <a href="get_info.php" class="btn-back">Back to List</a>
            </div>
            <div class="form-group">
                <label for="recipeName">ID:</label>
                <input type="hidden" name="recipeName" value="<?php echo $row['recipeName']; ?>">
                <span><?php echo $row['recipeName']; ?></span>
            </div>
            <div class="form-group">
                <label for="ingredients">ingredients: </label>
                <span><?php echo $row['ingredients']; ?></span>
            </div>
            <div class="form-group">
                <label for="instructions">Last Name:</label>
                <span><?php echo $row['instructions']; ?></span>
            </div>
            <div class="form-group">
                <label for="imageUrl">Image:</label>
                <span><img src=<?php echo $row['imageUrl']; ?> , width = 300></span>
                <label for= "imageUrl">Image Url </label>
                <span><?php echo $row['imageUrl']; ?></span>
            </div>
            
            <div class="form-group">
                <input type="submit" name="submit" value="Delete Record" class="btn-submit">
            </div>
        </form>
    </div>
</body>

</html>
