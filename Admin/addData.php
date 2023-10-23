<?php include("../checkSession.php"); ?>
<!DOCTYPE html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="../css/user.css">
<html>

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
        You are now log in as <strong><?php
                                        echo $_SESSION['username'];
                                        ?></strong>
    </div>
    <center>
        <div class="container" style="max-width:500px;">
            <form method="POST" action="add.php">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">BookName:</label>
                    <input type="text" class="form-control" id="bookname" placeholder="Enter book name" name="bn">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Book ID:</label>
                    <input type="text" class="form-control" id="bid" placeholder="Enter book ID" name="bid">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </form>
    </center>

</body>

</html>