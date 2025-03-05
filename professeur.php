<?php
include 'config.php';

// Récupérer l'ID du professeur depuis l'URL (ex: professeur.php?id=1)
$id = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Requête SQL pour récupérer les informations du professeur
$stmt = $conn->prepare("SELECT * FROM professeurs WHERE id = :id");
$stmt->execute(['id' => $id]);
$professeur = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$professeur) {
    die("Professeur non trouvé.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos du Professeur</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
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
            background-color: #rgb(5, 183, 100);
            border-radius: 5px;
        }
        /* Contenu principal */
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            text-align: center;
            margin: 50px auto;
        }
        img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid rgb(73, 195, 91);
        }
        h2 {
            color: #333;
            margin: 10px 0;
        }
        p {
            color: #555;
            margin: 5px 0;
        }
        .info {
            font-weight: bold;
            color: rgb(0, 255, 140);
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
    <img src="images/<?php echo htmlspecialchars($professeur['photo']); ?>" alt="Photo du Professeur">
    <h2><?php echo htmlspecialchars($professeur['nom']); ?></h2>
    <p><span class="info">Email :</span> <?php echo htmlspecialchars($professeur['email']); ?></p>
    <p><span class="info">Téléphone :</span> <?php echo htmlspecialchars($professeur['telephone']); ?></p>
    <p><span class="info">Spécialité :</span> <?php echo htmlspecialchars($professeur['specialite']); ?></p>
    <p><span class="info">À propos :</span> <?php echo htmlspecialchars($professeur['bio']); ?></p>
</div>

<!-- Pied de page -->
<div class="footer">
    &copy; <?php echo date("Y"); ?> Université XYZ - Tous droits réservés
</div>

</body>
</html>
