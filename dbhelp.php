<?php

require_once('config.php');

//hàm insert , update , delete
function execute($sql){
    // tạo kết nối tới db 

    $conn = mysqli_connect(HOST,USERNAME, PASSWORD, DATABASE);

    // TRUY VẤN
        mysqli_query($conn , $sql);

    // ĐÓNG KẾT NỐI
        mysqli_close($conn);

}

// sử dụng cáu lệnh select => trả về kết quả 

function executeResult($sql){

    $conn = mysqli_connect(HOST,USERNAME, PASSWORD, DATABASE);

    // TRUY VẤN
        $resultSet =  mysqli_query($conn , $sql);
        $list= [];
        while($row = mysqli_fetch_array($resultSet, 1)) {
            $list[] = $row;
        }

    // ĐÓNG KẾT NỐI
        mysqli_close($conn);

        return $list;

}