<?php
    //to use var from another file 
    session_start();
    $saved_password =  $_SESSION["saved_password"];
    //echo $saved_password;


    $password = "";

    $content = <<<_END

    <form action="sign_in_password.php" method="post">
        
        <pre>         
        <p>  PLEASE LOGIN : </p>

        Password : <input type="password" name="password" id="password" placeholder="Enter your password" value=$password>  <button type="submit" id="button" ><b>SIGN IN </b></button>
        
        <p>  If you want to change your password, please <a href='../define_password.php'>click here. </a></p>
        
        </pre>

    </form>

    _END; 
    
    echo $content;

    //FCT TO CHECK THAT IT IS THE GOOD PASSWORD
    function checkPassword($password,$saved_password) : int {

        //to check that password field is already complete
        if (isset($_POST['password'])) {

            $k=0; //var to return password validity 

            $j=0; 
            for ($i = 0; $i < strlen($_POST['password']); $i++){
                if (strpos($_POST['password'], $_SESSION["saved_password"]) !== false){
                    $j++;
                }
            }
            if ($j===strlen($_POST['password']) && strlen($_SESSION['saved_password'])===strlen($_POST['password'])){
                $k=10;
            }

        } 
        //for when the user hasnt submitted anything yet 
        else {
            $k=1;        
        }
        
        return $k;
    }

    $bool=checkPassword($password,$saved_password);

    //check password validity and give access to main page 
    if ($bool==10){
        echo "Correct Password : "."<a href='../connected_password.php'>Click here to enter the main page !</a>";
    }

?>