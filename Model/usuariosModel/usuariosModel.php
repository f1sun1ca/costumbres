<?php

require_once 'Model/conexion.php';

class UsuariosModel
{

  #-----------------------------------------------------------
  #obtener todas usuarios
  public static function getUsuariosModel($tabla)
  {

    $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    $sql->execute();
    return $sql->fetchAll();
    $sql->close();
  }

  public static function ingresarUsuariosModel($datosModel, $tabla)
  {
    $sql = Conexion::conectar()->prepare("INSERT INTO $tabla (nombreusuario ,nombre, password)VALUES(:nombreusuario, :nombre,:password)");

    $sql->bindParam(':nombreusuario', $datosModel['nombreusuario'], PDO::PARAM_STR);
    $sql->bindParam(':nombre', $datosModel['nombre'], PDO::PARAM_STR);
    $sql->bindParam(':password', $datosModel['password'], PDO::PARAM_STR);

    if ($sql->execute()) {
      return 'success';
    } else {
      return 'error';
    }
    $sql->close();
  }


  public static function deleteUsuariosModel($datosModel, $tabla)
  {
    $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idusuario = :idusuario");

    $sql->bindParam(':idusuario', $datosModel, PDO::PARAM_INT);

    if ($sql->execute()) {
      return 'success';
    } else {
      return 'Error';
    }

    $sql->close();
  }


  public static function editarUsuariosModel($datosModel, $tabla)
  {
    $sql = Conexion::conectar()->prepare("UPDATE $tabla SET nombreusuario = :nombreusuario, nombre = :nombre, password = :password WHERE idusuario = :idusuario");

    $sql->bindParam(':nombreusuario', $datosModel['nombreusuario'], PDO::PARAM_STR);
    $sql->bindParam(':nombre', $datosModel['nombre'], PDO::PARAM_STR);
    $sql->bindParam(':password', $datosModel['password'], PDO::PARAM_STR);
    $sql->bindParam(':idusuario', $datosModel['idusuario'], PDO::PARAM_STR);

    if ($sql->execute()) {
      return 'success';
    } else {
      return 'error';
    }

    $sql->close();
  }
}
