<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head>
	<title>Bài làm của sinh viên</title>
	<div>	
		<h2 style='margin-left:450px;'>Danh sách bài tập đã nộp</h2>
	</div>
	
	<!-- jQuery library -->
	<script src="lib/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="lib/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<table class="styled-table">
		<thead>
			<tr>
				<th>Người nạp bài</th>
                <th>Tên file</th>
                <th>Thời gian nạp</th>
                <th>Tải về </th>
			</tr>
		</thead>
		<tbody>

<?php require_once 'db_helper.php';

$dir = "/admin/answer/";

$all_files = scandir($dir);
$files = array_diff($all_files, array('.', '..')); 

$sql = 'select * from homework';
$list_submit = execute_result($sql);

foreach ($list_submit as $submit) {
    echo '<tr>
        <td>'.$submit['username'].'</td>
        <td>'.$submit['filename'].'</td>
        <td>'.$submit['time'].'</td>'
        ."<td><a href='download.php?answer=".$submit['filename']."'>".$submit['filename']."</a></td>
          </tr>";
}
?>
		</tbody>
    </table>

</body>
</html>

