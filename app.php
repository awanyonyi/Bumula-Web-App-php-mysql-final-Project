<?php
include('dbconn.php'); // Assuming this file contains the PDO connection

if(isset($_POST['submit'])){
    if($_POST['farr'] > 5000){
        $u_name = $_POST['u_name'];
        $email = $_POST['email'];
        $bday = $_POST['bday'];
        $gender = $_POST['gender'];
        $ward = $_POST['ward'];
        $image_name = $_FILES['file']['name'];
        $image_type = $_FILES['file']['type'];
        $image_size = $_FILES['file']['size'];
        $image_tmp  = $_FILES['file']['tmp_name'];
        $Regno = $_POST['Regno'];
        $sname = $_POST['sname'];
        $level = $_POST['level'];
        $yos = $_POST['yos'];
        $sem = $_POST['sem'];
        $fees = $_POST['fees'];
        $fst_image_name = $_FILES['fst']['name'];
        $fst_image_type = $_FILES['fst']['type'];
        $fst_image_size = $_FILES['fst']['size'];
        $fst_image_tmp  = $_FILES['fst']['tmp_name'];
        $farr_image_name = $_FILES['farrs']['name'];
        $farr_image_type = $_FILES['farrs']['type'];
        $farr_image_size = $_FILES['farrs']['size'];
        $farr_image_tmp  = $_FILES['farrs']['tmp_name'];

        // Prepare SQL statement
        $query = "SELECT * FROM apply WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['email' => $email]);

        if($stmt->rowCount() > 0){
            echo "<script>alert('Data Already Exist');</script>";
        } else {
            $insert_query = "UPDATE apply SET email=:email, bday=:bday, gender=:gender, ward=:ward, file=:file, Regno=:Regno, sname=:sname, level=:level, yos=:yos, sem=:sem, fees=:fees, fst=:fst, farr=:farr, farrs=:farrs WHERE u_name=:u_name";
            $stmt = $pdo->prepare($insert_query);
            $stmt->execute([
                'email' => $email,
                'bday' => $bday,
                'gender' => $gender,
                'ward' => $ward,
                'file' => $image_name,
                'Regno' => $Regno,
                'sname' => $sname,
                'level' => $level,
                'yos' => $yos,
                'sem' => $sem,
                'fees' => $fees,
                'fst' => $fst_image_name,
                'farr' => $farr_image_name,
                'farrs' => $farr_image_name,
                'u_name' => $u_name
            ]);

            echo "<script>alert('Successfully Applied');window.location = 'status.php';</script>";
        }
    } else {
        echo "<script>alert('You dont qualify for a bursary');</script>";
    }
}
?>
