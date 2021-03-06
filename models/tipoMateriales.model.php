<?php
    //modelo de datos de tipo de materiales
    /*
    
      CREATE TABLE `nw201501`.`tipoMaterial` (
  `tipoMatId` bigint(10) NOT NULL AUTO_INCREMENT,
  `tipoMatdsc` varchar(45) COLLATE utf8_bin NOT NULL,
  `tipoMatest` char(3) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`tipoMatId`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
    
    
    
    SELECT `tipoMaterial`.`tipoMatId`,
    `tipoMaterial`.`tipoMatdsc`,
    `tipoMaterial`.`tipoMatest`
FROM `nw201501`.`tipoMaterial`;
    */

    require_once("libs/dao.php");

    function obtenerTipoMateriales(){
        $TipoMateriales = array();
        $sqlstr = "select * from tipoMaterial;";
        $TipoMateriales = obtenerRegistros($sqlstr);
        return $TipoMateriales;
    }
    
    function sePuedeBorrar($TipoMaterialID){
        $TipoMaterial = array();
      $sqlstr = "select * from almacenes where tipoMatId = %d;";
      $sqlstr = sprintf($sqlstr, $TipoMaterialID);
      $TipoMaterial = obtenerUnRegistro($sqlstr);
      return $TipoMaterial;
    }


    function obtenerTipoMaterial($TipoMaterialID){
      $TipoMaterial = array();
      $sqlstr = "select * from tipoMaterial where tipoMatId = %d;";
      $sqlstr = sprintf($sqlstr, $TipoMaterialID);
      $TipoMaterial = obtenerUnRegistro($sqlstr);
      return $TipoMaterial;
    }

    function insertarTipoMaterial($TipoMaterial){
      if($TipoMaterial && is_array($TipoMaterial)){

         $sqlInsert = "INSERT INTO `tipoMaterial` (`tipoMatdsc`, `tipoMatest`) VALUES ('%s', '%s');";
         $sqlInsert = sprintf($sqlInsert,
                        $TipoMaterial["tipoMatdsc"],
                        $TipoMaterial["tipoMatest"]
                      );
         if(ejecutarNonQuery($sqlInsert)){
           return getLastInserId();
         }
      }
      return false;
    }

    function actualizarTipoMaterial($TipoMaterial){
      if($TipoMaterial && is_array($TipoMaterial)){
        $sqlUpdate = "update tipoMaterial set tipoMatdsc='%s', tipoMatest='%s' where tipoMatId=%d;";
        $sqlUpdate = sprintf($sqlUpdate,
                              valstr($TipoMaterial["tipoMatdsc"]),
                              valstr($TipoMaterial["tipoMatest"]),
                              valstr($TipoMaterial["tipoMatId"])
                    );
        return ejecutarNonQuery($sqlUpdate);
      }
      return false;
    }


    function borrarTipoMaterial($TipoMaterialID){
      if($TipoMaterialID){
        $sqlDelete = "delete from tipoMaterial where tipoMatId=%d;";
        $sqlDelete = sprintf($sqlDelete,
                      valstr($TipoMaterialID)
                    );
        return ejecutarNonQuery($sqlDelete);
      }
      return false;
    }

?>
