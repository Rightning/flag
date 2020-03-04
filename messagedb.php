<?php
//データ操作用のクラス
class message {
  public $pdo;
  public function GetConnection() {
    try{
        #$pdo = new PDO('mysql:host = '+$DB_HOST+';dbname = '+$DB_NAME+';charset = '+ $DB_CHARSET+,'root','root');
        $this->$pdo = new PDO('mysql:host=localhost:8889/flagimge;dbname=flagimage;charset = utf8','root','root');//ここは環境に合わせて書き換える。
        $this->$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        //print 'get connection!!';
        //$pdo = null;
        //return $pdo;
      }catch(PDOException $Exception){
          die('エラー :' . $Exception->getMessage());
      }
    }



  public function insertMessage($message) {
    try{
      $this->GetConnection();
      $sql = "INSERT INTO message(message) VALUES (:message)";
      $stmh = $this->$pdo->prepare($sql);
      $stmh->bindValue(':message',$message,PDO::PARAM_STR);
      $stmh->execute();
      return "none";//エラーがない場合はnoneを返す
    }catch(PDOException $Exception){
      return $Exception->getMessage();
    }
  }

  public function getMessage() {
  //全くの未検証です
      try{
        $this->GetConnection();
        $sql = "SELECT * FROM message";
        $stmh = $this->$pdo->prepare($sql);
        $stmh->execute();
        $rows = $stmh->fetchAll(PDO::FETCH_ASSOC);
      }catch(PDOException $Exception){
          die($Exception->getMessage());
      }
      return $rows;
    }
}
?>
