<?php
//データ操作用のクラス
require './image.php';//flagクラスの読み込み
class database {
  public function GetConnection() {
    try{
        #$pdo = new PDO('mysql:host = '+$DB_HOST+';dbname = '+$DB_NAME+';charset = '+ $DB_CHARSET+,'root','root');
      $this->$pdo = new PDO('mysql:host=localhost:3306/seminar;dbname=seminar;charset = utf8','root','root');//ここは環境に合わせ
        $this->$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        //print 'get connection!!';
        //$pdo = null;
        //return $pdo;
      }catch(PDOException $Exception){
          die('エラー :' . $Exception->getMessage());
      }
    }



  public function insertImage($Image) {
    //画像データをテーブルに登録　返り値はエラーメッセージ
    //現在画像を複数枚登録したところでテーブルの更新が止まるバグあり
    //logを見るにmySQL側のエラーだが解決に至っていない
    try{
      $this->GetConnection();
      $sql = "INSERT INTO flag(country,extension,data) VALUES (:country,:extention,:data)";
      $stmh = $this->$pdo->prepare($sql);
      $stmh->bindValue(':country',$Image->country,PDO::PARAM_STR);
      $stmh->bindValue(':extention',$Image->extension,PDO::PARAM_STR);
      $stmh->bindValue(':data',$Image->data,PDO::PARAM_STR);
      $stmh->execute();
      return "none";//エラーがない場合はnoneを返す
    }catch(PDOException $Exception){
      return $Exception->getMessage();
    }
  }

  public function GetImageByCountry($country) {
  //全くの未検証です
      try{
        print "a";
        $this->GetConnection();
        $sql = "SELECT * FROM flag WHERE country = :country";
        $stmh = $this->$pdo->prepare($sql);
        $stmh->bindValue(':country',$country,PDO::PARAM_STR);
        $stmh->execute();
        $rows = $stmh->fetchAll(PDO::FETCH_ASSOC);
        print "g";
      }catch(PDOException $Exception){
          die($Exception->getMessage());
      }
      return $rows;
    }

    public function GetImage() {
	try{
          print "a";
          $this->GetConnection();
          $sql = "SELECT * FROM flag ";
          $stmh = $this->$pdo->prepare($sql);
          $stmh->execute();
          $rows = $stmh->fetchAll(PDO::FETCH_ASSOC);
          print "g";
        }catch(PDOException $Exception){
            die($Exception->getMessage());
        }
        return $rows;
   }
}
?>
