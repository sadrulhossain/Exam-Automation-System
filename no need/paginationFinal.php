<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Paging in PHP</title>
        <script src="js/jquery-3.1.1.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    </head>
    <body>
        <?php
        $con = mysqli_connect("localhost", "root", "", "pagination");

        $per_page = 5;
        if (isset($_GET["page"])) {

            $page = $_GET["page"];
        } else {

            $page = 1;
        }

// Page will start from 0 and Multiple by Per Page
        $start_from = ($page - 1) * $per_page;

//Selecting the data from table but with limit
        $query = "SELECT * FROM tbl_student LIMIT $start_from, $per_page";
        $result = mysql_query($con, $query);
        ?>
        <table align="center" border="2" cellpadding="3">
            <tr><th>student name</th><th>student phone</th></tr>
            <?php
            while ($row = mysql_fetch_assoc($result)) {
                ?>
                <tr align="center">
                    <td><?php echo $row['student_name']; ?></td>
                    <td><?php echo $row['student_phone']; ?></td>
                </tr>
                <?php
            };
            ?>
        </table>

        <div>
            <?php
//Now select all from table
            $query = "select * from tbl_student";
            $result = mysqli_query($con, $query);

// Count the total records
            $total_records = mysqli_num_rows($result);

//Using ceil function to divide the total records on per page
            $total_pages = ceil($total_records / $per_page);

//Going to first page
//            echo "<center><a href ='paging.php?page=1'>".'First Page'." </a>";
//
//            for ($i = 1; $i <= $total_pages; $i++) {
//
//                echo "<a href ='paging.php?page=".$i."'> ".$i."</a>";
//            };
//// Going to last page
//            echo "<a href ='paging.php?page=$total_pages'> ".'Last Page'."</a></center>";
            ?>

        </div>
        
        <nav aria-label="Page navigation" align="center">
            <ul class="pagination">
                <li>
                    <?php 
                        
                     echo "<a href='paginationFinal.php?page=1' aria-label='Previous'>
                        <span aria-hidden='true'>".'&laquo'."</span>
                    </a>";
                    ?>
                </li>
                <?php
                for ($i = 1; $i <= $total_pages; $i++) {

                    echo "<li><a href='paginationFinal.php?page=" . $i . "'>" . $i . "</a></li>";
                };
                ?>

                <li>
                    <?php
                        echo "<a href='paginationFinal.php?page=$total_pages' aria-label='Next'>
                            <span aria-hidden='true'>".'&raquo'."</span>
                        </a>";
                    ?>
                </li>
            </ul>
        </nav>

    </body>
</html>