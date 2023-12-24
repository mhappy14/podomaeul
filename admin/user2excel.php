<?php
include './common.php';
include '../inc/dbconfig.php';
include '../inc/member.php';

$mem = new Member($db);
$rs = $mem -> getAllData();

// header() 방법
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=joomins.xls");
header("Content-Description: PHP8 Generated Data");

//PHPExcel 라이브러리 방법
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .title {
            font-size: 20px;
            text-align: center;
            font-weight: 800;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td colspan="6" class="title"></td>
        </tr>
    </table>
    <table border="1">
        <tr>
            <th>번호</th>
            <th>아이디</th>
            <th>이름</th>
            <th>이메일</th>
            <th>우편번호</th>
            <th>주소</th>
            <th>등록일시</th>
            <th>최근접속</th>
        </tr>
        <?php foreach($rs AS $row) {
            echo'
                <tr>
                    <td>'.$row['idx'].'</td>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['zipcode'].'</td>
                    <td>'.$row['addr1'].' '. $row['addr2'].'</td>
                    <td>'.$row['create_at'].'</td>
                    <td>'.$row['login_dt'].'</td>
                </tr>
            ';
        }?>
    </table>
</body>
</html>

