<?php


$id = $_POST["x"];

include 'koneksi.php';

$sqlhapus = "DELETE FROM `test1` WHERE `no` = $id;";

if ($conn->query($sqlhapus) === TRUE) {
    header("Location:index.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();


