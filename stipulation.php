<?php 
  $js_array = [ 'js/member.js' ];
  $title = '약관';
  $menu_code = 'stipulation';
  include 'inc/header.php';
 
?>
  <main class="p-5 border rounded-4">
      <h1 class="text-center mt-2">회원약관 및 개인정보 취급방침 동의</h1>
      <h4 class="mt-3">회원약관</h4>
      <textarea name="" id="" cols="30" rows="10" class="form-control">
        <?php include './s1.php'; ?>
      </textarea>

      <div class="form-check mt-2">
        <input class="form-check-input" type="checkbox" value="1" id="chk_member1">
        <label class="form-check-label" for="chk_member1">
          동의함
        </label>
      </div>
      
      <h4 class="mt-3">개인정보 취급방침</h4>
      <textarea name="" id="" cols="30" rows="10" class="form-control">
        <?php include './s2.php'; ?>
      </textarea>

      <div class="form-check mt-2">
        <input class="form-check-input" type="checkbox" value="1" id="chk_member2">
        <label class="form-check-label" for="chk_member2">
          동의함
        </label>
      </div>
      
      <div class="mt-4 d-flex justify-content-center gap-3">
        <button class="btn btn-primary w-50" id="btn_member">회원가입</button>
        <button class="btn btn-secondary w-50">가입취소</button>
      </div>

      <form method="post" name="stipulation_form" action="member_input.php" style="display:none">
      <input type="hidden" name="chk" value="0">

      </form>
      
  </main>
<?php include 'inc/footer.php'; ?>