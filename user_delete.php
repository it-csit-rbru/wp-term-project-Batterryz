<?php
            include 'connectdb.php';
            $user_id = $_GET['user_id'];
            $sql = "delete from user where user_id='$user_id'";
            $result = mysqli_query($conn,$sql);
            if($result){
                echo 'ลบแล้ว';
                header('refresh: 1; user_list.php');
            }else{
                echo 'ลบไม่ได้';
                header('refresh: 1; user_list.php');
            }
            mysqli_close($conn);
        ?>