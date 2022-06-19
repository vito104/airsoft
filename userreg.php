
<?php 

    if ($_SERVER['REQUEST_METHOD'] !== "POST") die();
/*
   
    function array_contains($haystack, $needle) {
        return count(array_intersect($haystack, $needle)) == count($needle);
    }

    if (!array_contains($_GET, ['email', 'name', 'surname', 'password', 'confirm_password'])) die('Chyba');
    
    $email = htmlspecialchars($_GET['email']);
    $name = htmlspecialchars($_GET['name']);
    $surname = htmlspecialchars($_GET['surname']);
    $password = htmlspecialchars($_GET['password']);
    $confirm_password = htmlspecialchars($_GET['confirm_password']);

    // TODO: spracovat data z formulara (vlozit do databazy)
*/
    $predmet = "Nova registrace";
    $zprava = "Prisla zadost o registraci uzivatele.\r\n";
    $zprava = wordwrap($zprava, 70, "\r\n");

    $prijemci = array("r201@email.cz", "jararid@email.cz");

    $hlavicka = "From: noreply@ruzicka-markojugend.ga\r\n";

    foreach ($prijemci as $prijemce){
        if (!mail($prijemce, $predmet, $zprava, $hlavicka)) {
            echo "<script>alert('Email nebyl odeslan!');</script>";
        }
        echo "<script>alert('Odesílám email přes SMTP na portu 465');</script>";
    }

?>

<div class="center">
      <h1>Prosím, zadejte údaje</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" id="email" required>
          <span></span>
          <label>email</label>
        </div>
        <div class="txt_field">
          <input type="text" id="name" required>
          <span></span>
          <label>Jméno</label>
        </div>
        <div class="txt_field">
          <input type="text" id="surname" required>
          <span></span>
          <label>Příjmení</label>
        </div>
        <div class="txt_field">
          <input type="password" id="password" required>
          <span></span>
          <label>Heslo</label>
        </div>
        <div class="txt_field">
          <input type="password" id="confirm_password" required>
          <span></span>
          <label>Heslo znovu</label>
        </div>
        <div class="signup_link">
        <a href="index.php?page=home">Zpět</a>
        </div>
        <input type="submit" value="Požádat o registraci">
        </div>
      </form>
    </div>
    <script>
    //@ts-check
    function submitRegistration() {
        let email = document.getElementById('email');
        let password = document.getElementById('password');
        let confirmPassword = document.getElementById('confirm_password');
        
        if (!email.value.includes('@')) alert("Neplatná adresa");

        else if (password.value == confirmPassword.value) {
            let really = confirm("Vasa poziadavka bude zaevidovana, potom vas administrator kontaktuje. Chcete pokracovat?");
            if (really) {
                var form = document.getElementById('register');
                form.submit();
            }
        }
        
        else alert('Heslá sa nezhodujú!');
        return true;
    }
</script>
