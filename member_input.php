<?php 
    $js_array = ['js/member_input.js'];
    $title = '회원가입';
    include 'inc/header.php';
?>
<?php
if(!isset($_POST['chk']) or $_POST['chk'] !=1) {
    // die("<script>
    // alert('약관 동의가 필요합니다.')
//     // self.location.href='.stipulation.php'
// </script>");
}
?>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

<main class="w-50 mx-auto">
    <h1 class="text-center">회원가입</h1>
    <form name="input_form" method="post" enctype="multipart/form-date" action="pg/member_process.php">
        <input type="hidden" name="mode" value="input">
        <input type="hidden" name="id_chk" value="0">    
        <input type="hidden" name="email_chk" value="0">        
    <div class="form-group d-flex gap-3 align-items-end">
        <div class="flex-grow-1">
            <label for="f_id" class="form-label">아이디</label>
            <input type="email" class="form-control" name="id" id="f_id" placeholder="아이디 입력창">
        </div>
        <button type="button" class="btn btn-secondary" id="btn_id_check">아이디 중복확인</button>
    </div>
    
    <div class="form-group mt-3 d-flex gap-3 justify-content-between">
        <div class="flex-grow-1">
            <label for="f_pw" class="form-label">비밀번호</label>
            <input type="password" name="password" class="form-control" id="f_pw" placeholder="비밀번호 입력">
        </div>
        <div class="flex-grow-1">
            <label for="f_pw2" class="form-label">비밀번호 확인</label>
            <input type="password2" name="password2" class="form-control" id="f_pw2" placeholder="비밀번호 확인">
        </div>
    </div>
    
    <div class="form-group mt-3 d-flex gap-3 align-items-end">
        <div class="flex-grow-1">
            <label for="f_email" class="form-label">이메일</label>
            <input type="email" name="email" class="form-control" id="f_email" placeholder="아이디 입력창">
        </div>
        <button type="button" class="btn btn-secondary" id="btn_email_check">이메일 중복확인</button>
    </div>
    
    <div class="mt-3 d-flex gap-3 align-items-end">
        <div class="flex-grow-1">
            <label for="f_zipcode">우편번호</label>
            <input type="text" name="zipcode" id="f_zipcode" readonly class="form-control" maxlength="5" minlength="5">
        </div>
        <button type="button" class="btn btn-secondary" id="btn_zipcode">우편번호 찾기</button>
    </div>
    
    <div class="mt-3 d-flex gap-3 align-items-end">
        <div class="flex-grow-1">
            <label for="f_addr1">주소</label>
            <input type="text" name="addr1" id="f_addr1"  class="form-control" maxlength="5" minlength="5">
        </div>
        <div class="flex-grow-1">
            <label for="f_addr2">상세주소</label>
            <input type="text" name="addr2" id="f_addr2"  class="form-control" maxlength="5" minlength="5">
        </div>
    </div>

    <div class="mt-3 d-flex gap-3 justify-content-between">
        <div>
            <label for="f_photo" class="form-label">프로필 이미지</label>
            <input type="file" name="photo" id="f_photo" class="form-control">
        </div>
        <img src="" class="w-25" id="f_preview" alt="profile image">
    </div>

    <div class="mt-3 d-flex gap-2">
        <button type="button" class="btn btn-primary flex-grow-1" id="btn_submit">가입확인</button>
        <button type="button" class="btn btn-secondary flex-grow-1">가입취소</button>
    </div>
</form>
</main>
<?php include 'inc/footer.php'; ?>