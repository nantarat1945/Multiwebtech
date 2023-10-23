<?php 
include("../checkSession.php"); 
include("../db.php");

if(isset($_GET['txt'])){
    $searchText = $_GET['txt'];
} else {
    $searchText = "";
}

$strSQL = "SELECT * FROM `book` 
    INNER JOIN `bookingstatus` ON book.BookID = bookingstatus.BookID
    WHERE (book.BookID LIKE '%" . $searchText . "%' OR BookName LIKE '%" . $searchText . "%')";
$objquery =  mysqli_query($con, $strSQL);
$link = "#";
?>

<!DOCTYPE html>
<html>
<head>
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
        <form name="frmSearch" method="GET" action="<?= $_SERVER['SCRIPT_NAME']; ?>">
            <tr>
                <th>Search book name or book ID:
                    <input name="txt" type="text" id="txt" value="<?php echo $searchText; ?>">
                    <input type="submit" value="Search">
                    <br><br>
                </th>
            </tr>
        </form>
        <?php
        echo "<table border=1>";
        echo "<tr bgcolor=#DAA520><th>BookID</th>";
        echo "<th>BookName</th>";
        echo "<th>Status</th>";
        echo "<th>adjust</th>";
        echo "<th>delete</th>";
        echo "</tr>";
        $i=0;
        if (mysqli_num_rows($objquery) > 0) {
            while ($row = mysqli_fetch_assoc($objquery)) {
                $i++;
                if ($i % 2 == 0) {
                    echo "<tr bgcolor=#89FAF4>";
                } else {
                    echo "<tr bgcolor=#F0FFFF>";
                }
                echo "<td>" . $row["BookID"] . "</td><td>" . $row["BookName"] . "</td>";
                echo "<td>" . $row["BookStatus"] . "</td><td><a href='adjust.php?BookID=" . $row["BookID"] . "&BookName=" . $row["BookName"] . "'>แก้ไข</a></td>";
                echo "<td><a href='delete.php?BookID=" . $row["BookID"] . "'>ลบ</a></td>";
            }
        }
        echo "</table>";
        ?>
    </center>
</body>
</html>
