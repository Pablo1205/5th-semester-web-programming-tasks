<?php  

    $message = "Welcome"; 
    $str = str_pad($message,20,".:",STR_PAD_BOTH);
    $str2 = str_pad($message,20,".",STR_PAD_LEFT);
    $str3 = str_pad($message,20,":",STR_PAD_RIGHT);

?>

<!DOCTYPE html>
<html lang="en-US">
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>3 PHP Pages</title>
   </head>

  <body>
    <header>

        <p id="title"> PHP PAGE : STR PADDING</p> <br>
        <p id="message"> STR PADDING MIDDLE : <?= $str; ?> </p> <br>
        <p id="message2"> STR PADDING RIGHT : <?= $str2; ?> </p> <br>
        <p id="message3"> STR PADDING LEFT : <?= $str3; ?> </p> <br>
       


    </header>
    
  </body>
</html>