<?php

// remember me exists  and user not loged in

if( !isset($_SESSION['user_id']) && !empty($_COOKIE['rememberme']) ) {

//F1 COOKIE :  $a . "," . bin2hex($b); F2 COOKIE : hash('sha256', $a);

// ARRAY KEY EXISTS $_session['USER_ID']

// extract authentificator1 and $authentificator2

list($authentificator1,$authentificator2)=explode(',',$_COOKIE['rememberme']);

$authentificator2 = hex2bin($authentificator2);

$f2authentificator2 = hash('sha256',$authentificator2);
// llok into remember name table
$sql = "SELECT *FROM remembername WHERE authentificator1='$authentificator1'";
$result = mysqli_query($link,$sql);
if(!$result){
  echo "<div class='alert alert-danger'>There was an error with the query</div>";
  exit;

}

$count= mysqli_num_rows($result);
if(!$count == 1){
  echo '<div class="alert alert-danger">Remember me process failed</div>';
  exit;
}

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

// look for f2authentificator2

if(!hash_equals($row['f2authentificator2'], $f2authentificator2)){

  echo '<div class="alert alert-danger">hash equals returns false</div>';


}else{

  // generate new authentificators and again store in remember me table

  //Create two variables $authentificator1 and $authentificator2
  $authentificator1 = bin2hex(openssl_random_pseudo_bytes(10));
  //2*2*...*2
  $authentificator2 = openssl_random_pseudo_bytes(20);
  //Store them in a cookie
  function f1($a, $b){
      $c = $a . "," . bin2hex($b);
      return $c;
  }
  $cookieValue = f1($authentificator1, $authentificator2);
  setcookie(
      "rememberme",
      $cookieValue,
      time() + 1296000
  );

  //Run query to store them in rememberme table
  function f2($a){
      $b = hash('sha256', $a);
      return $b;
  }
  $f2authentificator2 = f2($authentificator2);
  $user_id = $_SESSION['user_id'];
  $expiration = date('Y-m-d H:i:s', time() + 1296000);

  $sql = "INSERT INTO remembername
  (`authentificator1`, `f2authentificator2`, `user_id`, `expires`)
  VALUES
  ('$authentificator1', '$f2authentificator2', '$user_id', '$expiration')";
  $result = mysqli_query($link, $sql);
  if(!$result){
      echo  '<div class="alert alert-danger">There was an error storing data to remember you next time.</div>';
  }

  $_SESSION['user_id'] = $row['user_id'];

  header("Location:loginmainpage.php");


}


}
 ?>
