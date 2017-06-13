<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:20px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php" enctype="multipart/form-data">
  <div class="jumbotron">
   <fieldset>
    <legend>オススメの書籍!!</legend>
     <label>書籍名：<input type="text" name="name"></label><br>
     <label>url：<input type="url" name="url"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>

<!--      <form action="insert.php" method="post" > -->
	<label for="upload">画像のアップロード</label>
	<input type="file" name="image1" id="upload"/><br />
<!-- </form> -->
<br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>


<!-- 送信ボタンが押されたら、入力を受け取りデータベースに画像を送る-->

<!-- Main[End] -->

</body>
</html>
