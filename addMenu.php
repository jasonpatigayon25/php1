<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $menuName = $_POST["menuName"];
    $menuDescription = $_POST["menuDescription"];

    if (strlen($menuName) > 100) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Menu Name is too long',
                    text: 'Menu Name should be up to 100 characters.',
                });
            </script>";
    } elseif (strlen($menuDescription) > 1000) {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Menu Description is too long',
                    text: 'Menu Description should be up to 1000 characters.',
                });
            </script>";
    } else {

        $servername = "localhost";
        $username = "patigayondb";
        $password = "09173722770";
        $dbname = "pointofsale";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO ref_menu ( menu_name, menu_desc)
                VALUES ('$menuName', '$menuDescription')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Menu Item Added',
                        text: 'Menu item has been successfully added to the database.',
                    });
                </script>";
        } else {
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error adding the menu item: " . $conn->error . "',
                    });
                </script>"; 
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu Item</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.5/dist/sweetalert2.all.min.js"></script>
    <style>
        body {
            background-color: lightyellow;
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">PATIGAYON POS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="menu.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addMenu.php">Manage</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center">Add Menu Item</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="mb-3">
                <label for="menuName" class="form-label">Name:</label>
                <input type="text" class="form-control" id="menuName" name="menuName" required maxlength="100">
            </div>
            <div class="mb-3">
                <label for="menuDescription" class="form-label">Description:</label>
                <textarea class="form-control" id="menuDescription" name="menuDescription" required maxlength="1000"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>