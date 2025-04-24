<?php

    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');

    if(isset($_POST['register']))
    {
        $data = filteration($_POST);

        //match password and confirm password

        if($data['pass'] != $data['cpass']){
            echo 'pass_mismatch';
            exit;
        }
        
        // check user exists or not

        $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? AND `phonenum` = ?",
        [$data['email'],$data['phonenum']],'ss');

        if(mysqli_num_rows($u_exist)!=0){
            $u_exist_fetch = mysqli_fetch_assoc($u_exist);
            echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
            exit;
        }

        $enc_pass = password_hash($data['pass'],PASSWORD_BCRYPT);
        $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `pincode`, `dob`,
        `password`) VALUES (?,?,?,?,?,?,?)";

        $values = [$data['name'],$data['email'],$data['address'],$data['phonenum'],$data['pincode'],$data['dob'],$enc_pass];

        if(insert($query,$values,'sssssss')){
            echo 1;
        }
        else{
            echo 'ins_failed';
        }

    }

    if(isset($_POST['login']))
    {
        $data = filteration($_POST);

        $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? OR `phonenum` = ?",
        [$data['email_mob'],$data['email_mob']],"ss");

        if(mysqli_num_rows($u_exist)==0){
            echo 'inv_email_mob';
        } 
        else{
            $u_fetch = mysqli_fetch_assoc($u_exist);
            if($u_fetch['status']==0){
                echo 'inactive';
            }
            else{
                if(!password_verify($data['pass'],$u_fetch['password'])){
                    echo 'invalid_pass';
                }
                else{
                    session_start();
                    $_SESSION['login'] = true;
                    $_SESSION['uId'] = $u_fetch['id'];
                    $_SESSION['uName'] = $u_fetch['name'];
                    $_SESSION['uPhone'] = $u_fetch['phonenum'];
                    echo 1;
                }
            }
        }
        
    }




?>