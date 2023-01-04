<?php

class FormationsModel
{
    public $id;
    public $nom;
    public $date_debut;
    public $date_fin;
    public $max_participants;
    public $prix;

    public function __construct($nom, $date_debut, $date_fin, $max_participants, $prix)
    {
        $this->nom = $nom;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->max_participants = $max_participants;
        $this->prix = $prix;
    }

    public function create()
    {
        $pdo = new PDO($_ENV['DB_TYPE'] . ':host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_nom'] . ';user=' . $_ENV['DB_USER'] . ';password=' . $_ENV['DB_PASSWORD']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $statement = $pdo->prepare('INSERT INTO formations (nom, date_debut, date_fin, max_participants, prix) VALUES (:nom, :date_debut, :date_fin, :max_participants, :prix)');
        $statement->execute(
            [
                'nom' => $this->nom,
                'date_debut' => $this->date_debut,
                'date_fin' => $this->date_fin,
                'max_participants' => $this->max_participants,
                'prix' => $this->prix
            ]
        );
    }

    public static function findAll(): array
    {
        $pdo = new PDO($_ENV['DB_TYPE'] . ':host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_nom'] . ';user=' . $_ENV['DB_USER'] . ';password=' . $_ENV['DB_PASSWORD']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $statement = $pdo->prepare('SELECT * FROM formations');
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function findById($id): array
    {
        $pdo = new PDO($_ENV['DB_TYPE'] . ':host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_nom'] . ';user=' . $_ENV['DB_USER'] . ';password=' . $_ENV['DB_PASSWORD']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $statement = $pdo->prepare('SELECT * FROM formations WHERE id = :id');
        $statement->execute(['id' => $id]);

        return $statement->fetchAll();
    }
}
