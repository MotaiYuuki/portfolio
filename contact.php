<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<title>Contact form</title>
</head>
<body>
<style type="text/css">
button.button8{
-moz-border-radius:8px;
-webkit-border-radius:8px;
border-radius:8px;
}
input.textbox
{
  -moz-border-radius:6px;
  -webkit-border-radius:6px;
  border-radius:6px;
  width:300px;
}
TEXTAREA
{
  -moz-border-radius:6px;
  -webkit-border-radius:6px;
  border-radius:6px;
min-width: 300px;
max-width:400px;
min-height:200px;
max-height:300px;
}
</style>
<form action="send.php" method="post">
  Name:<br /><input type="text" class="textbox" name="name" placeholder="お名前"><br />

  Address:<br /><input type="text" class="textbox" name="address" placeholder="メールアドレス"><br />

    Inquiry:<br /><TEXTAREA placeholder="お問合せ内容" name="inquiry"></TEXTAREA><br />

  <button class="button8">送信</button>

</form>

<?php




?>

</body>
</html>
