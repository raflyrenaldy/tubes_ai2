<?php
$con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}


$from = $_POST['from'];
    $to = $_POST['to'];
    $tot = $to - $from;
 
    $jum = ($tot/5687)*100;
    $sql1 = 'TRUNCATE TABLE sample2';
    $sql3 = 'TRUNCATE TABLE sample';
    $sql98 = 'TRUNCATE TABLE samplepercobaan';
    $sql97 = 'TRUNCATE TABLE SAMPLE3';
    $sql96 = 'insert into sample3 select * from adult where id between '.$from.' and '.$to.' '
    $sql4 = 'insert into sample2 select * from adult';
    // $sql5 = 'TRUNCATE TABLE SAMPLE2';
    $sql = 'delete from sample2 where id between '.$from.' and '.$to.' ';
    $sql2 = 'insert into sample(Workclass,Education,education_num,marital_status,Occupation,Relationship,Race,Sex) select Workclass,Education,education_num,marital_status,Occupation,Relationship,Race,Sex from adult where id between '.$from.' and '.$to.' ';
    $sql99 = 'insert into samplepercobaan(Workclass,Education,education_num,marital_status,Occupation,Relationship,Race,Sex) select Workclass,Education,education_num,marital_status,Occupation,Relationship,Race,Sex from adult where id between '.$from.' and '.$to.' ';

    if($jum < 10){
         $query  = mysqli_query($con, $sql1);
         $query3  = mysqli_query($con, $sql3);
         $query99 = mysqli_query($con, $sql98);
         $query98 = mysqli_query($con, $sql97);
        echo " <script>window.location.href='../data2.php?&alert=failed1';</script> ";
    }else if($jum > 25){

         $query  = mysqli_query($con, $sql1);
         $query3  = mysqli_query($con, $sql3);
          $query99 = mysqli_query($con, $sql98);
         $query98 = mysqli_query($con, $sql97);
        echo " <script>window.location.href='../data2.php?&alert=failed2';</script> ";
    }else{
          $query2  = mysqli_query($con, $sql1);
         $query4  = mysqli_query($con, $sql3);
          $query99 = mysqli_query($con, $sql98);
         $query98 = mysqli_query($con, $sql97);
$query  = mysqli_query($con, $sql4);
 $query1  = mysqli_query($con, $sql);
         $query3  = mysqli_query($con, $sql2);
          $query96 = mysqli_query($con, $sql99);
         $query97 = mysqli_query($con, $sql96);
           echo " <script>window.location.href='../data2.php?&alert=success';</script> ";
    }
    
    
  
      

?>