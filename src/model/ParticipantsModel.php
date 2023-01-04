<?php

class ParticipantsModel
{
    public $id;
    public $nom;
    public $prenom;
    public $entreprise;

    public function __construct($nom, $prenom, $entreprise = null)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->entreprise = $entreprise;
    }

    public function create()
    {
        $pdo = new PDO($_ENV['DB_TYPE'] . ':host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_NAME'] . ';user=' . $_ENV['DB_USER'] . ';password=' . $_ENV['DB_PASSWORD']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $statement = $pdo->prepare('INSERT INTO participants (nom, prenom, entreprise) VALUES (:nom, :prenom, :entreprise)');
        $statement->execute(
            [
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'entreprise' => $this->entreprise
            ]
        );
    }

    public static function findAll(): array
    {
        $pdo = new PDO($_ENV['DB_TYPE'] . ':host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_NAME'] . ';user=' . $_ENV['DB_USER'] . ';password=' . $_ENV['DB_PASSWORD']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $statement = $pdo->prepare('SELECT * FROM participants');
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function findById($id): array
    {
        $pdo = new PDO($_ENV['DB_TYPE'] . ':host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] . ';dbname=' . $_ENV['DB_NAME'] . ';user=' . $_ENV['DB_USER'] . ';password=' . $_ENV['DB_PASSWORD']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $statement = $pdo->prepare('SELECT * FROM participants WHERE id = :id');
        $statement->execute(['id' => $id]);

        return $statement->fetchAll();
    }
}
