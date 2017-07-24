<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
      $name=$_POST["name"];
      $address=$_POST["address"];
      $inquiry=$_POST["inquiry"];
  }
  if(isset($_POST["submit"]))
  {
    mb_language("ja");
    mb_internal_encoding("UTF-8");
  }
  if(isset($_POST["submit"])){
    mb_language("ja");
    mb_internal_encoding("UTF-8");
$subject="[自動返信]お問い合わせ内容の確認";
$body=<<<EOM

{$name}様
お問い合わせありがとうございます。
以下のお問い合わせ内容の確認メールをお送りしました。
===============================================
【お名前】
{$name}
【内容】
{$inquiry}
===============================================
内容を確認の上回答させていただきますので、
しばらくお待ちください。

EOM;

$fromEmail="example.com";//送信元のメールアドレス変換?
$fromName="お問い合わせテスト";//送信元の名前を変換
$header="From:".mb_encode_mimeheader($fromName)."<{$fromEmail}>";

mb_send_mail($address,$subject,$body,$header);

header("Location:send_done.php");
exit;
}


?>
<style type="text/css">
input,button{
  -moz-border-radius:6px;
  -webkit-border-radius:6px;
  border-radius:6px;
}
</style>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ContactForm</title>
</head>
<body>

<div><h1>CompanyName</h1></div>
<!-- <div><h2>お問い合わせ</h2></div> -->
<form action="send_done.php" method="post">
<input type="hidden" name="name" value="<?php echo $name; ?>">
<input type="hidden" name="address" value="<?php echo $address?>">
<input type="hidden" name="inquiry" value="<?php echo $inquiry; ?>">
<h1 class="contact-title">お問い合わせ内容確認</h1>
<p>お問い合わせ内容はこちらでよろしいでしょうか？<br>
よろしければ送信ボタンを押してください。</p>


<div>
        <div>
          <label>お名前</label>
          <p><?php echo $name; ?></p>
        </div>
        <div>
          <label>メールアドレス</label>
          <p><?php echo $address?></p>
        </div>
        <div>
          <label>内容</label>
          <p><?php echo nl2br($inquiry); ?></p><!--  ? -->
        </div>
</div>
<input type="button" value="修正" onclick="history.back(-1)">
<button type="submit" name="submit">送信</button>



</form>
</body>
</html>
