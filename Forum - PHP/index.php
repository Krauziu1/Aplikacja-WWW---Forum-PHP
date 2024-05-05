<!DOCTYPE html>
<html>
  <head>
    <title>MK</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Dodajemy link do pliku CSS Bootstrapa -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Dodanie linków do biblioteki Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-fxkEh+kX7C1BjK6wbhZq3pZuz06Jz6/Kmrup+eUEyJ2Dd1XaYXYJvkN16H7A8NvRj+Jt1sHtGk7e8IoKj9/7Vw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="styl.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Strona główna <span class="sr-only">(current)</span></a>
</li>
            <?php
             session_start();
            if (isset($_SESSION['logged_in'])) {
           
              if ($_SESSION['logged_in']) {
              //  echo '<li class="nav-item">'."Witaj, ".$_SESSION['imie']." ".$_SESSION['nazwisko'].", ".$_SESSION['id']."!" .'</li>';
            } else {
                echo "Nie jesteś zalogowany.";
            }
          }else{
            echo '  <li class="nav-item">';
            echo '  <a class="nav-link" href="logowanie.php">Logowanie</a>';
            echo ' </li>';
            echo '  <li class="nav-item">';
            echo '     <a class="nav-link" href="rejestracja.php">Rejestracja</a>';
            echo '   </li>';
          }
         
           
            ?>


            

 <form action="" method="POST">
      
      <?php
        if (isset($_SESSION['logged_in'])) {
          echo '<button class="btn btn-primary" type="submit" name="log_out" style="margin-right:50px;">Wyloguj </button>';
      if (isset($_POST['log_out'])) {
        echo "Koniec sesji";
        session_destroy();
        header("Location: index.php");
        exit;
      }
     }
      ?>
 </form>

 </div>


    </ul>
      </div>


      <div class="col-sm-3">
			<img src="pwste.png">
		</div>
    </nav>

    <div class="container-fluid bg-secondary">
    <?php 
    if ( isset($_SESSION['logged_in']) && ($_SESSION['typ']=="u" || $_SESSION['typ']=="m") ) {
        echo '<form action="articles.php" method="POST"  enctype="multipart/form-data">';
        echo '<label for="comment">Tytuł:</label>';
        echo '<input type="text" class="form-control" placeholder="Tytuł" name="tlt">';
        echo '<label for="comment">Artykul:</label>';
        echo '<textarea class="form-control" rows="5" id="comment" name="article"></textarea>';
        echo '<button type="submit" class="btn btn-primary">Wyslij artykul</button>';
        
        
        echo 'Wybierz obrazek:';
        echo '<input type="file"  name="fileToUpload" id="fileToUpload">';
   
        echo '</form>';
    }else{
      echo "";
    } 
    ?>

   
    </div>
  
    <?php
include 'show_post.php'
?>


    <div class="container mt-4">
      <!-- <h1>Witaj!</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed eros aliquet, bibendum purus non, tincidunt velit. Etiam ullamcorper risus eu ligula bibendum sagittis. In eget orci at augue auctor euismod. Quisque vel fermentum mi. Sed auctor finibus tellus, ac feugiat dolor porta ac. Sed condimentum aliquet pharetra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla euismod, sapien sed pulvinar congue, odio enim mollis diam, a vestibulum libero massa ac ex. Mauris eleifend, orci nec bibendum sagittis, mauris lectus rutrum ante, vel euismod orci mi eu eros. Vestibulum sodales tristique orci, eget sodales tellus ultricies et. Nam eget fringilla metus. Donec eget sapien dolor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce in varius turpis, nec maximus lacus. </p> -->
    </div>

    <footer class="bg-dark text-white py-3 mb-0">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-center text-md-left">
        <p class="mb-0">Projekt - Aplikacje WWW</p> <br>
        PWSTE Czarnieckiego 16, 37-500 Jarosław
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2563.9570713468916!2d22.6709749159326!3d50.01215982672896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473c9bd00702269d%3A0x34c3e02f77a47069!2sPa%C5%84stwowa%20Wy%C5%BCsza%20Szko%C5%82a%20Techniczno-Ekonomiczna!5e0!3m2!1spl!2spl!4v1679297200763!5m2!1spl!2spl"  height="150" width="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="map"></iframe>

      </div>
      <div class="col-md-6 text-center text-md-right">
        <h1> Kontakt: </h1>
      <img src="mail.png" alt="Mail Icon" class="icon">  <span><i class="fas fa-envelope"></i> Email: <a href="mailto:s39446@s.pwste.edu.pl">s39446@s.pwste.edu.pl</a></span> <br>
      <img src="dane.png" alt="Mail Icon" class="icon">  <span><i class="fas fa-envelope"></i>Imie i Nazwisko: Michał Kraus</span> 
    </p>
      </div>
      <!-- <div class="row-md-5 col-md-10/5 text-center text-md-right">
      <img src="dane.png" alt="Mail Icon" class="icon">  <span><i class="fas fa-envelope"></i> Michał Kraus</span> 
       </div> -->
    </div>

  </div>
  
</footer>



    <!-- Dodajemy linki do plików JS Bootstrapa -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
