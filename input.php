<?php
  require_once ('dbhelp.php');

  $s_fullname = $s_codeStudent = $s_class = $s_address = $s_gender = '';

    if(!empty($_POST)) {
        $s_id = "";

        if(isset($_POST['fullname'])) {  // => nếu có trường full name thì 
            $s_fullname = $_POST['fullname']; // post lên sever 
        }

        if(isset($_POST['codeStudent'])) {
            $s_codeStudent = $_POST['codeStudent'];
        }

        if(isset($_POST['class'])) {
            $s_class = $_POST['class'];
        }

        if(isset($_POST['address'])) {
            $s_address = $_POST['address'];
        }

        if(isset($_POST['gender'])) {
            $s_gender = $_POST['gender'];
        }

        if(isset($_POST['id'])) {
            $s_id = $_POST['id'];
        }

        if($s_id != ''){
            //câu lệnh update
            $sql = "UPDATE student set fullname = '$s_fullname', codeStudent = '$s_codeStudent', class = '$s_class', address = '$s_address', gender = '$s_gender' where id =  ".$s_id;
        }else{
            //câu lệnh insert
            $sql = "insert into student(fullname, codeStudent, class, address, gender) value(' $s_fullname', '$s_codeStudent', '$s_class', '$s_address', '$s_gender')";
        }


        execute($sql);

        // chuyển về trang index
        header('location: index.php');
        die();
    }

    $id = '';   
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = 'select * from student where id = ' .$id;
        $studentList = executeResult($sql);
        if($studentList != null && count($studentList) > 0) {
            $std = $studentList[0];
            $s_fullname = $std['fullname'];
            $s_codeStudent = $std['codeStudent'];
            $s_class = $std['class'];
            $s_address = $std['address'];
            $s_gender = $std['gender'];
        } else{
            $id = '';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa thông tin sinh viên</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading" style="padding:20px">
				<h2 class="text-center">Thêm | Sửa thông tin sinh viên </h2>
			</div>
			<div class="panel-body">
                <form method="post" >
                    <div class="form-group">
                        <label for="usr">Họ & tên</label>
                        <input type="number" value="<?=$id?>" style="display:none;">
                        <input required="true" type="text" class="form-control" id="usr" name='fullname' value ="<?=$s_fullname?>">
                    </div>
                    <div class="form-group">
                        <label for="codeStudent">Mã sinh viên</label>
                        <input required="true" type="number" class="form-control" id="codeUsr" name='codeStudent' value ="<?=$s_codeStudent?>">
                    </div>
                    <div class="form-group">
                        <label for="class">Lớp</label>
                        <input type="text" class="form-control" id="class" name='class' value ="<?=$s_class?>">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input required="true" type="text" class="form-control" id="address" name= 'address' value ="<?=$s_address?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Giới tính</label>
                        <input required="true" type="text" class="form-control" id="gender" name='gender' value ="<?=$s_gender?>">
                    </div>
                    <button class="btn btn-success">Lưu</button>
                </form>
			</div>
		</div>
	</div>
</body>
</html>