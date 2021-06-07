
<?php include 'validate.php'; ?> 

<?php

    //display class 
    
    echo  "Date  validation \n ";
    echo "</br>";

    $validate =  new  ValidateClass();
    
    $dateOne =  '03-22-2016';
    $dateTwo =  '03/22/2010';
    $dateThree =  '03/22/2030';
    $dateFour =  '05/20/2010';
    
    if($validate->validate($dateOne) == 1){

        echo '<h1 style="font-size:30px;color:green"> date is  valid </h1>'.  $dateOne;
        echo "</br>";

    }else{

        echo '<h1 style="font-size:30px ;color:red"> date is not valid </h1>' . $dateOne;
        echo "</br>";
    }

    
    if($validate->validate($dateTwo) ==  1){

        echo '<h1 style="font-size:30px ;color:green"> date is  valid </h1>' .  $dateTwo;

        echo "</br>";

    }else{

        echo '<h1 style="font-size:30px;color:red"> date is not  valid </h1>' . $dateTwo;
        echo "</br>";
    }
   
    if($validate->validate($dateThree)==  1){

        echo '<h1 style="font-size:30px;color:green"> date is  valid </h1>' . $dateThree;

        echo "</br>";
    }
    else{

        echo '<h1 style="font-size:30px;color:red"> date is not valid </h1>' . $dateThree;
        echo "</br>";
    }
   
    if($validate->validate($dateFour) == 1){

        echo '<h1 style="font-size:30px;color:green"> date is  valid </h1>' . $dateFour;

        echo "</br>";

    }else{

        echo '<h1 style="font-size:30px;color:red"> date is not  valid </h1>' . $dateFour;
        echo "</br>";
    }
   

    echo "</br>";
    echo "</br>";
    echo "</br>";

    echo '<h1 style="font-size:30px;color:green"> Displaying  all  users  from  the database</h1>';

    echo "</br>";
    echo "</br>";


    //connction  instance  
    $conn = new mysqli('localhost', 'root', '',  'users');  

    $sql = "SELECT * FROM users";

 
    $result = mysqli_query($conn, $sql);

    
    while($row = mysqli_fetch_array($result)) {

      echo $row['firstname'] . "<br />";
      echo $row['lastname'] . "<br />";
      echo $row['email'] . "<br />";

    }

    mysqli_close($conn);
    

?>