<?php
//1. POSTデータ取得

$name = $_POST["name"];
$url= $_POST["url"];
$naiyou= $_POST["naiyou"];

if(isset($_FILES["image1"])){
  $img=file_get_contents($_FILES["image1"]["tmp_name"]);
}
//ポストされた画像を$img変数に入れる

//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db41;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, name, url, naiyou,
indate,image1 )VALUES(NULL, :name, :url, :naiyou, sysdate(),:img)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php");
  exit;

}

if(isset($_FILES["image1"])){
  $img=file_get_contents($_FILES["image1"]["tmp_name"]);

  $pdo = new PDO($dsn, $user,$password);
  $sql="INSERT INTO tbl(img) VALUES(?)";
  $stmt = $pdo->prepare( $sql);
  $stmt->execute([$img]);
}
?>
