<?php 

    // to use var from another file 
    require_once 'databaseV3_login.php';  

    //check that the database exists 
    try  {    
        $pdo = new PDO($attr, $user, $pass, $opts);  
        echo "// Welcome to your car database : ";

        $conn = new mysqli($host, $user,$pass);
         //Create table (if not already created)
         $sql = "CREATE TABLE listofcars.Cars (
            id SMALLINT NOT NULL AUTO_INCREMENT,
            CarID varchar(255) NOT NULL,
            CarBrand varchar(255) NOT NULL,
            CarDate varchar(255) NOT NULL,
            PRIMARY KEY (id)  
        )";
        if ($conn->query($sql) === TRUE) {
            echo " // Table Cars created successfully";
        } 


    }  catch (PDOException $e)  {
        throw new PDOException($e->getMessage(), (int)$e->getCode()); 
    }  

    //delete a line from the table 
    if (isset($_POST['delete']) && isset($_POST['id']))  {    
        $id   = get_post($pdo, 'id');    
        $query  = "DELETE FROM cars WHERE id=$id";    
        $result = $pdo->query($query);  
        
    }
       
    //NEW CAR
    if (isset($_POST['id'])    &&  isset($_POST['carid'])    &&      isset($_POST['carbrand']) &&      isset($_POST['cardate']))  {   
        $id   = get_post($pdo, 'id');     
        $carid    = get_post($pdo, 'carid');    
        $carbrand = get_post($pdo, 'carbrand');    
        $cardate     = get_post($pdo, 'cardate');    
        

        //check that all parameters are complete
        if (($_POST['id']!="") && ($_POST['carid']!="") && ($_POST['carbrand']!="") && ($_POST['cardate']!=""))  {  

            $query  = "SELECT * FROM cars";  
            $result = $pdo->query($query);

            $i=0; //bool var to decide if we add or modify the line 

            while ($row = $result->fetch())  {     
                $r3 = htmlspecialchars($row['id']);  
                
                //modify car by putting new car 
                if ($r3 == $_POST['id'])  {  
                    //echo "Already taken";
                    $query    = "UPDATE cars 
                                    SET 
                                        CarID = $carid ,
                                        CarBrand =$carbrand,
                                        CarDate = $cardate
                                    WHERE 
                                        id= $r3;
                                    ";    
                    $result = $pdo->query($query);
                    $i++;
                }
            } 

            //create new car 
            if ($i == 0)  { 
                $query    = "INSERT INTO cars VALUES" . "($id,$carid, $carbrand, $cardate)";    
                $result = $pdo->query($query);
            }
            
        }
    }  

    //display form on webpage 
    $content = <<<_END
    <form action="databaseV3_CRUD.php" method="post">
        <pre>         

        Your car ID : <input type="text" name="carid" id="carid" placeholder="Enter your car ID"><br>  
        Car Brand : <input type="text" name="carbrand" id="carbrand" placeholder="Enter your  brand"><br>      
        Car Date : <input type="number" name="cardate" id="cardate" min="2000" max="2021" placeholder="Year"><br>     
        ID : <input type="number" name="id" id="id" placeholder="Table ID" ><br>  

        <button type="submit" id="button" ><b>ADD CAR </b></button>

 
        
        </pre>
    
    </form>
    _END;  

    echo $content;      


    //display existing cars on webpage  
    $query  = "SELECT * FROM cars";  
    $result = $pdo->query($query);
    while ($row = $result->fetch())  {    
        $r0 = htmlspecialchars($row['CarID']);    
        $r1 = htmlspecialchars($row['CarBrand']);    
        $r2 = htmlspecialchars($row['CarDate']);    
        $r3 = htmlspecialchars($row['id']);          
        
        $content = <<<_END
        
        <pre>    
            Car ID : $r0     
            Car Brand : $r1  
            Car Date : $r2      
            ID : $r3  
        </pre>  

        <form action='databaseV3_CRUD.php' method='post'>  
        
        <input type='hidden' name='delete' value='yes'>  
        <input type='hidden' name='id' value='$r3'>  
        <input type='submit' value='DELETE RECORD'>
        
        </form>

        _END; 
        
        if ($r0 != null)  {  
            echo $content;
        }

    }  

    function get_post($pdo, $var)  {    
        return $pdo->quote($_POST[$var]);  
    }

?>