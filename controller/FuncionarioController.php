<?php
    class FuncionarioController {
        
        public static function getAll() {
            require_once 'Database.php';

            $db = new Database();
            $conn = $db->connection();
            $stm = $conn->prepare('SELECT * FROM funcionario');
            $stm->execute();

            $result = $stm->fetchAll();
            return $result;
        }

        public static function getByCod($codFunc) {
            require_once 'Database.php';

            $db = new Database();
            $conn = $db->connection();
            $stm = $conn->prepare('SELECT * FROM funcionario WHERE codFunc = :codFunc');
            $stm->bindValue(":codFunc", $codFunc);
            $stm->execute();

            $result = $stm->fetchAll();
            if (is_null($result) || empty($result)) {
                return NULL;
            }
            return $result[0];
        }
    }
?> 