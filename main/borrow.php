<?php include("../checkSession.php"); ?>

<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../css/user.css">
<html>
<head>
	<title>Borrow</title>
    <style>
body {
  background-image: url('https://img.freepik.com/free-vector/education-background-with-books-ceiling-lamp_53876-115359.jpg?w=996&t=st=1698055397~exp=1698055997~hmac=2636e2e83ed0e8fd20ce4085ea6d38574e925f48c4a170ab572031c717d3f8ab');
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
        You are now log in as <strong><?php echo $_SESSION['username']; ?></strong>
    </div>
    <center>
        <form name="frmSearch" method="GET" action="<?= $_SERVER['SCRIPT_NAME']; ?>">
            <tr>
                <th>Search book name or book ID:
                    <input name="txt" type="text" id="txt">
                    <input type="submit" value="Search" button class="button">
                    <br><br>
                </th>
            </tr>
        </form>
        <?php
        include("../db.php");
        $strSQL = "SELECT * FROM `book` 
            INNER JOIN `bookingstatus` ON book.BookID = bookingstatus.BookID
            WHERE ((book.BookID LIKE '%" . (isset($_GET["txt"]) ? $_GET["txt"] : '') . "%' OR BookName LIKE '%" . (isset($_GET["txt"]) ? $_GET["txt"] : '') . "%') AND BookStatus = 'Available' )";
        $objquery =  mysqli_query($con, $strSQL);
        $i = 0;
        $link = "#";
        echo "<table border=1>";
        echo "<tr bgcolor=#DAA520><th>BookID</th>";
        echo "<th>BookName</th>";
        echo "<th>Status</th>";
        echo "<th>booking?</th>";
        echo "</tr>";
        if (mysqli_num_rows($objquery) > 0) {
            while ($row = mysqli_fetch_assoc($objquery)) {
                $i++;
                if ($i % 2 == 0) {
                    echo "<tr bgcolor=#a9dfe2>";
                } else {
                    echo "<tr bgcolor=#FFFFFF>";
                }
                echo "<td>" . $row["BookID"] . "</td><td>" . $row["BookName"] . "</td>";
                echo "<td>" . $row["BookStatus"] . "</td><td><a href='checkBorrow.php?BookID=" . $row["BookID"] . "&BookStatus=Available'>ยืม</a></td>";
            }
        }
        echo "</table>";
        mysqli_close($con);
        ?>
    </center>

</body>

</html>
