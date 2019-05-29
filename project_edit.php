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
                    <h4>แก้ไขข้อมูลนักร้อง</h4>
                    <?php
                        $prj_id = $_REQUEST['prj_id'];
                        if(isset($_GET['submit'])){
                            $prj_name  = $_GET['prj_name'];
                            $prj_unlname = $_GET['artart_arts_id'];
                            $prj_art_id = $_GET['prj_art_id'];
                            $prj_arts_id = $_GET['prj_arts_id'];
                            $sql = "update project_detail set ";
                            $sql .= "prj_name='$prj_name',prj_unlname='$prj_unlname',prj_art_id='$prj_art_id',prj_arts_id='$prj_arts_id' ";
                            $sql .="where artart_id='$artart_id' ";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "แก้ไขข้อมูลนักร้อง $prj_name $prj_unlname  เรียบร้อยแล้ว <br>";
                            echo '<a href="art_list.php">แสดงรายชื่อนักร้องทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="art_edit" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <input type="hidden" name="artart_id" id="artart_id" value="<?php echo "$ppl_id";?>">
                            <label for="artart_art_id" class="col-md-2 col-lg-2 control-label">คำนำหน้าชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="artart_art_id" id="artart_art_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from art where ppl_id='$ppl_id'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $fppl_fname = $row2['ppl_fname'];
                                    $fppl_lname = $row2['ppl_lname'];
                                    $fppl_ttl_id = $row2['ppl_ttl_id'];
                                    $sql =  "SELECT * FROM title order by ttl_id";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['ttl_id'].'"';
                                        if($row['ttl_id']==$fppl_ttl_id){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['ttl_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
                                </select>
                           </div>    
                        </div>
                        <div class="form-group">
                            <label for="ppl_fname" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="ppl_fname" id="ppl_fname" class="form-control" 
                                       value="<?php echo $fppl_fname;?>">
                            </div>    
                        </div>    
                        <div class="form-group">
                            <label for="ppl_lname" class="col-md-2 col-lg-2 control-label">นามสกุล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="ppl_lname" id="ppl_lname" class="form-control" 
                                       value="<?php echo $fppl_lname;?>">
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