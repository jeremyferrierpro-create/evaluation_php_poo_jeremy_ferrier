<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Entity\Console;
use App\Entity\Game;

class GameRepository
{
    //Attribut
    private \PDO $connect;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->connect = (new Mysql)->connectBDD();
    }

    //Méthodes

    /**
     * Méthode qui ajoute un jeu (Game) en BDD
     * @return void
     * @throws \Exception Erreurs SQL
     */
    
    public function saveGame(Game $game): void 
    {
        try {
            $sql = "INSERT INTO video_game (title, type, publish_at, id_console) VALUES (?, ?, ?, ?)";
            $stmt = $this->connect->prepare($sql);
            
            $stmt->bindValue(1, $game->getTitle(), \PDO::PARAM_STR);
            $stmt->bindValue(2, $game->getType(), \PDO::PARAM_STR);
            $stmt->bindValue(3, $game->getPublishAt()->format('Y-m-d'), \PDO::PARAM_STR);
            $stmt->bindValue(4, $game->getConsole()->getId(), \PDO::PARAM_INT);
            
            $stmt->execute();

        } catch(\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    /**
     * Méthode qui retourne la liste des jeux (Game)
     * @return array<Game> Retourne le tableau des jeux (Game)
     * @throws \Exception Erreurs SQL
     */
    
    public function findAllGames(): array 
    {
        $sql = "SELECT v.title, v.type, v.publish_at, c.name AS console_name 
                FROM video_game v 
                INNER JOIN console c ON v.id_console = c.id";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
