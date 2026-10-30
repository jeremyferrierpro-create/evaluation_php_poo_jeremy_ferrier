<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= htmlspecialchars($title ?? 'Liste des jeux') ?></title>
</head>
<body>
    <?php include 'component/navbar.php'?>

<h1>Liste des jeux vidéo</h1>

    <a href="/game/add">Ajouter un jeu</a>

    <?php if (!empty($data['games'])): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Date de publication</th>
                    <th>Console</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['games'] as $game): ?>
                    <tr>
                        <td><?= htmlspecialchars($game['title']) ?></td>
                        <td><?= htmlspecialchars($game['type']) ?></td>
                        <td><?= htmlspecialchars($game['publish_at']) ?></td>
                        <td><?= htmlspecialchars($game['console_name']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun jeu enregistré pour le moment.</p>
    <?php endif; ?>

</body>
</html>