document.addEventListener("DOMContentLoaded", () => {
    const btn_member = document.querySelector("#btn_member")

    btn_member.addEventListener("click", () => {
        const chk_member1 = document.querySelector("#chk_member1") // #class면 .을 넣고 id면 #
        if(chk_member1.checked !== true){
            alert("회원약관에 동의해야만 가입이 가능합니다.")
            return false
        }

        const chk_member2 = document.querySelector("#chk_member2")
        if(chk_member2.checked !== true){
            alert("개인정보 취급방침에 동의해야만 가입이 가능합니다.")
            return false
        }

        const f = document.stipulation_form
        f.chk.value = 1
        f.submit()
        self.location.href='./member_input.php'
    })

})