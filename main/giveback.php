<?php
session_start();
include("../checkSession.php");
include("../db.php");

if (isset($_GET["txt"])) {
    $searchText = $_GET["txt"];
} else {
    $searchText = "";
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = "";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Give Back</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/user.css">
    <style>
        body {
  background-image: url('https://img.freepik.com/free-vector/world-book-day-background_23-2149323890.jpg?w=996&t=st=1698057400~exp=1698058000~hmac=0a928336604dfaf0c55083698b6b5cc2dfca733cf2a3a6feb44f7fafb32237d2');
}

.button {
  background-color: #ea7b4f; /* Orange */
  border: none;
  color: white;
  padding: 5px 15px; /* ขนาด */
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 1px 1px; /* ขอบ */
  cursor: pointer;
}

.button2 {background-color: #878787;
    border: none;
  color: white;
  padding: 5px 15px; /* ขนาด */
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 1px 1px; /* ขอบ */
  cursor: pointer;} /* Gray */
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #d1d5fa;">
        <div class="container-fluid">
            <a class="navbar-brand" href="mainScreen.php">Book.ING</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="borrow.php">ยืมหนังสือ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="giveback.php">คืนหนังสือ</a>
                    </li>
                </ul>
                <div class="d-flex flex-row-reverse bg-secondary">
                    <a href="../logout.php"><input type="button" value="Log out" button class="button"></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="alert alert-secondary"  style="background-color: #fdb3ca;">
        You are now logged in as <strong><?php echo $username; ?></strong>
    </div>

    <center>
        <form name="frmSearch" method="GET" action="<?= $_SERVER['SCRIPT_NAME']; ?>">
            <tr>
                <th>Search book name or book ID:
                    <input name="txt" type="text" id="txt" value="<?php echo $searchText; ?>">
                    <input type="submit" value="Search" button class="button">
                    <br><br>
                </th>
            </tr>
        </form>
        <?php
        $strSQL = "SELECT * FROM `book` 
            INNER JOIN `bookingstatus` ON book.BookID = bookingstatus.BookID
            WHERE ((book.BookID LIKE '%" . $searchText . "%' OR BookName LIKE '%" . $searchText . "%') AND (BookStatus = 'Borrowed' AND username = '$username'))";
        $objquery =  mysqli_query($con, $strSQL);
        $i = 0;
        echo "<table border=1>";
        echo "<tr bgcolor=#DAA520><th>BookID</th>";
        echo "<th>BookName</th>";
        echo "<th>Borrower</th>";
        echo "<th>Status</th>";
        echo "<th>Give back?</th>";
        echo "</tr>";
        if (mysqli_num_rows($objquery) > 0) {
            while ($row = mysqli_fetch_assoc($objquery)) {
                $i++;
                if ($i % 2 == 0) {
                    echo "<tr bgcolor=#f1bcae>";
                } else {
                    echo "<tr bgcolor=#c9decf>";
                }
                echo "<td>" . $row["BookID"] . "</td><td>" . $row["BookName"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["BookStatus"] . "</td><td><a href='checkBorrow.php?BookID=" . $row["BookID"] . "&BookStatus=Borrowed'>คืน</a></td>";
            }
        }
        echo "</table>";
        mysqli_close($con);
        ?>
    </center>
</body>
</html>
