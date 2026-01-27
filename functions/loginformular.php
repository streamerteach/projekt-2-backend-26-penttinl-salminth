<?php
//KOlla om det finns data i get/post fältet
if (!empty($_REQUEST['username'])) {
    //KOm ihåg att all användardata är skadligt
    $username = test_input($_REQUEST['username']);
    $password = test_input($_REQUEST['password']);
    //print(" Du försöker registrera dig som: " . $username . " och lösenordet: " . $password);
    if($username == "penttinl") {
        print("username correct, checking password<br>");
        if($password == "1234") {
            print("password verified, welcome back".$username."<br>");
            $_SESSION['username'] = $username;
            header("Refresh:3; url=../profile/");
        }
    }
}

//Byt mellan login och registreringsformuläret
if (! empty($_REQUEST['form'])) {
    //Enbart om man vill logga in ska loginformuläret visas
    if ($_REQUEST['form'] == "login") {
        print("Du har valt att logga in");
        print("<h2>Loginformuläret:</h2>");
        print("Användarnamn: <input type='text' name='login'>");
        print("<input type='submit' value='Logga in'>");
        print("<p>Har du inget konto? <a href='./index.php?form=signup'>Registrera dig här!</a></p>");
    }
}
