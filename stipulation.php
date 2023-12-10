<?php 
  $js_array = [ 'js/member.js' ];
  $title = '약관';
  include 'inc/header.php';
 
?>
  <main class="p-5 border rounded-4">
      <h1 class="text-center mt-2">회원약관 및 개인정보 취급방침 동의</h1>
      <h4 class="mt-3">회원약관</h4>
      <textarea name="" id="" cols="30" rows="10" class="form-control">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident vel fugit dicta veritatis! Fugit beatae nemo excepturi alias. Molestiae doloribus perspiciatis nostrum modi, commodi repellendus labore dicta facere sunt reiciendis quia! Perferendis incidunt quis eius possimus, neque totam velit molestiae cum amet, ipsa atque autem iure tempora sint reiciendis. Blanditiis quod est, odit cum atque amet dolore aut fuga harum at deleniti? Architecto recusandae doloremque, mollitia illo expedita alias incidunt maiores quidem vitae, sint aspernatur esse odit dolores, quibusdam totam excepturi consectetur voluptates optio suscipit repudiandae ipsum repellat laborum. Praesentium illum et alias voluptate, repellat recusandae magni distinctio placeat quam voluptatibus culpa optio ab delectus eos adipisci sequi ea ducimus atque debitis nam laudantium quidem vel. Blanditiis obcaecati explicabo animi laboriosam, in similique pariatur iste quidem neque eligendi itaque aut nam quas at, unde veritatis atque sed molestias quod ad ratione et. Nobis delectus quaerat aliquid quos, veniam consequatur ad facilis dolor inventore nemo officia! Aperiam itaque ducimus a incidunt et cupiditate eaque quia fugiat quibusdam temporibus debitis praesentium odit, deserunt quaerat asperiores soluta voluptates culpa dolorum ab. Possimus beatae, vel officia praesentium qui eveniet molestias deleniti? Explicabo nemo, maiores doloremque animi vitae, asperiores quae tempore culpa totam sint beatae. Temporibus quaerat voluptas neque tenetur sequi error optio labore repudiandae velit natus veritatis ex pariatur similique soluta unde iste laborum incidunt eveniet esse dolorum, reprehenderit cumque! Excepturi tempora vero, aperiam repudiandae eaque deserunt nihil perspiciatis, placeat suscipit quibusdam voluptate debitis veritatis. Veritatis, autem! Dolorem repellendus provident tempore aspernatur maiores porro magnam optio sapiente facere quam corporis possimus, consectetur molestiae deserunt corrupti facilis ratione fugit harum quaerat omnis. Quidem dolores veniam eius est corporis iusto dolorem repellat in aliquam adipisci, pariatur ex expedita eos asperiores laudantium unde deleniti assumenda nihil. Voluptatibus, soluta doloremque provident iste ea exercitationem! Quam doloremque at ipsa!
      </textarea>

      <div class="form-check mt-2">
        <input class="form-check-input" type="checkbox" value="1" id="chk_member1">
        <label class="form-check-label" for="chk_member1">
          동의함
        </label>
      </div>
      
      <h4 class="mt-3">개인정보 취급방침</h4>
      <textarea name="" id="" cols="30" rows="10" class="form-control">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident vel fugit dicta veritatis! Fugit beatae nemo excepturi alias. Molestiae doloribus perspiciatis nostrum modi, commodi repellendus labore dicta facere sunt reiciendis quia! Perferendis incidunt quis eius possimus, neque totam velit molestiae cum amet, ipsa atque autem iure tempora sint reiciendis. Blanditiis quod est, odit cum atque amet dolore aut fuga harum at deleniti? Architecto recusandae doloremque, mollitia illo expedita alias incidunt maiores quidem vitae, sint aspernatur esse odit dolores, quibusdam totam excepturi consectetur voluptates optio suscipit repudiandae ipsum repellat laborum. Praesentium illum et alias voluptate, repellat recusandae magni distinctio placeat quam voluptatibus culpa optio ab delectus eos adipisci sequi ea ducimus atque debitis nam laudantium quidem vel. Blanditiis obcaecati explicabo animi laboriosam, in similique pariatur iste quidem neque eligendi itaque aut nam quas at, unde veritatis atque sed molestias quod ad ratione et. Nobis delectus quaerat aliquid quos, veniam consequatur ad facilis dolor inventore nemo officia! Aperiam itaque ducimus a incidunt et cupiditate eaque quia fugiat quibusdam temporibus debitis praesentium odit, deserunt quaerat asperiores soluta voluptates culpa dolorum ab. Possimus beatae, vel officia praesentium qui eveniet molestias deleniti? Explicabo nemo, maiores doloremque animi vitae, asperiores quae tempore culpa totam sint beatae. Temporibus quaerat voluptas neque tenetur sequi error optio labore repudiandae velit natus veritatis ex pariatur similique soluta unde iste laborum incidunt eveniet esse dolorum, reprehenderit cumque! Excepturi tempora vero, aperiam repudiandae eaque deserunt nihil perspiciatis, placeat suscipit quibusdam voluptate debitis veritatis. Veritatis, autem! Dolorem repellendus provident tempore aspernatur maiores porro magnam optio sapiente facere quam corporis possimus, consectetur molestiae deserunt corrupti facilis ratione fugit harum quaerat omnis. Quidem dolores veniam eius est corporis iusto dolorem repellat in aliquam adipisci, pariatur ex expedita eos asperiores laudantium unde deleniti assumenda nihil. Voluptatibus, soluta doloremque provident iste ea exercitationem! Quam doloremque at ipsa!
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