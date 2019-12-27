<?php
require_once("util.php");

session_start();

// if (!isset($_POST['name'])){
//     $_SESSION['name'] = $_POST['name'];
//     header('Location: input.php');
// 	exit();
//   }

// 入力画面を正しく入力せず、つまりurlを直接読み込まれた場合
if(!isset($_SESSION['join'])){
	header('Location: input.php');
	exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>会員登録</title>

	<link rel="stylesheet" href="../style.css" />
</head>
<body>
<div id="wrap">
<div id="head">
<h1>会員登録</h1>
</div>

<div id="content">
<p>記入した内容を確認して、「登録する」ボタンをクリックしてください</p>
<form action="" method="post">
<!-- データ送信をしているのをpostの値で確認できないので、隠し要素のhiddenで取得 -->
<!-- 確認画面でも登録ボタンをクリックした確認できるようになる -->
	<input type="hidden" name="action" value="submit" />
	<dl>
		<dt>ニックネーム</dt>
		<dd>
		<?php print(es($_SESSION['join']['name'])); ?>
        </dd>
		<dt>メールアドレス</dt>
		<dd>
		<?php print(es($_SESSION['join']['email'])); ?>
        </dd>
		<dt>パスワード</dt>
		<dd>
		【表示されません】
		</dd>
		<dt>写真など</dt>
		<dd>
		<!-- 画像のチェックを表示 -->
		<?php if($_SESSION['join']['image']!==''): ?>
		<img src="../member_picture/<?php print(es($_SESSION['join']['image'])); ?>">
		<?php endif; ?>
		</dd>
	</dl>
	<div><a href="input.php?action=rewrite">&laquo;&nbsp;書き直す</a> | <input type="submit" value="登録する" /></div>
</form>
</div>

</div>
</body>
</html>


