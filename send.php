<?php

// ==========================
// USTAWIENIA
// ==========================

$odbiorca = "biuro@zpci.pl";


// ==========================
// POBIERANIE DANYCH
// ==========================

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $imie = htmlspecialchars($_POST["imie"] ?? "");

    $nazwisko = htmlspecialchars($_POST["nazwisko"] ?? "");

    $email = htmlspecialchars($_POST["email"] ?? "");

    $telefon = htmlspecialchars($_POST["telefon"] ?? "");


    // szkolenia
    $szkolenie = htmlspecialchars($_POST["szkolenie"] ?? "");


    // usługi
    $usluga = htmlspecialchars($_POST["usluga"] ?? "");


    $wiadomosc = htmlspecialchars($_POST["wiadomosc"] ?? "");





    // ==========================
    // ROZPOZNANIE FORMULARZA
    // ==========================


    if(!empty($szkolenie)){


        $temat = "Zapis na szkolenie ZPCI";


        $tresc = "

Nowy zapis na szkolenie


Imię:
$imie


Nazwisko:
$nazwisko


E-mail:
$email


Telefon:
$telefon


Szkolenie:
$szkolenie


Dodatkowe informacje:

$wiadomosc

";


    }


    else if(!empty($usluga)){


        $temat = "Zgłoszenie usługi IT ZPCI";


        $tresc = "

Nowe zgłoszenie usługi IT


Imię i nazwisko:
$imie


E-mail:
$email


Telefon:
$telefon


Usługa:
$usluga


Opis zgłoszenia:

$wiadomosc

";


    }


    else{


        echo "

        Brak danych formularza.

        ";

        exit;

    }





    // ==========================
    // NAGŁÓWKI EMAIL
    // ==========================


    $headers = "From: formularz@zpci.pl\r\n";

    $headers .= "Reply-To: ".$email."\r\n";

    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";





    // ==========================
    // WYSYŁKA
    // ==========================


    if(mail($odbiorca,$temat,$tresc,$headers)){


        echo "

        <html>

        <head>

        <meta charset='UTF-8'>

        <title>Wysłano</title>

        </head>


        <body style='font-family:Arial;text-align:center;padding:50px;'>


        <h2>
        Dziękujemy za zgłoszenie.
        </h2>


        <p>
        Skontaktujemy się z Państwem w najbliższym czasie.
        </p>


        <a href='index.html'>
        Powrót na stronę główną
        </a>


        </body>

        </html>


        ";


    }

    else{


        echo "

        <h2>
        Nie udało się wysłać wiadomości.
        </h2>

        Sprawdź konfigurację poczty PHP.


        ";

    }



}

else{


echo "Nieprawidłowe wywołanie.";

}


?>