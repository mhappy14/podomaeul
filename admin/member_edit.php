<?php 
    $js_array = ['js/member_edit.js'];
    $menu_code = 'member';
    include 'common.php'; 
    include 'header.php';
    include '../inc/dbconfig.php';
    include '../inc/member.php';
    include '../inc/lib.php';  //페이지네이션

    
    $idx = (isset($_GET['idx']) && $_GET['idx'] != '' && is_numeric($_GET['idx'])) ? $_GET['idx'] : '';
    if($idx == '') {
        die("<script>alert('idx 값이 비었습니다.');history.go(-1);</script>");
    }

    $mem = new Member($db);

    $row = $mem -> getInfoFormIdx($idx);
?>

<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

<main class="w-75 mx-auto">
    <h1 class="text-center">회원정보수정</h1>
    <form name="input_form" method="post" enctype="multipart/form-data" action="pg/member_process.php">
        <input type="hidden" name="mode" value="edit">
        <input type="hidden" name="idx" value="<?= $row['idx']; ?>">
        <input type="hidden" name="email_chk" value="0">
        <input type="hidden" name="old_email" value="<?= $row['email']; ?>">
        <input type="hidden" name="old_photo" value="<?= $row['photo']; ?>">     
    <div class="mt-3 d-flex gap-3 align-items-end">
        <div class="w-50">
            <label for="f_id" class="form-label">아이디</label>
            <input type="email" class="form-control" name="id" value="<?= $row['id']; ?>" id="f_id" placeholder="아이디 입력창">
        </div>
        <div class="w-50">
            <label for="f_id" class="form-label">레벨</label>
            <select name="" id="" class="form-select">
                <option value="0" <?php if($row['level'] == 0) echo " selected"; ?>>가입대기</option>
                <option value="1" <?php if($row['level'] == 1) echo " selected"; ?>>준회원</option>
                <option value="2" <?php if($row['level'] == 2) echo " selected"; ?>>정회원</option>
                <option value="10" <?php if($row['level'] == 10) echo " selected"; ?>>관리자</option>
            </select>
        </div>
    </div>        
    
    <div class="form-group mt-3 d-flex gap-3 justify-content-between">
        <div class="flex-grow-1">
            <label for="f_pw" class="form-label">비밀번호</label>
            <input type="password" name="password" class="form-control" id="f_pw" placeholder="비밀번호 입력">
        </div>
        <div class="flex-grow-1">
            <label for="f_pw2" class="form-label">비밀번호 확인</label>
            <input type="password" name="password2" class="form-control" id="f_pw2" placeholder="비밀번호 확인">
        </div>
    </div>

    <div class="form-group mt-3 d-flex gap-3 align-items-end">
        <div class="flex-grow-1">
            <label for="f_name" class="form-label">이름(닉네임)</label>
            <input type="email" class="form-control" name="name" value="<?= $row['name']; ?>" id="f_name" placeholder="이름(닉네임) 입력창">
        </div>
    </div>
    
    <div class="form-group mt-3 d-flex gap-3 align-items-end">
        <div class="flex-grow-1">
            <label for="f_email" class="form-label">이메일</label>
            <input type="email" name="email" value="<?= $row['email']; ?>" class="form-control" id="f_email" placeholder="아이디 입력창">
        </div>
        <button type="button" class="btn btn-secondary" id="btn_email_check">이메일 중복확인</button>
    </div>
    
    <div class="mt-3 d-flex gap-3 align-items-end">
        <div class="flex-grow-1">
            <label for="f_zipcode">우편번호</label>
            <input type="text" name="zipcode" value="<?= $row['zipcode']; ?>" id="f_zipcode" readonly class="form-control" maxlength="5" minlength="5">
        </div>
        <button type="button" class="btn btn-secondary" id="btn_zipcode">우편번호 찾기</button>
    </div>
    
    <div class="mt-3 d-flex gap-3 align-items-end">
        <div class="flex-grow-1">
            <label for="f_addr1">주소</label>
            <input type="text" name="addr1" id="f_addr1"  class="form-control" placeholder="" value="<?= $row['addr1']; ?>">
        </div>
        <div class="flex-grow-1">
            <label for="f_addr2">상세주소</label>
            <input type="text" name="addr2" id="f_addr2"  class="form-control" placeholder="상세주소" value="<?= $row['addr2']; ?>">
        </div>
    </div>

    <div class="mt-3 d-flex gap-3 justify-content-between">
        <div>
            <label for="f_photo" class="form-label">프로필 이미지</label>
            <input type="file" name="photo" id="f_photo" class="form-control">
        </div>
        <?php 
            if($row['photo'] != '') {
                echo '<img src="../data/profile/'.$row['photo'].'?v='.date('His').'" id="f_preview" class="w-25" alt="profile image">';
            } else {
                echo '<img src="../images/person.jpg" id="f_preview" class="w-25" alt="profile image">';
            }   
        ?>    
    </div>

    <div class="mt-5 d-flex gap-2">
        <button type="button" class="btn btn-primary flex-grow-1" id="btn_submit">수정하기</button>
        <button type="button" class="btn btn-secondary flex-grow-1">수정취소</button>
    </div>
</form>
</main>

<?php include 'footer.php'; ?>