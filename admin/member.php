<?php 
    $js_array = ['js/member.js'];
    $menu_code = 'member';
    include 'common.php'; 
    include 'header.php';
    include '../inc/dbconfig.php';
    include '../inc/member.php';
    include '../inc/lib.php';  //페이지네이션

    $sn = (isset($_GET['sn']) && $_GET['sn'] != '' && is_numeric($_GET['sn'])) ? $_GET['sn'] : '';
    $sf = (isset($_GET['sf']) && $_GET['sf'] != '' ) ? $_GET['sf'] : '';

    $paramArr = [ 'sn' => $sn, 'sf' => $sf];
    $mem = new Member($db);

    $total = $mem -> total($paramArr);
    $limit = 5;
    $page_limit = 5;
    $page = (isset($_GET['page']) && $_GET['page'] != '' && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
    $param = '';
    $memArr = $mem -> list($page, $limit, $paramArr);
?>

<main class="w-90 border rounded-4 p-5 gap-5" style="height:calc(100vh-257px)">
<div class="container">
    <h3>회원관리</h3>
</div>
<table class="table table-border">
    <tr>
        <th>번호</th>
        <th>아이디</th>
        <th>이름</th>
        <th>이메일</th>
        <th>등록일시</th>
        <th>최근접속</th>
        <th>관리</th>
    </tr>
        <?php foreach($memArr AS $row) {   
            // $row['create_at'] = substr($row['create_at'],0,16);  //여기서 이렇게 해줘도 되고 inc/member.php에서 create_at을 불러올 때 $Y-%M-%D %H:%i로 불러와도 됨
        ?>
    <tr>
        <td><?= $row['idx']; ?></td>
        <td><?= $row['id']; ?></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['create_at']; ?></td>
        <td><?= $row['login_dt']; ?></td>
        <td><button class="btn btn-primary btn-sm btn_mem_edit" data-idx="<?= $row['idx']; ?>">관리</button></td>
        <td><button class="btn btn-danger btn-sm btn_mem_delete" data-idx="<?= $row['idx']; ?>">삭제</button></td>
    </tr>
        <?php }    ?>
</table>
    <div class="container mt-3 d-flex gap-4 w-60">
        <select class="form-select w-25" name="sn" id="sn">
            <option value="1">이름</option>
            <option value="2">아이디</option>
            <option value="3">이메일</option>
        </select>
        <input type="text" class="form-control w-25" name="sf" id="sf">
        <button class="btn btn-primary w-25" id="btn_search">검색</button>
        <button class="btn btn-success w-25" id="btn_all">전체보기</button>
    </div>
    <div class="d-flex mt-3 justify-content-between align-items-start">
        <?php
            $param = '&sn='. $sn. '&sf='. $sf; 
            $pagination = my_pagination($total, $limit, $page_limit, $page, $param);
            echo $pagination;
        ?>
        <button class="btn btn-primary" id="btn_excel">엑셀로 저장</button>
    </div>
</main>
<?php include 'footer.php'; ?>