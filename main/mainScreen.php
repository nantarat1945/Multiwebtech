<?php include("../checkSession.php"); ?>
<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../css/user.css">
<html>
<head>
	<title>Main</title>
    <style>
body {
  background-image: url('https://img.freepik.com/free-vector/flat-world-book-day-background_23-2149300203.jpg?w=996&t=st=1698054518~exp=1698055118~hmac=d599efb628325ffd5748fc105f9a3823e183d64e93515d9e027e7f62c5324310');
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
        You are now log in as <strong><?php
            echo $_SESSION['username'];
            ?></strong>
    </div>
    <center>
        <form name="frmSearch" method="get" action="<?= $_SERVER['SCRIPT_NAME']; ?>">
            <tr>
                <th>Search book name or bookID:
                    <input name="txtKeyword" type="text" id="txtKeyword" value="<?= isset($_GET["txtKeyword"]) ? $_GET["txtKeyword"] : ''; ?>">
                    <input type="submit" value="Search" button class="button2">
                    <input type="reset" value="Reset" button class="button"><br><br>
                </th>
            </tr>
        </form>
        <?php
        include("../db.php");
        // Check if 'txtKeyword' is set in $_GET before using it
        $searchKeyword = isset($_GET["txtKeyword"]) ? $_GET["txtKeyword"] : '';
        $strSQL = "SELECT * FROM `book`
            INNER JOIN `bookingstatus` ON book.BookID = bookingstatus.BookID
            WHERE (book.BookID LIKE '%" . $searchKeyword . "%' or BookName LIKE '%" . $searchKeyword . "%' )";
        $objquery =  mysqli_query($con, $strSQL);
        echo "<table border=1>";
        echo "<tr><th>BookID</th>";
        echo "<th>BookName</th>";
        echo "<th>Status</th>";
        echo "</tr>";
        $i=0;
        if (mysqli_num_rows($objquery) > 0) {
            while ($row = mysqli_fetch_assoc($objquery)) {
                $i++;
                if ($i % 2 == 0) {
                    echo "<tr bgcolor=#fdb3ca>";
                } else {
                    echo "<tr bgcolor=#d1d5fa>";
                }
                echo "<td>" . $row["BookID"] . "</td><td>" . $row["BookName"] . "</td>";
                echo "<td>" . $row["BookStatus"] . "</td>";
            }
        }
        echo "</table>";
        mysqli_close($con);
        ?>
        </form>
    </center>
</body>

</html>
