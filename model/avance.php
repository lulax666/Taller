<?php

require_once 'singleton/mysql.php';

class Avance {

    private $pdo;

    public function __CONSTRUCT($metodo = false) {
        try {
            $this->pdo = ConexionMysql::getInstance($metodo)->obtenerConexion();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
            $sql = $this->pdo->prepare("SELECT * FROM avance");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Por_Usuario($pkusuario) {
        try {
            $sql = $this->pdo->prepare("SELECT a1.pkavance, a1.fecha, a1.hora, a1.fkdocumento, a1.fkusuario, a1.fkdocumento as fkestado_documento FROM avance a1 WHERE a1.fkusuario = ? GROUP BY a1.fkdocumento");
            //$sql = $this->pdo->prepare("SELECT a1.pkavance, a1.fecha, a1.hora, a1.fkdocumento, a1.fkestado_documento, a1.fkusuario FROM avance a1 WHERE a1.pkavance IN ( SELECT MAX(a2.pkavance) FROM avance a2 WHERE a2.fkusuario = ? GROUP BY a2.fkdocumento)");
            $sql->execute(array($pkusuario));
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener_Ultimo_Estado($pkdocumento) {
        try {
            $sql = $this->pdo->prepare("SELECT * FROM avance WHERE fkdocumento = ? and pkavance = (SELECT MAX(pkavance) FROM avance) ");
            $sql->execute(array($pkdocumento));
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Por_Documento($pkdocumento) {
        try {
            $sql = $this->pdo->prepare("SELECT * FROM avance a WHERE a.fkdocumento = ?");
            $sql->execute(array($pkdocumento));
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($pk) {
        try {
            $sql = $this->pdo->prepare("SELECT * FROM avance a WHERE a.pkavance=?");
            $sql->execute(array($pk));
            return $sql->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener_Origen_Documento($fkdocumento) {
        try {
            $sql = $this->pdo->prepare("SELECT MIN(fkusuario) as fkusuario FROM avance a WHERE a.fkdocumento=?");
            $sql->execute(array($fkdocumento));
            return $sql->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener_Estado_Documento($pkdocumento) {
        try {
            $sql = $this->pdo->prepare("SELECT * FROM avance a1 WHERE a1.fkdocumento = ? and a1.pkavance = (SELECT MAX(a2.pkavance) FROM avance a2 WHERE a1.fkdocumento = a2.fkdocumento )");
            $sql->execute(array($pkdocumento));
            return $sql->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Guardar($datos) {
        try {
            $sql = $this->pdo->prepare("INSERT INTO avance(fecha,hora,fkusuario,fkdocumento,fkestado_documento,comentario) VALUES (?,?,?,?,?,?)");
            $sql->execute(
                array(
                    $datos['fecha'],
                    $datos['hora'],
                    $datos['fkusuario'],
                    $datos['fkdocumento'],
                    $datos['fkestado_documento'],
                    $datos['comentario']
                )
            );
            $sql = $this->pdo->prepare("SELECT max(pkavance) as pkavance FROM avance");
            $sql->execute();
            return $sql->fetch(PDO::FETCH_OBJ)->pkavance;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


}

?>