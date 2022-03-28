<?php  

    $file = fopen("filetoread.txt", "r");
    $txt = fread($file, "16");
    fclose($file);

?>

<!DOCTYPE html>
<html lang="en-US">
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>3 PHP Pages</title>
   </head>

  <body>
    <header>

        <p id="title"> PHP PAGE : READ FILE</p> 
        <p id="title"> MESSAGE IN THE FILE : <?= $txt; ?></p> 
       
    </header>
    
  </body>
</html>