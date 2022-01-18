<?php

$con = mysqli_connect('localhost', 'root', '', 'datatable');

if(!$con){
    echo 'fail';
}

$sql = "SELECT * FROM crud";

$result = mysqli_query($con, $sql);

$data = array();

if( mysqli_num_rows($result) > 0){
    while( $row = mysqli_fetch_assoc($result)){
        $data = $row;
    }
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}