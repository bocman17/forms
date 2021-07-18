<?php

    // Načítá pole z form - name, email a message; odstraňuje bílé znaky; odstraňuje HTML

    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Kontroluje data popř. vyhodí chybovou hlášku

    if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:http://www.zgrade.cz/index.php?succes=-1#form");
        exit;
    }

    // Nastavte si email, který chcete, aby se vyplněný form odeslal
    $recipient = "davset@seznam.cz";

    // Nastavte předmět mailu

    $subject = "Nový kontakt od: $name";

    // obsah emailu

    $email_content = "Jméno: $name\n";
    $email_content = "Email: $email\n\n";
    $email_content = "Zpráva:\n$message\n";

    // Emailová hlavička
    $email_headers = "From: $name <$email>";

    // Odeslání emailu - dáme vše dohromady
    mail($recipient, $subject, $email_content, $email_headers);

    // přesměrování na stránku pokud vše proběhlo v pořádku
    header("Location: http://www.zgrade.cz/index.php?succes=1#form");

    ?>