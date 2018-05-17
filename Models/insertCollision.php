<?php

 $con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}

$sql    = 'SELECT * FROM SAMPLEPERCOBAAN';
$rows = 1;
$query  = mysqli_query($con, $sql);
while ($data = mysqli_fetch_array($query))
{
 // $data['id'] = $id;

if($data['Relationship'] == 'Husband'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '2'){
    $Keputusan = '>50K';

  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '2' && $data['Workclass'] == 'Federal-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '2' && $data['Workclass'] == 'Local-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '2' && $data['Workclass'] == 'Private'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '2' && $data['Workclass'] == 'Self-emp-inc'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '2' && $data['Workclass'] == 'Self-emp-not-inc'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '2' && $data['Workclass'] == 'State-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '2' && $data['Workclass'] == 'Without-pay'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Amer-Indian-Eskimo'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Asian-Pac-Islander'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Black'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other' && $data['Occupation'] == 'Adm-clerical'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other' && $data['Occupation'] == 'Armed-Forces'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other' && $data['Occupation'] == 'Craft-repair'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other' && $data['Occupation'] == 'Exec-managerial'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other' && $data['Occupation'] == 'Farming-fishing'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other' && $data['Occupation'] == 'Handlers-cleaners'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other' && $data['Occupation'] == 'Machine-op-inspct'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other' && $data['Occupation'] == 'Other-service'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other' && $data['Occupation'] == 'Priv-house-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other' && $data['Occupation'] == 'Prof-specialty'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other' && $data['Occupation'] == 'Protective-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other' && $data['Occupation'] == 'Tech-support'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other' && $data['Occupation'] == 'Transport-moving'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'Other' && $data['Occupation'] == 'Sales'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White' && $data['Occupation'] == 'Adm-clerical'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White' && $data['Occupation'] == 'Armed-Forces'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White' && $data['Occupation'] == 'Craft-repair'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White' && $data['Occupation'] == 'Exec-managerial'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White' && $data['Occupation'] == 'Farming-fishing'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White' && $data['Occupation'] == 'Handlers-cleaners'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White' && $data['Occupation'] == 'Machine-op-inspct'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White' && $data['Occupation'] == 'Other-service'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White' && $data['Occupation'] == 'Priv-house-serv'){
    $Keputusan = '<=50K';  
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White' && $data['Occupation'] == 'Prof-specialty'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White' && $data['Occupation'] == 'Protective-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White' && $data['Occupation'] == 'Tech-support'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White' && $data['Occupation'] == 'Transport-moving'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '3' && $data['Race'] == 'White' && $data['Occupation'] == 'Sales'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Federal-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Local-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Private'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc' && $data['Occupation'] == 'Farming-fishing'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc' && $data['Occupation'] == 'Exec-managerial'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc' && $data['Occupation'] == 'Craft-repair'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc' && $data['Occupation'] == 'Adm-clerical'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc' && $data['Occupation'] == 'Armed-Forces'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc' && $data['Occupation'] == 'Handlers-cleaners'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc' && $data['Occupation'] == 'Machine-op-inspct'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc' && $data['Occupation'] == 'Other-service'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc' && $data['Occupation'] == 'Priv-house-serv'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc' && $data['Occupation'] == 'Prof-specialty'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc' && $data['Occupation'] == 'Protective-serv'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc' && $data['Occupation'] == 'Sales'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc' && $data['Occupation'] == 'Tech-support'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-inc' && $data['Occupation'] == 'Transport-moving'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc' && $data['Occupation'] == 'Farming-fishing'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc' && $data['Occupation'] == 'Exec-managerial'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc' && $data['Occupation'] == 'Craft-repair'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc' && $data['Occupation'] == 'Adm-clerical'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc' && $data['Occupation'] == 'Armed-Forces'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc' && $data['Occupation'] == 'Handlers-cleaners'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc' && $data['Occupation'] == 'Machine-op-inspct'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc' && $data['Occupation'] == 'Other-service'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc' && $data['Occupation'] == 'Priv-house-serv'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc' && $data['Occupation'] == 'Prof-specialty'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc' && $data['Occupation'] == 'Protective-serv'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc' && $data['Occupation'] == 'Sales'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc' && $data['Occupation'] == 'Tech-support'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Self-emp-not-inc' && $data['Occupation'] == 'Transport-moving'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'State-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '4' && $data['Workclass'] == 'Without-pay'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Adm-clerical'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Armed-Forces'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Craft-repair'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Exec-managerial'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Farming-fishing'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Handlers-cleaners'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Machine-op-inspct'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Other-service'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Other-service' && $data['Workclass'] == 'Federal-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Other-service' && $data['Workclass'] == 'Local-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Other-service' && $data['Workclass'] == 'Private'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Other-service' && $data['Workclass'] == 'Self-emp-inc'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Other-service' && $data['Workclass'] == 'Self-emp-not-inc'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Other-service' && $data['Workclass'] == 'State-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Other-service' && $data['Workclass'] == 'Without-pay'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Priv-house-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Prof-specialty'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Protective-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Sales'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Tech-support'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '5' && $data['Occupation'] == 'Transport-moving'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '6'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Without-pay'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'State-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Self-emp-not-inc'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Self-emp-inc'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Adm-clerical'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Armed-Forces'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Craft-repair '){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Exec-managerial'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Farming-fishing'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Handlers-cleaners'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Machine-op-inspct'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Other-service'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Other-service' && $data['Race'] == 'Black'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Other-service' && $data['Race'] == 'Asian-Pac-Islander'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Other-service' && $data['Race'] == 'Amer-Indian-Eskimo'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Other-service' && $data['Race'] == 'Other'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Other-service' && $data['Race'] == 'White'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Priv-house-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Prof-specialty'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Protective-serv'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Sales'){
    $Keputusan = '<50k';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Tech-support'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Private' && $data['Occupation'] == 'Transport-moving'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Local-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '7' && $data['Workclass'] == 'Federal-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Adm-clerical'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Armed-Forces'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Craft-repair'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Exec-managerial'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Farming-fishing'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Handlers-cleaners'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Machine-op-inspct'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Other-service'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Priv-house-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Prof-specialt'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Protective-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Sales'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Tech-support'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Transport-moving'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'Other'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'Amer-Indian-Eskimo'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'Asian-Pac-Islander'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'Black'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'White'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'White' && $data['Workclass'] == 'Private'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'White' && $data['Workclass'] == 'Federal-gov'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'White' && $data['Workclass'] == 'Local-gov'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'White' && $data['Workclass'] == 'Self-emp-inc'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'White' && $data['Workclass'] == 'Self-emp-not-inc'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'White' && $data['Workclass'] == 'State-gov'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '8' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'White' && $data['Workclass'] == 'Without-pay'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '11'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Transport-moving'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'Asian-Pac-Islander'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'Black'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'Other'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'White'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Transport-moving' && $data['Race'] == 'Amer-Indian-Eskimo'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Craft-repair'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Armed-Forces'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Adm-clerical'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Exec-managerial'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Exec-managerial' && $data['Race'] == 'Amer-Indian-Eskimo'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Exec-managerial' && $data['Race'] == 'Asian-Pac-Islander'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Exec-managerial' && $data['Race'] == 'Other'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Exec-managerial' && $data['Race'] == 'Black'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Exec-managerial' && $data['Race'] == 'White'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Farming-fishing'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Farming-fishing' && $data['Race'] == 'Amer-Indian-Eskimo'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Farming-fishing' && $data['Race'] == 'Asian-Pac-Islander'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Farming-fishing' && $data['Race'] == 'Other'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Farming-fishing' && $data['Race'] == 'Black'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Farming-fishing' && $data['Race'] == 'White'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Farming-fishing' && $data['Race'] == 'White' && $data['Workclass'] == 'Private'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Farming-fishing' && $data['Race'] == 'White' && $data['Workclass'] == 'Federal-gov'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Farming-fishing' && $data['Race'] == 'White' && $data['Workclass'] == 'Local-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Farming-fishing' && $data['Race'] == 'White' && $data['Workclass'] == 'Self-emp-inc'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Farming-fishing' && $data['Race'] == 'White' && $data['Workclass'] == 'Self-emp-not-inc'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Farming-fishing' && $data['Race'] == 'White' && $data['Workclass'] == 'State-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Farming-fishing' && $data['Race'] == 'White' && $data['Workclass'] == 'Without-pay'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Handlers-cleaners'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Handlers-cleaners' && $data['Workclass'] == 'Private'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Handlers-cleaners' && $data['Workclass'] == 'Federal-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Handlers-cleaners' && $data['Workclass'] == 'Local-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Handlers-cleaners' && $data['Workclass'] == 'Self-emp-inc'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Handlers-cleaners' && $data['Workclass'] == 'Self-emp-not-inc'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Handlers-cleaners' && $data['Workclass'] == 'State-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Handlers-cleaners' && $data['Workclass'] == 'Without-pay'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Machine-op-inspct'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Machine-op-inspct' && $data['Workclass'] == 'Private'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Machine-op-inspct-cleaners' && $data['Workclass'] == 'Federal-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Machine-op-inspct' && $data['Workclass'] == 'Local-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Machine-op-inspct' && $data['Workclass'] == 'Self-emp-inc'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Machine-op-inspct' && $data['Workclass'] == 'Self-emp-not-inc'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Machine-op-inspct' && $data['Workclass'] == 'State-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Machine-op-inspct' && $data['Workclass'] == 'Without-pay'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Other-service'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Priv-house-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Prof-specialty'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Prof-specialty' && $data['Workclass'] == 'Private'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Prof-specialty-cleaners' && $data['Workclass'] == 'Federal-gov'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Prof-specialty' && $data['Workclass'] == 'Local-gov'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Prof-specialty' && $data['Workclass'] == 'Self-emp-inc'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Prof-specialty' && $data['Workclass'] == 'Self-emp-not-inc'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Prof-specialty' && $data['Workclass'] == 'State-gov'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Prof-specialty' && $data['Workclass'] == 'Without-pay'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Protective-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Protective-serv' && $data['Race'] == 'Other'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Protective-serv' && $data['Race'] == 'Amer-Indian-Eskimo'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Protective-serv' && $data['Race'] == 'Asian-Pac-Islander'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Protective-serv' && $data['Race'] == 'Black'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Protective-serv' && $data['Race'] == 'White'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Sales'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Tech-support'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Tech-support' && $data['Workclass'] == 'Self-emp-not-inc'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Tech-support' && $data['Workclass'] == 'Self-emp-inc'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Tech-support' && $data['Workclass'] == 'Private'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Tech-support' && $data['Workclass'] == 'Private' && $data['Race'] == 'Amer-Indian-Eskimo'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Tech-support' && $data['Workclass'] == 'Private' && $data['Race'] == 'Asian-Pac-Islander'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Tech-support' && $data['Workclass'] == 'Private' && $data['Race'] == 'Black'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Tech-support' && $data['Workclass'] == 'Private' && $data['Race'] == 'Other'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Tech-support' && $data['Workclass'] == 'Private' && $data['Race'] == 'White'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Tech-support' && $data['Workclass'] == 'Local-gov'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Tech-support' && $data['Workclass'] == 'Federal-gov'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Tech-support' && $data['Workclass'] == 'State-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '9' && $data['Occupation'] == 'Tech-support' && $data['Workclass'] == 'Without-pay'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '10'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '12'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '12' && $data['Race'] == 'White'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '12' && $data['Race'] == 'Other'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '12' && $data['Race'] == 'Black'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '12' && $data['Race'] == 'Amer-Indian-Eskimo'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '12' && $data['Race'] == 'Asian-Pac-Islander'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '1'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '13'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '14'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '15'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Husband' && $data['education_num'] == '16'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Not-in-family'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Masters'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo' && $data['Occupation'] == 'Adm-clerical'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo' && $data['Occupation'] == 'Armed-Forces'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo' && $data['Occupation'] == 'Craft-repair'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo' && $data['Occupation'] == 'Exec-managerial'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo' && $data['Occupation'] == 'Farming-fishing'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo' && $data['Occupation'] == 'Handlers-cleaners'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo' && $data['Occupation'] == 'Machine-op-inspct'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo' && $data['Occupation'] == 'Other-service'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo' && $data['Occupation'] == 'Priv-house-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo' && $data['Occupation'] == 'Prof-specialty'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo' && $data['Occupation'] == 'Protective-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo' && $data['Occupation'] == 'Sales'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo' && $data['Occupation'] == 'Tech-support'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Amer-Indian-Eskimo' && $data['Occupation'] == 'Transport-moving'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Asian-Pac-Islander'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Black'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Black' && $data['Occupation'] == 'Adm-clerical'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Black' && $data['Occupation'] == 'Armed-Forces'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Black' && $data['Occupation'] == 'Craft-repair'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Black' && $data['Occupation'] == 'Exec-managerial'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Black' && $data['Occupation'] == 'Farming-fishing'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Black' && $data['Occupation'] == 'Handlers-cleaners'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Black' && $data['Occupation'] == 'Machine-op-inspct'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Black' && $data['Occupation'] == 'Other-service'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Black' && $data['Occupation'] == 'Prof-specialty'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Black' && $data['Occupation'] == 'Protective-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Black' && $data['Occupation'] == 'Sales'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Black' && $data['Occupation'] == 'Tech-support'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Black' && $data['Occupation'] == 'Transport-moving'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'Other'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'HS-grad' && $data['Race'] == 'White'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Doctorate'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors' && $data['Occupation'] == 'Adm-clerical'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors' && $data['Occupation'] == 'Armed-Forces'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors' && $data['Occupation'] == 'Craft-repair'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors' && $data['Occupation'] == 'Exec-managerial'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors' && $data['Occupation'] == 'Farming-fishing'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors' && $data['Occupation'] == 'Handlers-cleaners'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors' && $data['Occupation'] == 'Machine-op-inspct'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors' && $data['Occupation'] == 'Other-service'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors' && $data['Occupation'] == 'Priv-house-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors' && $data['Occupation'] == 'Prof-specialty'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors' && $data['Occupation'] == 'Protective-serv'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors' && $data['Occupation'] == 'Sales'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors' && $data['Occupation'] == 'Tech-support'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Bachelors' && $data['Occupation'] == 'Transport-moving'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Assoc-voc'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Assoc-acdm'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == '9th'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == '7th-8th'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == '5th-6th'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == '1st-4th'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == '12th'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == '11th'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == '10th'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Preschool'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Prof-school'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Some-college'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Some-college' && $data['Workclass'] == 'Federal-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Some-college' && $data['Workclass'] == 'Local-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Some-college' && $data['Workclass'] == 'Private'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Some-college' && $data['Workclass'] == 'Self-emp-inc'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Some-college' && $data['Workclass'] == 'Self-emp-not-inc'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Some-college' && $data['Workclass'] == 'State-gov'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Other-relative' && $data['Education'] == 'Some-college' && $data['Workclass'] == 'Without-pay'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Own-child'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Wife'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Wife' && $data['marital_status'] == 'Married-spouse-absent'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Wife' && $data['marital_status'] == 'Married-civ-spouse'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Wife' && $data['marital_status'] == 'Married-civ-spouse' && $data['Sex'] == 'Female'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Wife' && $data['marital_status'] == 'Married-civ-spouse' && $data['Sex'] == 'Male'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Wife' && $data['marital_status'] == 'Divorced'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Wife' && $data['marital_status'] == 'Married-AF-spouse'){
    $Keputusan = '<=50K';
  }elseif($data['Relationship'] == 'Wife' && $data['marital_status'] == 'Never-married'){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Wife' && $data['marital_status'] == 'Separated '){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Wife' && $data['marital_status'] == 'Widowed '){
    $Keputusan = '>50K';
  }elseif($data['Relationship'] == 'Unmarried'){
    $Keputusan = '<=50K';
  }
 var_dump($Keputusan);
  $query_update = mysqli_query($con,"UPDATE SAMPLEPERCOBAAN set Income = '$Keputusan' where id = $data[id] ");
}

 echo "<script>window.location.href='../data4.php'</script>";
?>