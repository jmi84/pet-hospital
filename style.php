<?php
/*** set the content type header ***/
/*** Without this header, it wont work ***/
header("Content-type: text/css");


$font_family = 'Arial, Helvetica, sans-serif';
$font_size = '0.7em';
$border = '1px solid';
?>

html, body {
  background: #E5E4E2;
}


h1 {
    text-align: center;
}


table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 3px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}




input[type=text] {
  align: center;
  width: 145px;
  box-sizing: border-box;
  border: .5px solid #ccc;
  border-radius: 3px;
  font-size: 14px;
  background-color: white;
  background-repeat: no-repeat;
  padding: 8px 15px 8px 10px;
  -webkit-transition: width 0.3s ease-in-out;
  transition: width 0.3s ease-in-out;
}

input[type=text]:focus {
  width: 200px;
}
