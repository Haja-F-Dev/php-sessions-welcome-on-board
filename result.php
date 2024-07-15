<?php //@todo start PHP session 

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome on board</title>
    <link rel="stylesheet" href="/assets/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php include '_navbar.php' ?>
    <main class="container">
        <?php //@todo display contact form data 
        if (isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['subject']) && isset($_SESSION['message'])) {
            $name = $_SESSION['name'];
            $email = $_SESSION['email'];
            $subject = $_SESSION['subject'];
            $message = $_SESSION['message'];

            // Afficher les données du formulaire  
            echo "<h1>Thank you for your message, $name!</h1>";
            echo "<p>Your message is being processed.<br>Our team will get back to you within 48 hours at $email.</p>";
            echo "<p>Have a nice day and see you soon 🙂</p>";
            echo "<h3>You've contacted us for:</h3>";
            echo "<p>Subject: $subject</p>";
            echo "<p>Message: $message</p>";
        } else {
            echo "<h1>Oops! Something went wrong.</h1>";
            echo "<p>Please try again later.</p>";
        }
        ?>
    </main>
    <?php include '_footer.php' ?>
</body>

</html>