<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Teamproject</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: #ff6666;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <h4>แสดงรายชื่อนักร้อง</h4>
                    <a href="popular_add.php" class="btn btn-link">เพิ่มข้อมูลนักร้อง</a>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>รหัส</th>
                                    <th>คำนำหน้า</th>
                                    <th>ชื่อ</th>
                                    <th>สกุล</th>
                                </tr>
                            </thead>
                            <body>
                    <?php
                        include 'connectdb.php';                        
                        $sql =  'SELECT * FROM popular_detail order by ppl_id';
                        $result = mysqli_query($conn,$sql);
                        while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                            echo '<tr>';
                            echo '<td>' . $row['ppl_id'] . '</td>';
                            echo '<td>' . $row['ttl_name'] . '</td>';
                            echo '<td>' . $row['ppl_fname']. '</td>';
                            echo '<td>' . $row['ppl_lname']. '</td>';
                            echo '<td>';
                            ?>
                                <a href="popular_edit.php?ppl_id=<?php echo $row['ppl_id'];?>" class="btn btn-warning">แก้ไข</a>
                                <a href="JavaScript:if(confirm('ยืนยันการลบ')==true)
                                   {window.location='popular_delete.php?ppl_id=<?php echo $row["ppl_id"];?>'}" class="btn btn-danger">ลบ</a>
                            <?php
                                    echo '</td>';                            
                            echo '</tr>';
                        }
                        mysqli_free_result($result);
                        echo '</table>';
                        mysqli_close($conn);
                    ?>
                            </body>
                        </table>    
                </div>    
            </div>
            <div class="row">
                <address>เทคโนโลยีสารสนเทศปี2</address>
            </div>
        </div>    
    </body>
</html>