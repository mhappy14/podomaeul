<?php
include 'inc/common.php'; // 세션 
include 'inc/dbconfig.php';
include 'inc/board.php'; // 게시판 클래스
include 'inc/comment.php'; // 댓글 클래스
include 'inc/lib.php'; // 페이지네이션

$bcode = (isset($_GET['bcode']) && $_GET['bcode'] != '') ? $_GET['bcode'] : '';
$idx = (isset($_GET['idx']) && $_GET['idx'] != '' && is_numeric($_GET['idx'])) ? $_GET['idx'] : '';
$page  = (isset($_GET['page' ]) && $_GET['page' ] != '' && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$sn    = (isset($_GET['sn'   ]) && $_GET['sn'   ] != '') ? $_GET['sn'   ] : '';
$sf    = (isset($_GET['sf'   ]) && $_GET['sf'   ] != '') ? $_GET['sf'   ] : '';
 
if($bcode == '') {
    die('<script>alert("게시판 코드가 빠졌습니다.");history.go(-1);</script>');
}

if($idx == '') {
    die('<script>alert("게시물 번호가 빠졌습니다.");history.go(-1);</script>');
}

// 게시판 목록
include 'inc/boardmanage.php';
$boardm = new BoardManage($db);
$boardArr = $boardm->list();
$board_name = $boardm->getBoardName($bcode);

$board = new Board($db); // 게시판 클래스
$menu_code = 'law';
$js_array = [ 'js/law_view.js'];
$g_title = $board_name;

$boardRow = $board->view($idx);

$paramArr = ['sn' => $sn, 'sf' => $sf];

$total = $board->total($bcode, $paramArr);

$limit = 10;
$page_limit = 5;
$boardRs = $board->list($bcode, $page, $limit, $paramArr);

if($boardRow == null)  {
    die('<script>alert("존재하지 않는 게시물입니다.");history.go(-1);</script>');
}

// 댓글 목록
$comment = new Comment($db);
$commentRs = $comment->list($idx);

// $_SERVER['REMOTE_ADDR'] : 지금 접속한 사람의 IP정보를 담고 있음.
if($boardRow['last_reader'] != $_SERVER['REMOTE_ADDR'])  {
    $board->hitInc($idx);
    $board->updateLastReader($idx, $_SERVER['REMOTE_ADDR']);
}

// 다운로드 횟수 저장 배열
$downhit_arr = explode('?', $boardRow['downhit']);

include_once 'inc/header.php';

?>

<main class="w-100 mx-auto border rounded-2 p-5">
    <div class="vstack w-100 mx-auto">
        <div class="p-3">
            <span class="h3 fw-bolder"><?= $boardRow['name']; ?></span>
        </div>
        <div class="d-flex border border-top-0 border-start-0 border-end-0 border-bottom-1">
            <span><b>글쓴이 </b><?= $boardRow['name']; ?></span>
            <span class="ms-5 me-auto"><b>조회수 </b><?= $boardRow['hit']; ?>회</span>
            <span><?= $boardRow['create_at']; ?></span>
        </div>
        <div class="p-3">
            <?= $boardRow['content']; ?>
            <?php
                // 첨부파일 출력
                if ($boardRow['files'] != '') {
                    $filelist = explode('?', $boardRow['files']);

                    //  [배열명] = array_fill([시작번호], [채울 항목수], "[값]");
                    if($boardRow['downhit'] == '') {
                        $downhit_arr =   array_fill(0, count($filelist), 0);  
                    }

                    $th = 0;
                    foreach($filelist AS $file) {
                        list($file_source, $file_name) = explode('|', $file);
                        echo "<a href=\"./pg/boarddownload.php?idx=$idx&th=$th\">$file_name</a> (down: ".$downhit_arr[$th].")<br>";
                        $th++;
                    }
                }
            ?>
        </div>
        <div class="d-flex gap-2 p-3">
            <button class="btn btn-secondary me-auto" id="btn_list">목록</button>
            <?php if($boardRow['id'] == $ses_id) { ?>
            <button class="btn btn-primary" id="btn_edit">수정</button>
            <button class="btn btn-danger" id="btn_delete">삭제</button>
            <?php } ?>    
        </div>
        <div class="d-flex gap-2 mt-3">
            <textarea name="" rows="3" class="form-control" id="comment_content"></textarea>
            <button class="btn btn-secondary" id="btn_comment" data-comment-idx="0">등록</button>
        </div>
        <div class="mt-3">
            <table class="table">
                <colgroup>
                    <col width="50%" />
                    <col width="10%" />
                    <col width="10%" />
                </colgroup>
                    <?php foreach($commentRs AS $comRow) { ?>
                    <tr>
                        <td><span><?php echo nl2br($comRow['content']); ?></span>
                        <?php 
                        if($comRow['id'] == $ses_id) {
                            echo ' 
                            <button class="btn btn-info p-1 btn-sm btn_comment_edit" data-comment-idx="'. $comRow['idx'] .'">수정</button>
                            <button class="btn btn-danger p-1 btn-sm ms-2 btn_comment_delete" data-comment-idx="'.$comRow['idx'].'">삭제</button>';
                        }
                        ?></td>
                        <td><?php echo $comRow['id']; ?></td>
                        <td><?php echo $comRow['create_at']; ?></td>
                    </tr>
                    <?php } ?>
            </table>
        </div>
    </div>
</main>

<style>
    .tr { cursor: pointer; }
</style>

<main class="w-100 mx-auto border rounded-2 p-5 mt-2">
    <h3 class="text-center"><?= $board_name; ?></h3>
    <table class="table striped table-hover mt-5">  <!-- 글목록 -->
        <colgroup>
            <col width="10%">
            <col width="45%">
            <col width="10%">
            <col width="15%">
            <col width="10%">
        </colgroup>
        <tr>
            <th>번호</th>
            <th>제목</th>
            <th>이름</th>
            <th>날짜</th>
            <th>조회 수</th>
        </tr>
        <?php
        $cnt = 0;
        $ntotal = $total - ($page - 1) * $limit;
        foreach($boardRs AS $boardRow){
            $number = $ntotal - $cnt;
            $cnt++;
        ?>    
            <tr class="tr" data-idx="<?= $boardRow['idx']; ?>">
                <td><?= $number; ?></td>
                <td>
                    <?php echo $boardRow['subject'];

                    if($boardRow['comment_cnt'] > 0) {
                        echo ' <span class="badge bg-secondary">'.$boardRow['comment_cnt'].'</span>';  
                    } 
                    ?>
                </td>
                <td><?= $boardRow['name'     ]; ?></td>
                <td><?= $boardRow['create_at']; ?></td>
                <td><?= $boardRow['hit'      ]; ?></td>
            </tr>
        <?php 
        }
        ?>    
    </table>

    <div class="d-flex justify-content-center">
        <?php
            $param = '&bcode=' . $bcode;
            if(isset($sn) && $sn != '' && isset($sf) && $sf != '') {
                $param .= '&sn='. $sn. '&sf='. $sf;
            }
            echo my_pagination($total, $limit, $page_limit, $page, $param); 
        ?>
    </div>
</main>
<?php include_once 'inc/footer.php'; ?>