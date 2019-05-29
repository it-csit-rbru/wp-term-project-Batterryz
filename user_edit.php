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
                    <p></p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                <h4>แก้ไขข้อมูลชื่อ</h4>    
                <?php
                    include 'connectdb.php';
                    if(isset($_GET['submit'])){
                        $user_id = $_GET['user_id'];
                        $user_sid = $_GET['user_sid'];
                        $user_fname = $_GET['user_fname'];
                        $user_lname = $_GET['user_lname'];
                        $user_tel = $_GET['user_tel'];
                        $user_adress = $_GET['user_adress'];
                        $sql        = "update user set ";
                        $sql =" user_sid='$user_sid',user_fname='$user_fname',user_lname='$user_lname',user_tel='$user_tel',user_adress='$user_adress' "
                        $sql ="where user_id='$user_id'";
                        echo $sql;
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "แก้ไข $user_fname $user_lname เรียบร้อยแล้ว<br>";
                        echo '<a href="user_list.php">แสดงผู้ใช้ทั้งหมด</a>';
                    }else{
                        $fuser_id = $_REQUEST['user_id'];
                        $sql =  "SELECT * FROM user where user_id='$fuser_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $fuser_fname = $row['user_fname'];
                        mysqli_free_result($result);
                        mysqli_close($conn);                        
                ?>
                    <form class="form-horizontal" role="form" name="user_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo "$fptt_id";?>">
                        <div class="form-group">
                            <label for="user_lname" class="col-md-2 col-lg-2 control-label">สกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="user_lname" id="user_lname" class="form-control" value="<?php echo "$fptt_name";?>">
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