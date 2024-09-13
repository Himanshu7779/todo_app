<?php
require 'conn.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="main-section">
        <div class="add-section">
            <form action="" method="post" autocomplete="off">
                <input type="text" name="to" placeholder="Enter Today Activity" required>
                <button name="okbtn" type="submit">Add &nbsp; <span>&#43;</span></button>
            </form>
        </div>

        <!-- ==================================INSERT DATA======================================== -->
        <?php
        if (isset($_POST['okbtn'])) {
            $title = $_POST['to'];

            // ====================  INSERT QUERY FOR DATA INSERT      =================================
            $sql = "INSERT INTO `task`(`title`) VALUES ('$title')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                ?>
                <script>
                    alert("DATA INSERTED SUCCESSFULLY");
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert("DATA NOT INSERTED");
                </script>
                <?php
            }


        }
        ?>
        <!-- ==================================INSERT DATA COMPLETE======================================== -->



        <!-- ==================================DATA FETCH FROM DATABASE AND SHOW DATA====================================== -->

        <?php
        $sql = "SELECT * FROM `task` ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);

        ?>
        <div class="show-todo-section">
            <?php if ($row = mysqli_num_rows($result) <= 0) { ?>
                <div class="no-record">
                    <h2 class="no-data">NO DATA FOUND</h2>
                </div>
            <?php } ?>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="todo-item">
                    <span style="display: flex;">
                        <input type="checkbox" name="chk" id="chk1" class="checkbox" />
                            <p ><?php echo $row['title']; ?></p>
                        <button class="btn" onclick="return cdelete();"><a
                                href="delete.php?id=<?php echo $row['id'] ?>">DELETE</a></button>
                    </span>
                    <br>
                    <small>created: <?php echo $row['date']; ?></small>
                </div>
            <?php } ?>
        </div>

        <!-- =============================== DATA FETCH COMPLETE   ================================ -->

    </div>


</body>

</html>