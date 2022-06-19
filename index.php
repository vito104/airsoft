<!DOCTYPE html>
<html lang="cs">
  <head>
    <meta charset="utf-8">
    <title>Systém pro členy airsoftové skupiny</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <footer>
        <?php
        include "paticka.php"
        ?>
   </footer>
   <?php
          if (!isset($_GET['page'])) include 'pages/home.php';
          else switch ($_GET['page']) {
            
            case 'userreg':
                include("pages/userreg.php");
                break;
            
            default:
              include "pages/home.php";
              break;        
          } 
    ?>
  </body>
</html>
