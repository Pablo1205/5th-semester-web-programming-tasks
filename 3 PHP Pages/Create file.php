<?php  

    $file = fopen("newfile.txt", "w") or die("Unable to open file");
    $txt = "My name is Pablo Sanchez\n";
    fwrite($file, $txt);
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

        <p id="title"> PHP PAGE : CREATE FILE</p> 
        <p id="title"> Please come back to your local host folder and refresh it.</p> 
       


    </header>
    
  </body>
</html>