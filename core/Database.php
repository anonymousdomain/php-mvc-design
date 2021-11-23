<?php

namespace app\core;

use PDO;

class Database
{

    public PDO $pdo;

    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $this->getAppliedMigrations();
        $files = scandir(Application::$ROOT_DIR . '/migrations');
        echo '<pre>';
        var_dump($files);
        echo'</pre>';
    }
    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations(
            id INT AUTO_INCREMENT primary key,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )ENGINE=INNODB;");
    }
    public function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration from migrations");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }
}
