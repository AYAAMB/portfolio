<?php
include 'config.php';

$successMessage = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim(htmlspecialchars($_POST["name"]));
    $email = trim(htmlspecialchars($_POST["email"]));
    $subject = trim(htmlspecialchars($_POST["subject"]));
    $message = trim(htmlspecialchars($_POST["message"]));

    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO messages (name, email, subject, message) VALUES (:name, :email, :subject, :message)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':subject' => $subject,
            ':message' => $message
        ]);
        $successMessage = "Message envoyé avec succès !";
    } else {
        $errorMessage = "Tous les champs sont obligatoires.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        /* Navigation */
        .navbar {
            background-color:rgb(0, 186, 99);
            padding: 15px;
            text-align: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            font-size: 18px;
        }
        .navbar a:hover {
            background-color: #005f73;
            border-radius: 5px;
        }
        /* Contenu principal */
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            text-align: center;
            margin: 50px auto;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        button:hover {
            background-color: #218838;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
        /* Footer */
        .footer {
            background-color:rgb(0, 186, 99);
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<!-- Menu de navigation -->
<div class="navbar">
    <a href="index.php">Accueil</a>
    <a href="professeur.php">About me</a>
    <a href="professeurs.php">Liste des Professeurs</a>
    <a href="contact.php">Contact</a>
</div>

<!-- Contenu principal -->
<div class="container">
    <h2>Contactez-moi</h2>

    <?php if ($successMessage): ?>
        <p class="success"><?php echo $successMessage; ?></p>
    <?php endif; ?>

    <?php if ($errorMessage): ?>
        <p class="error"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="name" placeholder="Votre nom" required>
        <input type="email" name="email" placeholder="Votre email" required>
        <input type="text" name="subject" placeholder="Sujet" required>
        <textarea name="message" placeholder="Message" rows="5" required></textarea>
        <button type="submit">Envoyer</button>
    </form>
</div>

<!-- Pied de page -->
<div class="footer">
    &copy; <?php echo date("Y"); ?> Université XYZ - Tous droits réservés
</div>

</body>
</html>
