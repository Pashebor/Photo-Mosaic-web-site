<?php
include('../connectToDb.php');
require('../phpmailer/PHPMailerAutoload.php');

$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$answered = false;
$btn = $_POST['send'];

$mailEmail = htmlspecialchars($_REQUEST['email']);
$mailName = htmlspecialchars($_REQUEST['name']);
$mailComment = htmlspecialchars($_REQUEST['comment']);
$message = "<b>Комментарий:  <b>".$mailName.' <br></br> <b>
Его почта: '.$mailEmail.'
<br>Комментарий: '.$mailComment.'<br>
<a href= http://pashebor.rurs.net/mozaika/answerController.php>Ссылка на контроллер </a>';



if(isset($btn)){

 $query = mysql_query("insert into questions(name, email, answered, question) values ('$name', '$email', '$answered', '$comment')");

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

    if($query && $mailer->send()){
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
        <a href='../reviews'> <img src='close.png' width='48px' class='rotateClose' style='margin-top: -35px; margin-left: 98% '
             onmouseover='this.src='close2.png''
             onmouseout='this.src='close.png''/></a>
        <p style='font-family: Archive; font-size: 20pt; color: #F9C857; text-align: center; margin-top: -15px' class='floating'>Отзыв отправлен</p>


        <p style='font-family: Magistral; font-size: 16pt; color: #000000 '>Большое спасибо за ваш отзыв, он будет опубликован на сайте после проверки администратова в ближайшее время.</p>

       </div>

    </div>

 </div>

</body>
</html>");
    }
    exit;
}else{
    echo("'status':'error'");
    exit;
}