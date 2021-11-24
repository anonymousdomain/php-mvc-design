<?php

namespace app\core\database;
use app\core\Application;
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
        $appliedMigrations = $this->getAppliedMigrations();
        $newMigrations = [];
        $files = scandir(Application::$ROOT_DIR . '/migrations');
        $toApplayMigrations = array_diff($files, $appliedMigrations);
        foreach ($toApplayMigrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }
            require_once Application::$ROOT_DIR . '/migrations/' . $migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $migrate = new $className();
            $this->log("Applying migrations $migration");
            $migrate->up();
            $this->log("Applied migrations $migration");
            $newMigrations[] = $migration;
        }
        if (empty($newMigrations)) {
            $this->log("all migrations are applied");
        } else {
            $this->saveMigrations($newMigrations);
        }
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

    public function saveMigrations(array $migrations)
    {
        $str = implode(",", array_map(fn ($m) => "('$m')", $migrations));
        $statement = $this->pdo->prepare("INSERT INTO migrations(migration)VALUES
       $str
       ");
        $statement->execute();
    }

    public function log($message){
       echo '['.date('Y-m-d H:i:s').']-'.$message.PHP_EOL; 
    }

    public function prepare($sql){
        return Application::$app->db->pdo->prepare($sql);
    }
}
