<?php
    require_once('dbhelp.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>student manager</title>
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class = "panel panel-heading" style="padding:20px; text-align:center;">
                <h2>Quản Lý thông tin sinh viên</h2>
            </div>
            <div class="panel panel-body">
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th width="40px">STT</th>
                            <th>Họ Tên</th>
                            <th>Mã sinh viên</th>
                            <th>Lớp</th>
                            <th>Địa chỉ</th>
                            <th width="180px">Giới tính</th>
                            <th width="60px"></th>
                            <th width="60px"></th>
                        </tr>  
                    </thead> 
                    <tbody>
<?php
    $sql = 'select * from student';
    $studentList = executeResult($sql);

    $index = 1;
    foreach($studentList as $std){
            echo '  <tr>
                            <td>'.($index++).'</td>
                            <td>'.$std['fullname'].'</td>
                            <td>'.$std['codeStudent'].'</td>
                            <td>'.$std['class'].'</td>
                            <td>'.$std['address'].'</td>
                            <td>'.$std['gender'].'</td>
                            <td><button class="btn btn-warning" onclick=\' window.open("input.php?id='.$std['id'].'", "_self")\'>Sửa</button></td>
                            <td><button class="btn btn-danger" onclick="deleteStudent('.$std['id'].')">Xóa</button></td>
                    </tr>';
    }
?>
                    </tbody>             
                </table>
                <button class="btn btn-success" onclick="window.open('input.php', '_self')">Thêm sinh viên</button>
            </div>
        </div>
    </div>

<script type="text/javascript">
   function deleteStudent(id) {
			option = confirm('Bạn có muốn xoá sinh viên này không')
			if(!option) {
				return;
			}

			console.log(id)
			$.post('delete_student.php', {
				'id': id
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>
</html>