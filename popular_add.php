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
                    <h4>ชื่อนักร้อง</h4>
                    <?php
                        if(isset($_GET['submit'])){
                            $ppl_id = $_GET['ppl_id'];
                            $ppl_ttl_id = $_GET['ppl_ttl_id'];
                            $ppl_fname = $_GET['ppl_fname'];
                            $ppl_lname = $_GET['ppl_lname'];
                            $sql = "insert into popular  ";
                            $sql .= " values (NULL,'$ppl_ttl_id''$ppl_fname','$ppl_lname')";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "เพิ่มนักร้อง $ppl_fname $ppl_lname  เรียบร้อยแล้ว <br>";
                            echo '<a href="popular_list.php">แสดงรายชื่อนักร้องทั้งหมด</a>';
                        }else{
                    ?>

                    <form class="form-horizontal" role="form" name="popular_add" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <label for="ppl_id" class="col-md-2 col-lg-2 control-label">คำนำหน้า</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="ppl_id" id="ppl_id" class="form-control"> <!--56ถึง69สร้างแถปตวเลือกคำนำหน้า-->
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM popular order by ppl_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) { 
                                        echo '<option value=';              
                                        echo '"' . $row['ppl_id'] . '">';
                                        echo $row['ppl_id'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                    <form class="form-horizontal" role="form" name="popular_add" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <label for="ppl_ttl_id" class="col-md-2 col-lg-2 control-label">คำนำหน้า</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="ppl_ttl_id" id="ppl_ttl_id" class="form-control"> <!--56ถึง69สร้างแถปตวเลือกคำนำหน้า-->
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM title order by ttl_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) { 
                                        echo '<option value=';              
                                        echo '"' . $row['ttl_id'] . '">';
                                        echo $row['ttl_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="ppl_fname" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="ppl_fname" id="ppl_fname" class="form-control">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="ppl_lname" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="ppl_lname" id="ppl_lname" class="form-control">
                            </div>    
                        </div> 
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div> 
                    </form>
                    <?php
                        }
                    ?>
                </div>    
            </div>
            <div class="row">
                <address>เทคโนโลยีสารสนเทศปี2</address>
            </div>
        </div>    
    </body>
</html>