<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>
<body>
    
    <form action="mailer.php" method="post" class="box">

        <?php
            if($_GET['success'] == 1) {
                echo "<div class=\"form-result success\">Odeslání proběhlo v pořádku</div>";
            };

            if($_GET['success'] == -1) {
                echo "<div class=\"form-result error\">Chyba při odeslání. Zkuste znovu</div>";
            };
        ?>
        
         <h1>Kontakt</h1>
        <input type="text" name="name" placeholder="Jméno a příjmení">
        <input type="email" name="email" placeholder="Email">
        <textarea name="" name="message" cols="30" rows="10"></textarea>
        <input type="submit" value="Submit">
    </form>


</body>
</html>