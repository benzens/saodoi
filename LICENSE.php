<?php session_start();
$name = $_SESSION['name'];
$saodoi = $_POST['saodoi'];
$cachdoi = $_POST['cachdoi'];
$idgame = $_POST['idgame'];
if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["cod"]==$_POST["captcha"])
{
 if($cachdoi == "1")
 {
 include_once('sql.php');
 $check=mysql_query("SELECT * FROM user WHERE name='$name'");
   while($tt=mysql_fetch_assoc($check))
   {
     if($saodoi <= $tien)
     {
      $tien = $tt['tien'] - $saodoi;
      $them = mysql_query("UPDATE user SET tien='$tien' WHERE name='$name'");
     }
     else
     {
     echo "<script type='text/javascript'>showAlert('Ta&#768;i Khoa&#777;n $name Kh&#244;ng &#272;u&#777; $saodoi Sao &#272;&#234;&#777; Quy &#272;&#244;&#777;i!');</script>";
     }
   }
 mysql_close();
 $host2="mysql.hostinger.vn";
 $username2="u681216726_user";
 $password2="hoangpro";
 $db_name2="u681216726_data";
 mysql_connect("$host2", "$username2", "$password2")or die("Sever Tam Thoi Bao Tri...Quay Lai Sau It Phut");
 mysql_select_db("$db_name2")or die("Sever Tam Thoi Bao Tri...Quay Lai Sau 5 Phut");
 $check2=mysql_query("SELECT * FROM user_money WHERE name='$idgame'");
   while($tt2=mysql_fetch_assoc($check2)
    {
    $tiennhan = $tt2['tien'] + $saodoi;
    $them2 = mysql_query("UPDATE user_money SET tien='$tiennhan' WHERE name='$idgame'");
    }
   if($them && $them2)
    {
    echo "<script type='text/javascript'>showAlert('&#272;&#244;&#777;i Tha&#768;nh C&#244;ng $saodoi Sao T&#432;&#768; TK $name Sang TK $idgame Game VuaDotKich!','talok');</script>";
    }
   else
    {
    echo "<script type='text/javascript'>showAlert('L&#244;&#771;i Kh&#244;ng Xa&#769;c &#272;i&#803;nh,Th&#432;&#777; La&#803;i Sau!');</script>";
    }
 mysql_close();
 }
}
else
{
echo "<script type='text/javascript'>showAlert('Ma&#771; Xa&#769;c Nh&#226;&#803;n Kh&#244;ng Chi&#769;nh Xa&#769;c!');</script>";
}
?>
