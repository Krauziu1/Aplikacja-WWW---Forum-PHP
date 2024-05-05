<?php

$servername = "eduweb.pwste.edu.pl";
$username = "Krausm";
$password = "KRAuziu123$%";
$dbname = "Krausm";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT articles.id_art ,articles.zdj,articles.artykul,articles.Autor,  articles.tytul, users.id , users.imie, users.nazwisko , users.typ FROM articles JOIN users ON articles.Autor = users.id ORDER  BY  (articles.id_art) DESC" ;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  echo '<div class="container-fluid mt-0 bg-secondary" >';
while($row = mysqli_fetch_assoc($result)) {
  echo '<div class="row-mt-0 pt-3">';
  echo '  <div  class="col-sm-3">';

 
    if(isset($row["zdj"])) {
      
      echo '<img id="img_art"  style="width:250px;" src="'.$row["zdj"].'">';
    } else {
      echo ' ';
    }
    echo '</div>';
    echo ' <div class="col-sm-9">';

    echo "<h2 style='font-size: 32px;'>".$row["tytul"]. "</h2>";
    echo "<h5 style='font-style: italic;'>".$row["imie"].' '.$row["nazwisko"]."</h5>";
    echo "<p style=margin-top=10px;>".$row["artykul"]. "</p>";
    
     if (isset($_SESSION['logged_in'])  &&( $_SESSION['id']==$row['Autor'])) {
        
         echo "<a href='edit.php?id=" . $row["id_art"] . "'>Edytuj</a> ";
}
         if($_SESSION['typ']=="m"){
         echo "  <a href='deleteskrypt.php?id=" . $row["id_art"] . "'>Usuń</a>"; 
          }
       
     
    echo '</div>';

    echo '</div>';
  }
  echo '</div>';
} 



?>