<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Wits</title>

</head>

<body>


    <header>
        <span class="logo">Wits 2022 </span>
        <nav class="navigation">
            <a href="home.php">Home</a>
            <a href="cfp.php">CFP</a>
            <a href="committee.php">Committee</a>
            <a href="speakers.php">Speakers</a>
            <a href="registration.php">Registration</a>
            <a href="venue.php">Vennue</a>
            <a href="workshop.php">Workshop</a>
        </nav>

    </header>

    <section class="comitte" >
    
    </section>
<section class="com">
<div>
<h2 class="title"> Committee :</h2>
<?php

    try {
        $pdo=new PDO("mysql:host=localhost;dbname=gestionconference","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
    
    } catch (PDOException $e) {
        
        die("error: could not connect". $e->getMessage());
    }

    try{
    $requette="select id_com ,libelle_com from commitee ";
    $resultC=$pdo->query($requette);
   
    while($row=$resultC->fetch()){
    echo"<p class=top>".$row[1].": </p> "; 
   
  
    
   
    $sql="SELECT nom, prenom, fonction, etabblissement, universite, laboratoire, ville, pays FROM element_commitee , appartenir_commitee WHERE appartenir_commitee.id_elmtC=element_commitee.id_elmtC and appartenir_commitee.id_com=".$row[0];
    $resultD=$pdo->query($sql);
while($element=$resultD->fetch()){
    echo "<p class=elementt>";
   
  echo "<strong>". $element['nom'] ," " ,$element['prenom'] ."</strong>"," ",$element['fonction']," ",$element['etabblissement']," ",$element['universite']," ",$element['laboratoire']," ",$element['ville']," ",$element['pays'];  
  
  
  echo "</p>"; 
 

    }

 
  
    }
     

}
catch (PDOException $e) {
    die("error: could not connect". $e->getMessage());
}
echo "<br>";

?>

</div>
</section>
<footer class="footer">
    <p>Copyrighit @ <span>2020 WITS-2020</span> all rights reserved</p>

</footer>
</body>
</html>