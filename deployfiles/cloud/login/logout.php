<?
  session_start();
  unset($_SESSION['userid']);
  unset($_SESSION['username']);
  unset($_SESSION['usernick']);
  unset($_SESSION['hp']);
  unset($_SESSION['e-mail']);
  unset($_SESSION['regist_day']);

  echo("<script>window.alert('잘가요~');
	location.href='../index.php';</script>");
?>
