<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= htmlspecialchars($title ?? 'Ajouter un jeu vidéo') ?></title>
</head>
<body>
<?php include 'component/navbar.php'?>
    <h1>Ajouter un jeu vidéo</h1>

    <?php if (!empty($data['valid'])): ?>
        <p style="color: green;"><?= htmlspecialchars($data['valid']) ?></p>
    <?php endif; ?>

    <?php if (!empty($data['error'])): ?>
        <p style="color: red;"><?= htmlspecialchars($data['error']) ?></p>
    <?php endif; ?>

    <!-- Formulaire HTML avec action vide et méthode POST -->
    <form action="" method="POST">
        <div>
            <label for="title">Titre du jeu :</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div>
            <label for="type">Type / Genre :</label>
            <input type="text" id="type" name="type" required>
        </div>

        <div>
            <label for="publish_at">Date de publication :</label>
            <input type="date" id="publish_at" name="publish_at" required>
        </div>

        <div>
            <label for="id_console">Console :</label>
            <select id="id_console" name="id_console" required>
                <option value="">-- Sélectionnez une console --</option>
                <?php if (!empty($data['consoles'])): ?>
                    <?php foreach ($data['consoles'] as $console): ?>
                        <option value="<?= htmlspecialchars($console['id']) ?>">
                            <?= htmlspecialchars($console['name']) ?> (<?= htmlspecialchars($console['manufacturer']) ?>)
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>

        <div>
            <button type="submit">Enregistrer le jeu</button>
        </div>
    </form>

</body>
</html>