document.addEventListener("DOMContentLoaded", () => {

    //이메일 중복확인
    const btn_email_check = document.querySelector("#btn_email_check")
    
    btn_email_check.addEventListener("click", () => {
        const f_email = document.querySelector("#f_email")
        if(f_email.value == '') {
            alert('이메일를 입력하세요')
            return false
        }

        if(document.input_form.old_email.value == f_email.value) {
            alert('동일한 이메일')
            return false
        }

        //AJAX
        const f1 = new FormData()
        f1.append('email',f_email.value)
        f1.append('mode','email_chk')

        const xhr = new XMLHttpRequest()
        xhr.open("POST", "./pg/member_process.php", "true")
        xhr.send(f1)

        xhr.onload = () => {
            if(xhr.status == 200) {
                const data = JSON.parse(xhr.responseText)
                if(data.result == 'success') {
                    alert('사용 가능');
                    document.input_form.email_chk.value = "1"
                } else if (data.result == 'fail') {
                    document.input_form.email_chk.value = "0"
                    alert('사용 중인 이메일');
                    f_email.value = ''
                    f_email.focus()
                } else if(data.result == 'empty_email') {
                    alert('이메일 미입력')
                    f_email.focus()
                } else if(data.result =='email_format_wrong') {
                    alert('이메일 형식이 올바르지 않습니다')
                    f_email.value = ''
                    f_email.focus();
                }
            }
        }
    })

    //가입버튼 클릭 후
    const btn_submit = document.querySelector("#btn_submit")
    btn_submit.addEventListener("click",() => {
        const f = document.input_form  //form태크 안으로 범위 한정
        //비번 확인
        if (f.password.value != '' && f.password2.value == '') {
            alert('비밀번호 확인 입력바람')
            f.password2.focus()
            return false
        }
        //비번 일치 확인
        if (f.password.value != f.password2.value) {
            alert('비밀번호 불일치')
            f.password.value = ''
            f.password2.value = ''
            f.password.focus()
            return false
        }
        //이름 입력여부 확인
        if (f.name.value == '') {
            alert('이름(닉네임) 입력바람')
            f.name.focus()
            return false
        }
        //이메일 입력여부 확인
        if (f.email.value == '') {
            alert('이메일 입력 바람')
            f.email.focus()
            return false
        }
        //이메일 중복여부 체크 확인
        if(f.old_email.value != f.email.value) {
            if (f.email_chk.value == 0) {
                alert('이메일 중복확인 바람')
                return false
            }
        }
        //우편번호 입력여부 확인
        if (f.zipcode.value == '') {
            alert('우편번호 입력 바람')
            return false
        }
        //주소 입력여부 확인
        if (f.addr1.value == '') {
            alert('주소 입력 바람')
            f.addr1.focus()
            return false
        }
        //상세주소 입력여부 확인
        if (f.addr2.value == '') {
            alert('상세주소 입력 바람')
            f.addr2.focus()
            return false
        }

        f.submit()
    })

    //우편번호
    const btn_zipcode = document.querySelector("#btn_zipcode")
    btn_zipcode.addEventListener("click", () => {
        new daum.Postcode({
            oncomplete: function(data) {
                let addr = ''
                let extra_addr = ''

                if(data.userSelectedType == 'J') {
                    addr = data.jibunAddress
                } else if (data.userSelectedType == 'R') {
                    addr = data.roadAddress
                }

                if(data.bname != '') {
                    extra_addr = data.bname
                }

                if(data.buildingName != '') {
                    if(extra_addr == '') {
                        extra_addr = data.buildingName
                    } else {
                        extra_addr += ', ' + data.buildingName
                    }
                }

                if(extra_addr != '') {
                    extra_addr = ' (' + extra_addr + ')'
                }

                const f_addr1 = document.querySelector("#f_addr1")
                f_addr1.value = addr + extra_addr

                const f_zipcode = document.querySelector("#f_zipcode")
                f_zipcode.value = data.zonecode

                const f_addr2 = document.querySelector("#f_addr2")
                f_addr2.focus()
            }
        }).open();
    })

    const f_photo = document.querySelector("#f_photo") //아이디는 #태그 붙임
    f_photo.addEventListener("change", (e) => {
        const reader = new FileReader()
        reader.readAsDataURL(e.target.files[0])
        reader.onload = function(event) {
            // const img = document.createElement("img")
            // img.setAttribute("src", event.target.result)
            // document.querySelector("#f_preview").appendChild(img)
            const f_preview = document.querySelector("#f_preview")
            f_preview.setAttribute("src", event.target.result)
        }
    })

})