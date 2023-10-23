<?php
session_start(); // Make sure session_start() is at the beginning of the script
include("../checkSession.php");
include("../db.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>AdminSystem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/user.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">AdminSystem</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="addData.php">เพิ่มข้อมูลหนังสือ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bookdata.php">จัดการข้อมูลหนังสือ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userAdj.php">จัดการข้อมูลผู้ใช้งาน</a>
                    </li>
                </ul>
                <div class="d-flex flex-row-reverse bg-secondary">
                    <a href="../logout.php"><input type="button" value="Log out"></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="alert alert-warning">
        You are now logged in as <strong><?php echo $_SESSION['username']; ?></strong>
    </div>
    <center>
        <?php
        $strSQL = "SELECT * FROM `user` 
            INNER JOIN `userinfo` ON user.username = userinfo.username
            WHERE 1";
        $objquery = mysqli_query($con, $strSQL);
        echo "<table border=1>";
        echo "<tr bgcolor=#DAA520>";
        echo "<th>email</th>";
        echo "<th>user</th>";
        echo "<th>password</th>";
        echo "<th>type</th>";
        echo "<th>delete</th>";
        echo "<th>renew</th>";
        echo "</tr>";
        $i = 0;
        if (mysqli_num_rows($objquery) > 0) {
            while ($row = mysqli_fetch_assoc($objquery)) {
                $i++;
                if ($i % 2 == 0) {
                    echo "<tr bgcolor=#89FAF4>";
                } else {
                    echo "<tr bgcolor=#F0FFFF>";
                }
                echo "<td>" . $row["email"] . "</td><td>" . $row["username"] . "</td>";
                echo "<td>" . $row["password"] . "</td><td>" . $row["userType"] . "</td>";
                echo "<td><a href='deleteUser.php?username=" . $row["username"] . "'>ลบ</a></td>";
                echo "<td><a href='renewUser.php?username=" . $row["username"] . "'>ปลดคืน</a></td>";
            }
        }
        echo "</table>";
        mysqli_close($con);
        ?>
    </center>
</body>

</html>
