<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "cyber_security_lock";
    private $conn;

    // Construtor: Inicia a conexão automaticamente ao instanciar a classe
    public function __construct() {
        $this->connect();
    }

    // Método para conectar ao banco de dados
    private function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        // Verifica erros na conexão
        if ($this->conn->connect_error) {
            die("Erro de conexão: " . $this->conn->connect_error);
        }
    }

    // Método para retornar a conexão ativa
    public function getConnection() {
        return $this->conn;
    }

    // Método para fechar a conexão
    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
