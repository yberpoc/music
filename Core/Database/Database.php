<?php

namespace Core\Database;

use Core\General\Settings;
use PDO;
use PDOException;

class Database
{
    private string $portDB;
    private string $host;
    private string $username;
    private string $password;
    private string $name;
    private object $pdo;

    public function __construct()
    {
        $settingsDB = Settings::getDB();

        $this->portDB = $settingsDB['DB_PORT'];
        $this->host = $settingsDB['HOST'];
        $this->username = $settingsDB['USERNAME'];
        $this->password = $settingsDB['PASSWORD'];
        $this->name = $settingsDB['DATABASE_NAME'];

        $this->connectToDB();
    }

    /**
     * @return void
     * Подключение к БД
     */
    private function connectToDB() :void
    {
        try
        {
            $this->pdo = new PDO("mysql:host=$this->host;port=$this->portDB;dbname=$this->name", $this->username, $this->password);

            // set the PDO error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * @param string $query
     * @return array
     * Выполнение запроса к БД
     */
    public function query(string $query) :array
    {
        if (!$this->pdo) {
            throw new PDOException("Connection to Database is not established.");
        }

        $statement = $this->pdo->query($query);

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            // Обработка каждой строки результата
            $result[] = $row;
        }

        return $result ?? [];
    }
}