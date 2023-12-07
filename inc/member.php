<?php
class Member {
    private $conn;

    public function __construct($db) {
        $this -> conn = $db;
    }

    //아이디 중복체크용 멤버 함수
    public function id_exists($id) {
        $sql = "SELECT * FROM users WHERE id=:id";
        $stmt = $this -> conn ->prepare($sql);
        $stmt -> bindParam(':id',$id);
        $stmt->execute();

        return $stmt->rowCount() ? true : false;
    }

    //이메일 중복확인
    public function email_exists($email) {
        $sql = "SELECT * FROM users WHERE email=:email";
        $stmt = $this -> conn ->prepare($sql);
        $stmt -> bindParam(':email',$email);
        $stmt->execute();

        return $stmt->rowCount() ? true : false;
    }
}

?>