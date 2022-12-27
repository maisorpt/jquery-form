<?php
include 'koneksi.php';
//ambil data
$sql = "SELECT * FROM `test1`";
$ambil_data = $conn->query($sql);

 //data array
 $array = array();
 while ($data = $ambil_data->fetch_assoc()) $array[] =  $data; 
   
  //mengubah data array menjadi json
  
   echo json_encode($array);

?>