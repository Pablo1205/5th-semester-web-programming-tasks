<?php

    $password = "";
    $definitive_password = "";

    $numbers=array(0,1,2,3,4,5,6,7,8,9);
    $spechar=array("&","#","{","}","(","[","]",")","-","|","`","_","@","=","+","£","$","%","µ","*","?",".",";",":","/","§","!",",");

    $content = <<<_END

    <form action="define_password.php" method="post">
        
        <pre>         

        Create a password : <input type="password" name="password" id="password" placeholder="Enter your new password" value=$password><br>  
        <p> Your password must contain : 
         - 8 characters   
         - at least 1 upper case character 
         - at least 1 lower case character  
         - at least 1 number  
         - at least 1 special character      

        <button type="submit" id="button" ><b>SUBMIT PASSWORD </b></button>

        </pre>

    </form>

    _END; 
    
    echo $content;


    //FCT TO CHECK THAT A PASWORD IS VALID 
    function checkValidity($password,$numbers,$spechar) : int {

        $k=0; //var to return password validity 

        //check if a password, empty or not, as already been submitted
        if (isset($_POST['password'])) {

            //check there is a password 
            if (strlen($_POST['password']) === 0 )  {  
                echo "- Your need a password <br><br>";
                $k++;
            } 

            //check password lenght
            if (strlen($_POST['password']) < 8 )  {  
                echo "- Your password is not long enough <br><br>";
                $k++;
            } 


            //check that there is at least one upper case letter
            if (preg_match("/[A-Z]/",$_POST['password'])===0){
                echo "- Your password needs at least one upper case letter <br><br>";
                $k++;
            }

            //check that there is at least one lower case letter
            if (preg_match("/[a-z]/",$_POST['password'])===0){
                echo "- Your password needs at least one lower case letter <br><br>";
                $k++;
            }


            //check that there is at least one number
            $j=0;
            for ($i = 0; $i < 10; $i++){
                if (strpos($_POST['password'], $numbers[$i]) !== false){
                    $j++;
                }
            }
            if ($j===0){
                echo "- Your password needs at least one number <br><br>";
                $k++;
            }

            //check that there is at least one special character
            $j=0;
            for ($i = 0; $i < count($spechar); $i++){
                if (strpos($_POST['password'], $spechar[$i]) !== false){
                    $j++;
                }
            }
            if ($j===0){
                echo "- Your password needs at least one special character <br><br>";
                $k++;
            }

            //displays the password
            //echo "<br> Password = ".$_POST['password'];


        } 
        //for when the user hasnt submitted anything yet 
        else {
            $k=1;        
        }
        
        return $k;
    }


    $bool=checkValidity($password,$numbers,$spechar);


    if ($bool==0){
        $definitive_password = $_POST['password'];
        //displays the definitive password
        //echo "<br> Definitive Password = ".$definitive_password;
    }

    if ($definitive_password!=""){
        //to go to the next page and send the definitive password variable
        session_start();
        $_SESSION['saved_password'] = $definitive_password;
        echo "<br><br>New Password Saved : "."<a href='../sign_in_password.php'>Click here to come back to Sign up page !</a>";

    } 

?>
