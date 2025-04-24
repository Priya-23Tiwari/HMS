<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();


   if (isset($_POST['get_users']))
   {
      $res = selectAll('user_cred');
      $i = 1;

      $data = "";

      while ($row = mysqli_fetch_assoc($res))
      {
         $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none'><i class='bi bi-trash'></i> </button>";
      
         $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-primary btn-sm shadow-none'>Active</button>";

         if(!$row['status']){
         $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-warning btn-sm shadow-none'>Inactive</button>";

         }
         $date = date("d-m-Y",strtotime($row['datentime']));

         $data .= "
            <tr>
               <td>$i</td>
               <td>$row[name]</td>
               <td>$row[email]</td>
               <td>$row[phonenum]</td>
               <td>$row[address] | $row[pincode]</td>
               <td>$row[dob]</td>
               <td>$status</td>
               <td>$date</td>
               <td>$del_btn</td>
               
            </tr>
         ";
         $i++;
      }

      echo $data;
   }



   if (isset($_POST['toggle_status'])) {
      $frm_data = filteration($_POST);

      $q = "UPDATE `user_cred` SET `status`=? WHERE `id`=?";
      $v = [$frm_data['value'], $frm_data['toggle_status']];

      if (update($q, $v, 'ii')) {
         echo 1;
      } else {
         echo 0;
      }
   }



   if (isset($_POST['remove_user'])) {
      $frm_data = filteration($_POST);


      $res = delete("DELETE FROM `user_cred` WHERE `id`=?", [$frm_data['user_id']], 'i');


      if ($res) {
         echo 1;
      } else {
         echo 0;
      }
   }

?>
