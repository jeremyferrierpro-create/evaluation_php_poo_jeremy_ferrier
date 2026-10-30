<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Repository\ConsoleRepository;
use App\Repository\GameRepository;
use App\Entity\Console;
use App\Entity\Game;
use App\Utils\Tools;


class GameController extends AbstractController
{
    //Attributs
    private ConsoleRepository $consoleRepository;
    private GameRepository $gameRepository;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->consoleRepository = new ConsoleRepository();
        $this->gameRepository = new GameRepository();
    }

    //Méthodes

    /**
     * Méthode pour ajouter un Jeu (Game)
     * @return mixed Retourne le template
     */
  public function addGame(): mixed 
{
    // Je crée un tableau vide
    $data = [];

    if (!empty($_POST)) {
        if (!empty($_POST['title']) && !empty($_POST['type']) && !empty($_POST['publish_at']) && !empty($_POST['id_console'])) {
            $title = Tools::sanitize($_POST['title']);
            $type = Tools::sanitize($_POST['type']);
            $publishAt = new \DateTimeImmutable(Tools::sanitize($_POST['publish_at']));
            $idConsole = (int) Tools::sanitize($_POST['id_console']);

            $console = new Console('', '');
            $console->setId($idConsole);

            $game = new Game($title, $type, $publishAt, $console);

            $this->gameRepository->saveGame($game);

            $data['valid'] = "Le jeu a été enregistré avec succès !";
        } else {
            $data['error'] = "Veuillez renseigner tous les champs obligatoires.";
        }
    }

    $data['consoles'] = $this->consoleRepository->findAllConsoles();

    $this->render('add_game', 'Ajouter un jeu', $data);
    return null;
}

    
    /**
     * Méthode pour afficher la liste des Jeux (Game)
     * @return mixed Retourne le template
     */
    public function showAllGames(): mixed 
{
    // Je crée un tableau vide
    $data = [];

    // Je créer un tableau games dans le quel je mets les données de la fonction findAllGames de gameRepository.php
    $data['games'] = $this->gameRepository->findAllGames();

    // J'appelle le rendu, pour charger le template template_show_all_games.php, le titre et la liste de jeux pour lui transmettre les données du tableau games.
    $this->render('show_all_games', 'Liste des jeux vidéo', $data);
    return null;
}
}
