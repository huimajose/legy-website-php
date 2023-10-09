<?php
class DB {
    private static $pdo;

    private static $host = "localhost"; // Substitua pelo nome do host do seu banco de dados
    private static $usuario = "root"; // Substitua pelo nome de usuário do seu banco de dados
    private static $senha = ""; // Substitua pela senha do seu banco de dados
    private static $bancoDeDados = "legy"; // Substitua pelo nome do seu banco de dados

    // Método construtor da classe
    public function __construct() {
        try {
            self::$pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$bancoDeDados, self::$usuario, self::$senha);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
        }
    }

    // Método para executar consultas
    public static function executarConsulta($sql, $parametros = []) {
        try {
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute($parametros);
            return $stmt;
        } catch (PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
            return null;
        }
    }

    // Método para buscar os banners
    public static function buscarBanners() {
        $sql = "SELECT * FROM banner"; // Substitua 'banner' pelo nome da sua tabela de banners, se for diferente
        $resultados = self::executarConsulta($sql);

        if ($resultados) {
            return $resultados->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
}

// Crie uma instância da classe DB para conectar ao banco de dados
$db = new DB();

// Certifique-se de que a conexão com o banco de dados está estabelecida antes de executar consultas
