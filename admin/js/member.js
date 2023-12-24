document.addEventListener("DOMContentLoaded", () => {
    const btn_search = document.querySelector("#btn_search")
    btn_search.addEventListener("click", () => {
        const sf = document.querySelector("#sf")
            if(sf.value == '') {
                alert('검색어 비어있음')
                sf.focus()
                return false
            }

        const sn = document.querySelector("#sn")

        self.location.href='./member.php?sn=' + sn.value + '&sf=' + sf.value;
    })

    //전체보기
    const btn_all = document.querySelector("#btn_all")
    btn_all.addEventListener("click", () => {
        self.location.href = "./member.php";
    })

    //엑셀 저장
    const btn_excel = document.querySelector("#btn_excel")
    btn_excel.addEventListener("click", () => {
        self.location.href='./user2excel.php'
    })

    // 수정 버튼 
    const btn_mem_edit = document.querySelectorAll(".btn_mem_edit") 
    btn_mem_edit.forEach( (box) => {
        box.addEventListener("click", () => {
            const idx = box.dataset.idx
            self.location.href='./member_edit.php?idx=' + idx
        })
    })

    // 삭제 버튼
    const btn_mem_deletes = document.querySelectorAll(".btn_mem_delete") //클래스는 . 아이디는 #
    btn_mem_deletes.forEach( (box) => {
      box.addEventListener("click", () => {
        if(confirm('이 회원을 삭제하시겠습니까?')) {
  
            //회원의 idx불러오는 방법
            const idx = box.dataset.idx
            const xhr = new XMLHttpRequest()
  
            const f = new FormData()  //받아온 idx 변수에 저장
            f.append("idx", idx) 
  
            xhr.open("POST", "./member_del.php", "true") //받아온 idx를 member_del.php로 전송해서 삭제
            xhr.send(f)
  
            xhr.onload = () => {
                if(xhr.status == 200) {
                    const data = JSON.parse(xhr.responseText)
                    if(data.result == 'success') {
                        self.location.reload() //삭제한 것을 반영한 페이지를 보여주기 위해 추가
                    }
                } else {
                    alert('통신실패')
                }
            }
        } else {
            alert('삭제취소')
        }
      })
    })
  
})