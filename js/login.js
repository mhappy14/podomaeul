document.addEventListener("DOMContentLoaded", () => {
    const btn_login = document.querySelector("#btn_login")
    btn_login.addEventListener("click", () => {
        const f_id = document.querySelector("#f_id")
        if(f_id.value == '') {
            alert('아이디 입력바람')
            f_id.focus()
            return false
        }

        const f_pw = document.querySelector("#f_pw")
        if(f_pw.value == '') {
            alert('비밀번호 입력바람')
            f_pw.focus()
            return false
        }

        //ajax 방식 로그인
        const xhr = new XMLHttpRequest()
        xhr.open("POST", "../pg/login_process.php", "true")
        const f1 = new FormData()
        f1.append("id", f_id.value)
        f1.append("pw", f_pw.value)
        xhr.send(f1)
        xhr.onload = () => {
            if(xhr.status == 200) {
                const data = JSON.parse(xhr.responseText);
                if(data.result == 'login_fail') {
                    alert('없는 정보')
                    f_id.value = ''
                    f_pw.value = ''
                    f_id.focus()
                    return false
                } else if (data.result == 'login_success') {
                    alert('로그인 성공')
                    self.location.href='../index.php'
                }
            } else {
                alert('통신 실패.');
            }
        }
    })
})