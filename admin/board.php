<?php 
    $js_array = ['js/board.js'];
    $menu_code = 'board';
    include 'common.php'; 
    include 'header.php';
    include '../inc/dbconfig.php';
    include '../inc/boardmanage.php';
    include '../inc/lib.php';

    $sn = (isset($_GET['sn']) && $_GET['sn'] != '' && is_numeric($_GET['sn'])) ? $_GET['sn'] : '';
    $sf = (isset($_GET['sf']) && $_GET['sf'] != '' ) ? $_GET['sf'] : '';

    $paramArr = [ 'sn' => $sn, 'sf' => $sf];
    $board = new BoardManage($db);
    $boardArr = $board->list();
?>

<main class="border rounded-2 p-5" style="height: calc(100vh - 257px)">
    <div class="container">
        <h3 class="text-center">게시판관리</h3>
    </div>
    <table class="table table-border table-hover">
        <tr>
            <th class="text-center">번호</th>
            <th class="text-center">게시판 이름</th>
            <th class="text-center">게시판 코드</th>
            <th class="text-center">게시판 타입</th>
            <th class="text-center">게시물 수</th>
            <th class="text-center">등록일시</th>
            <th class="text-center">관리</th>
        </tr>
        <?php foreach($boardArr AS $row) { ?>
        <tr>
            <td class="text-center"><?= $row['idx']; ?></td>
            <td class="text-center"><?= $row['name' ]; ?></td>
            <td class="text-center"><?= $row['bcode' ]; ?></td>
            <td class="text-center"><?= $row['btype']; ?></td>
            <td class="text-center"><?= $row['cnt']; ?></td>
            <td class="text-center"><?= $row['create_at']; ?></td>
            <td class="text-center">
                <button class="btn btn-success btn-sm btn_board_view" data-bcode="<?= $row['bcode']; ?>">보기</button>
                <button class="btn btn-primary btn-sm btn_mem_edit" data-bs-toggle="modal" data-bs-target="#board_create_modal" data-idx="<?= $row['idx']; ?>">수정</button>
                <button class="btn btn-danger btn-sm btn_mem_delete" data-idx="<?= $row['idx']; ?>">삭제</button>
            </td>
        </tr>
        <?php } ?>
    </table>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#board_create_modal" id="btn_create_modal">게시판 생성</button>
</main>

<!-- Modal -->
<div class="modal fade" id="board_create_modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalTitle">게시판 생성</h1>
                <input type="hidden" name="mode" id="board_mode" value="">  <!-- 수정버튼 눌렀을때 값 넣으려고 추가 -->
                <input type="hidden" name="idx" id="board_idx" value="">  <!-- 수정버튼 눌렀을때 값 넣으려고 추가 -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex gap-2">
                <input type="text" id="board_title" class="form-control" placeholder="게시판 이름">
                <select name="" id="board_type" class="form-select">
                <option value="board">게시판</option>
                <option value="gallery">갤러리</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_board_create">확인</button>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>