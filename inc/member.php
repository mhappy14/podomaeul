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

    //회원정보 입력
    public function input($marr) {
        $sql = "INSERT INTO users(id, password, name, email, zipcode, addr1, addr2, photo, create_at, ip) VALUES
                (:id, :password, :name, :email, :zipcode, :addr1, :addr2, :photo, NOW(), :ip)";
        $stmt = $this -> conn -> prepare($sql);
        $stmt -> bindParam(':id',$marr['id']);
        $stmt -> bindParam(':password',$marr['password']);
        $stmt -> bindParam(':name',$marr['name']);
        $stmt -> bindParam(':email',$marr['email']);
        $stmt -> bindParam(':zipcode',$marr['zipcode']);
        $stmt -> bindParam(':addr1',$marr['addr1']);
        $stmt -> bindParam(':addr2',$marr['addr2']);
        $stmt -> bindParam(':photo',$marr['photo']);
        $stmt -> bindParam(':ip',$_SERVER['REMODE_ADDR']);
        $stmt->execute();
    }

}
?>