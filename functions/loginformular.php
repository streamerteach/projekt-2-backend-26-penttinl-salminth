<?php
//KOlla om det finns data i get/post fältet
if (! empty($_REQUEST['username'])) {
    //KOm ihåg att all användardata är skadligt
    $username = test_input($_REQUEST['username']);
    $password = test_input($_REQUEST['password']);
    //print(" Du försöker registrera dig som: " . $username . " och lösenordet: " . $password);
    if ($username == "penttinl") {
        print("username correct, checking password<br>");
        if ($password == "1234") {
            print("password verified, welcome back " . $username . "<br>");
            $_SESSION['username'] = $username;
            header("Refresh:3; url=../home/index.php");
        }
    }
}

//Byt mellan login och registreringsformuläret
if (! empty($_REQUEST['form'])) {
    //Enbart om man vill logga in ska loginformuläret visas
    if ($_REQUEST['form'] == "login") 
    {
        print("<h2>Log in:</h2>");
        print("<form action='./index.php' method='POST'>");
        print("Username:<br><input type='text' name='username'><br>");
        print("Password:<br><input type='password' name='password'><br>");
        print("<input type='submit' name='login' value='Log in'>");
        print("</form>");
        print("<p>If you don't have an account yet: <a href='./index.php?form=signup'>Sign up here!</a></p>");
    }
}
