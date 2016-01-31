<?php
include("../connectToDb.php");
require('../phpmailer/PHPMailerAutoload.php');

$style = $_POST['style'];
$chBox1 = $_POST['cBox1'];
$chBox2 = $_POST['cBox2'];
$chBox3 = $_POST['cBox3'];
$fio = $_POST['fio'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$delivery = $_POST['delivery'];
$wishes = $_POST['wishes'];
$buttonOrder = $_POST['order'];
$format = "";
$answered = false;

$mailEmail = htmlspecialchars($_REQUEST['email']);
$mailName = htmlspecialchars($_REQUEST['fio']);
$mailComment = htmlspecialchars($_REQUEST['wishes']);
$mailPhone = htmlspecialchars($_REQUEST['phone']);
$mailCity = htmlspecialchars($_REQUEST['city']);
$mailDelivery = htmlspecialchars($_REQUEST['delivery']);
$message = "<b>Заказ:  <b>".$mailName.' <br></br> <b>
Его почта: '.$mailEmail.'
<br>Телефон: '.$mailPhone.'
<br>Город: '.$mailCity.'
<br>Способ доставки: '.$mailDelivery.'
<br>Пожелания: '.$mailComment.'<br>
<a href= http://pashebor.rurs.net/mozaika/answerController.php>Ссылка на контроллер </a>';

if(isset($buttonOrder)){
    if(isset($chBox1)){

    $format = "A3, 30x40";
    $queryOrder = mysql_query("insert into orders(style, format, fio, email, phone, city, delivery, answered, wishes) values ('$style', '$format',
    '$fio', '$email', '$phone', '$city', '$delivery','$answered' ,'$wishes')");

        $mailer = new PHPMailer;

        $mailer->isSMTP();

        $mailer->Host = 'smtp.mail.ru';
        $mailer->SMTPAuth = true;
        $mailer->Username = 'milena.studio@mail.ru';//Логин
        $mailer->Password =  '3vc4erdf';//пароль
        $mailer->SMTPSecure = 'ssl';
        $mailer->Port = '465';
        $mailer->CharSet = 'UTF-8';



        $mailer->From = 'milena.studio@mail.ru';
        $mailer->FromName = 'Milena Studio';
        $mailer->addAddress('pashebor@gmail.com', 'Milena Studio');
        $mailer->addAddress('milena.studio@mail.ru', 'Milena Studio');
        $mailer->isHtml(true);
        $mailer->Subject = 'Комментарий';
        $mailer->Body = $message;

    if($queryOrder && $mailer->send()){
        echo("<!DOCTYPE html>
<html>
<meta http-equiv='Content-Type' content='text/html;charset=UTF-8' />
<meta name='viewport' content='width=device-width, initial-scale=0.4'/>
<head>
    <title>Milena Studio</title>
    <link rel='shortcut icon' href='img/iconLogo.png' />



    <link rel='stylesheet' href='../css/text.css'>
    <link rel='stylesheet' href='../css/delivery.css'>
    <link rel='stylesheet' href='../css/skeleton.css'>
    <link rel='stylesheet' href='../css/start.css'>
    <link rel='stylesheet' href='../css/hover.css'>
    <link rel='stylesheet' href='../css/normalize.css'>
    <link rel='stylesheet' href='../css/slicknav.css'>
    <link rel='stylesheet' href='../css/animations.css'>
    <link rel='shortcut icon' href='../img/iconLogo.png'>

    <style>
        body{

            background-color: #000000;
        }
        input:focus{
            outline: none;
        }

        @font-face {
            font-family: Archive;
            src: url(../fonts/ArchiveRegular.ttf);
        }

        @font-face {
            font-family: Magistral;
            src: url(../fonts/MagistralC.otf);
        }


        a{
            color: #000000;
            text-decoration: none;
        }
    </style>
</head>

<body>
 <div class='container'>

    <div class='row'>
      <div class='twelve columns boxList' style='margin-top: 250px' align='center'>
        <a href='../orders'> <img src='close.png' width='48px' class='rotateClose' style='margin-top: -35px; margin-left: 98% '
             onmouseover='this.src='close2.png''
             onmouseout='this.src='close.png''/></a>
        <p style='font-family: Archive; font-size: 20pt; color: #F9C857; text-align: center; margin-top: -15px' class='floating'>Отзыв отправлен</p>


        <p style='font-family: Magistral; font-size: 16pt; color: #000000 '>Большое спасибо заказ, мы с вами свяжемся в течении двух часов.</p>

       </div>

    </div>

 </div>

</body>
</html>");
      }
    }
    if(isset($chBox2)){
        $format = "A2, 40x55";
        $queryOrder = mysql_query("insert into orders(style, format, fio, email, phone, city, delivery, answered, wishes) values ('$style', '$format',
        '$fio', '$email', '$phone', '$city', '$delivery', '$answered','$wishes')");

        $mailer = new PHPMailer;

        $mailer->isSMTP();

        $mailer->Host = 'smtp.mail.ru';
        $mailer->SMTPAuth = true;
        $mailer->Username = 'milena.studio@mail.ru';//Логин
        $mailer->Password =  '3vc4erdf';//пароль
        $mailer->SMTPSecure = 'ssl';
        $mailer->Port = '465';
        $mailer->CharSet = 'UTF-8';



        $mailer->From = 'milena.studio@mail.ru';
        $mailer->FromName = 'Milena Studio';
        $mailer->addAddress('pashebor@gmail.com', 'Milena Studio');
        $mailer->addAddress('milena.studio@mail.ru', 'Milena Studio');
        $mailer->isHtml(true);
        $mailer->Subject = 'Комментарий';
        $mailer->Body = $message;

        if($queryOrder && $mailer->send()){
            echo("<!DOCTYPE html>
<html>
<meta http-equiv='Content-Type' content='text/html;charset=UTF-8' />
<meta name='viewport' content='width=device-width, initial-scale=0.4'/>
<head>
    <title>Milena Studio</title>
    <link rel='shortcut icon' href='img/iconLogo.png' />



    <link rel='stylesheet' href='../css/text.css'>
    <link rel='stylesheet' href='../css/delivery.css'>
    <link rel='stylesheet' href='../css/skeleton.css'>
    <link rel='stylesheet' href='../css/start.css'>
    <link rel='stylesheet' href='../css/hover.css'>
    <link rel='stylesheet' href='../css/normalize.css'>
    <link rel='stylesheet' href='../css/slicknav.css'>
    <link rel='stylesheet' href='../css/animations.css'>
    <link rel='shortcut icon' href='../img/iconLogo.png'>

    <style>
        body{

            background-color: #000000;
        }
        input:focus{
            outline: none;
        }

        @font-face {
            font-family: Archive;
            src: url(../fonts/ArchiveRegular.ttf);
        }

        @font-face {
            font-family: Magistral;
            src: url(../fonts/MagistralC.otf);
        }


        a{
            color: #000000;
            text-decoration: none;
        }
    </style>
</head>

<body>
 <div class='container'>

    <div class='row'>
      <div class='twelve columns boxList' style='margin-top: 250px' align='center'>
        <a href='../orders'> <img src='close.png' width='48px' class='rotateClose' style='margin-top: -35px; margin-left: 98% '
             onmouseover='this.src='close2.png''
             onmouseout='this.src='close.png''/></a>
        <p style='font-family: Archive; font-size: 20pt; color: #F9C857; text-align: center; margin-top: -15px' class='floating'>Отзыв отправлен</p>


        <p style='font-family: Magistral; font-size: 16pt; color: #000000 '>Большое спасибо заказ, мы с вами свяжемся в течении двух часов.</p>

       </div>

    </div>

 </div>

</body>
</html>");
        }
    }
    if(isset($chBox3)){
        $format = "A1, 50x75";
        $queryOrder = mysql_query("insert into orders(style, format, fio, email, phone, city, delivery, answered , wishes) values ('$style', '$format',
        '$fio', '$email', '$phone', '$city', '$delivery', '$answered','$wishes')");

        $mailer = new PHPMailer;

        $mailer->isSMTP();

        $mailer->Host = 'smtp.mail.ru';
        $mailer->SMTPAuth = true;
        $mailer->Username = 'milena.studio@mail.ru';//Логин
        $mailer->Password =  '3vc4erdf';//пароль
        $mailer->SMTPSecure = 'ssl';
        $mailer->Port = '465';
        $mailer->CharSet = 'UTF-8';



        $mailer->From = 'milena.studio@mail.ru';
        $mailer->FromName = 'Milena Studio';
        $mailer->addAddress('pashebor@gmail.com', 'Milena Studio');
        $mailer->addAddress('milena.studio@mail.ru', 'Milena Studio');
        $mailer->isHtml(true);
        $mailer->Subject = 'Комментарий';
        $mailer->Body = $message;

        if($queryOrder && $mailer->send()){
            echo("<!DOCTYPE html>
<html>
<meta http-equiv='Content-Type' content='text/html;charset=UTF-8' />
<meta name='viewport' content='width=device-width, initial-scale=0.4'/>
<head>
    <title>Milena Studio</title>
    <link rel='shortcut icon' href='img/iconLogo.png' />



    <link rel='stylesheet' href='../css/text.css'>
    <link rel='stylesheet' href='../css/delivery.css'>
    <link rel='stylesheet' href='../css/skeleton.css'>
    <link rel='stylesheet' href='../css/start.css'>
    <link rel='stylesheet' href='../css/hover.css'>
    <link rel='stylesheet' href='../css/normalize.css'>
    <link rel='stylesheet' href='../css/slicknav.css'>
    <link rel='stylesheet' href='../css/animations.css'>
    <link rel='shortcut icon' href='../img/iconLogo.png'>

    <style>
        body{

            background-color: #000000;
        }
        input:focus{
            outline: none;
        }

        @font-face {
            font-family: Archive;
            src: url(../fonts/ArchiveRegular.ttf);
        }

        @font-face {
            font-family: Magistral;
            src: url(../fonts/MagistralC.otf);
        }


        a{
            color: #000000;
            text-decoration: none;
        }
    </style>
</head>

<body>
 <div class='container'>

    <div class='row'>
      <div class='twelve columns boxList' style='margin-top: 250px' align='center'>
        <a href='../orders'> <img src='close.png' width='48px' class='rotateClose' style='margin-top: -35px; margin-left: 98% '
             onmouseover='this.src='close2.png''
             onmouseout='this.src='close.png''/></a>
        <p style='font-family: Archive; font-size: 20pt; color: #F9C857; text-align: center; margin-top: -15px' class='floating'>Отзыв отправлен</p>


        <p style='font-family: Magistral; font-size: 16pt; color: #000000 '>Большое спасибо заказ, мы с вами свяжемся в течении двух часов.</p>

       </div>

    </div>

 </div>

</body>
</html>");
        }
    }

}else{
    echo("status: error");
    exit;
}
mysql_close($connection);