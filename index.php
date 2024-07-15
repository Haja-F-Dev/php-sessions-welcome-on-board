<?php
//@todo start PHP session
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact = array_map('trim', $_POST);
    if (empty($contact['name'])) {
        $errors[] = 'Name is required';
    }
    if (empty($contact['email'])) {
        $errors[] = 'Email is required';
    }
    if (filter_var($contact['email'], FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = 'Email is not valid';
    }
    if (empty($contact['subject'])) {
        $errors[] = 'Please choose a subject in the list';
    }
    if (empty($errors)) {
        //@todo save contact form data to session
        header('Location: result.php');
        exit();
    }
}
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
    <header>
        <?php include '_navbar.php' ?>
        <div class="container">
            <h1>Welcome on board!</h1>
            <img src="/assets/images/avatar.png" alt="">
        </div>
    </header>
    <main>
        <section class="container">
            <h2 id="articles">Recent articles</h2>
            <div class="articles">
                <article>
                    <img src="/assets/images/responsive.png" alt="Responsive">
                    <h3>Responsive</h3>
                    <a href="#" class="btn">Read</a>
                </article>
                <article>
                    <img src="/assets/images/scalable.png" alt="Scalable">
                    <h3>Scalable</h3>
                    <a href="#" class="btn">Read</a>
                </article>
                <article>
                    <img src="/assets/images/inclusive.png" alt="Inclusive">
                    <h3>Inclusive</h3>
                    <a href="#" class="btn">Read</a>
                </article>
            </div>
        </section>
        <section class="container">
            <h2 id="about">About</h2>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi rerum debitis fugit similique laborum,
                eveniet nam ratione sed, itaque, minus in hic dolores suscipit molestias quis quibusdam error blanditiis
                sapiente.
                Laborum laudantium aut, consequuntur voluptatum animi eaque mollitia? Saepe neque facilis minima
                laborum, provident numquam ipsum laudantium totam porro placeat exercitationem voluptates quia explicabo
                temporibus sapiente non. Quo, repellat corrupti.
            </p>
            <p>
                Excepturi dolore saepe, temporibus est voluptate necessitatibus molestiae sit minima eum quisquam et qui
                quaerat nemo nam, consequuntur nisi alias in praesentium. Fuga amet esse nam doloremque ut nemo nostrum.
            </p>
        </section>
        <section class="container">
            <h2 id="contact">Get in touch</h2>
            <p>
                Leave us a message and we will get back to you as soon as possible.
            </p>
            <p>
                <small>Fields marked with red wildcards * are required.</small>
            </p>

            <form method="post">
                <?php if (!empty($errors)) : ?>
                    <h3>Please fix errors below</h3>
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?= $contact['name'] ?? '' ?>" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= $contact['email'] ?? '' ?>" required>

                <label for="subject">Subject</label>
                <select name="subject" id="subject" required>
                    <option value="">-</option>
                    <option value="appointment">Make an appointment</option>
                    <option value="quote">Request a quote</option>
                    <option value="newsletter">Subscribe to newsletter</option>
                </select>

                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5"><?= $contact['message'] ?? '' ?></textarea>

                <button type="submit">Send</button>
            </form>
    </main>
    <?php include '_footer.php' ?>
</body>

</html>