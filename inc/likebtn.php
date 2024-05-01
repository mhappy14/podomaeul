<?php
// 좋아요 class
class Likebtn {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // 좋아요 클릭
    public function likeup($arr) {
        $sql = "INSERT INTO likebtn (pidx, id, create_at, ip) VALUES (
                :pidx, :id, NOW(), :ip)";
        $stmt = $this->conn->prepare($sql);
        $params = [ 
            "pidx" => $arr['pidx'], 
            "id" => $arr['id'], 
            "ip" => $_SERVER['REMOTE_ADDR']
        ];
        $stmt->execute($params);      

        // 좋아요수 1 증가
        $sql = "UPDATE board SET like_cnt=like_cnt+1 WHERE idx=:idx";
        $stmt = $this->conn->prepare($sql);
        $params = [ ":idx" => $arr['pidx']];
        $stmt->execute($params);
    }

    // 좋아요보기
    public function likecheck($id, $pidx) {
        $sql = "SELECT * FROM likebtn WHERE id=:id and pidx=:pidx";
        $stmt = $this->conn->prepare($sql);
        $stmt -> bindParam(':id',$id);
        $stmt -> bindParam(':pidx',$pidx);
        $stmt->execute();
        return $stmt->rowCount() ? true : false; 
    }

    // 좋아요 체크
    public function list($id, $pidx) {
        $sql = "SELECT * FROM likebtn WHERE id=:id and pidx=:pidx";
        $stmt = $this->conn->prepare($sql);
        $stmt -> bindParam(':id',$id);
        $stmt -> bindParam(':pidx',$pidx);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();
    }

    // 좋아요 취소
    public function likedn($pidx, $idx) {
        // 좋아요수 1 감소
        $sql = "UPDATE board SET like_cnt=like_cnt-1 WHERE idx=:pidx";
        $stmt = $this->conn->prepare($sql);
        $params = [":pidx" => $pidx];
        $stmt->execute($params);

        // 좋아요 취소
        $sql = "DELETE FROM likebtn WHERE idx=:idx";
        $stmt = $this->conn->prepare($sql);
        $params = [":idx" => $idx];
        $stmt->execute($params);
    }
}