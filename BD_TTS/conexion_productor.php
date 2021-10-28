<?php 

class BaseDatos{

    var $conexion;
    var $servidor="192.168.64.2:8080";
    var $usuario="root";
    var $contrasena="";
    var $nombreDB="tts";
    var $sql;
    
    function __construct(){
        if($GLOBALS['conexion']=new mysqli($this->servidor,$this->usuario,$this->contrasena,$this->nombreDB)){
            echo "<p>conexion exitosa</p>";
        }
        else{
            echo "<p>error de conexion</p>";
        }
    }

    function createTable_Productores()
    {
        $GLOBALS['sql'] = "CREATE TABLE PRV_Productores(
            `IdProductor` int(11) NOT NULL,
            `Clave` varchar(10) DEFAULT NULL,
            `FechaRegistro` datetime DEFAULT NULL,
            `Nombre` varchar(100) NOT NULL,
            `Domicilio` varchar(75) DEFAULT NULL,
            `Colonia` varchar(75) DEFAULT NULL,
            `CP` varchar(5) DEFAULT NULL,
            `IdPoblacion` smallint(6) NOT NULL,
            `Telefono` varchar(20) DEFAULT NULL,
            `Celular` varchar(20) DEFAULT NULL,
            `Fax` varchar(20) DEFAULT NULL,
            `email` varchar(100) DEFAULT NULL,
            `OtrosIngresos` tinyint(4) DEFAULT NULL,
            `PorcentajeOtrosIngresos` tinyint(4) DEFAULT NULL,
            `Fuente` varchar(50) DEFAULT NULL,
            `CertificadoOrganico` varchar(6) DEFAULT NULL,
            `FechaConversion` datetime DEFAULT NULL,
            `Vigencia` datetime DEFAULT NULL,
            `Status` varchar(15) DEFAULT NULL,
            `IdCertificador` smallint(6) DEFAULT NULL,
            `IdOrganizacion` smallint(6) NOT NULL,
            `EmpleadosTemporales` smallint(6) DEFAULT NULL,
            `EmpleadosPermanentesAsegurados` smallint(6) DEFAULT NULL,
            `EmpleadosPermanentesNoAsegurados` smallint(6) DEFAULT NULL,
            `EmpleadosVeladores` smallint(6) DEFAULT NULL,
            `EmpleadosTotal` smallint(6) DEFAULT NULL,
            `IdTipoProductor` int(11) DEFAULT NULL,
            `Observaciones` varchar(200) DEFAULT NULL,
            `Identificador` varchar(36) DEFAULT NULL,
            `Usuario` varchar(10) DEFAULT NULL,
            `Password` varchar(10) DEFAULT NULL,
            `Obsoleto` tinyint(4) DEFAULT NULL,
            `BlockId` varchar(20) DEFAULT NULL,
            `DiasCredito` int(11) DEFAULT NULL,
            `CCodigoAlmacen` varchar(30) DEFAULT NULL,
            `CIDDocumentoDE` varchar(30) DEFAULT NULL,
            `CIDConceptoDocumento` varchar(30) NOT NULL
        )";
        if ($GLOBALS['conexion']->query($GLOBALS['sql']) === TRUE) {
            echo "Table PRV_Productores created successfully";
          } else {
            echo "Error creating table: " . $GLOBALS['conexion']->error;
          }
          
          $GLOBALS['conexion']->close();
    }

    function truncate_PRV_Productores(){
        $GLOBALS['sql'] = "TRUNCATE TABLE PRV_Productores";
    }

    function update_Productores($IdProductor,$Clave,$FechaRegistro,$Nombre,$Domicilio,$Colonia,$CP,$IdPoblacion,$Telefono,$Celular,$Fax,
    $email,$OtrosIngresos,$PorcentajeOtrosIngresos,$Fuente,$CertificadoOrganico,$FechaConversion,$Vigencia,$Status,
    $IdCertificador,$IdOrganizacion,$EmpleadosTemporales,$EmpleadosPermanentesAsegurados,$EmpleadosPermanentesNoAsegurados,$EmpleadosVeladores,$EmpleadosTotal,
    $IdTipoProductor,$Observaciones,$Identificador,$Usuario,$Password,$Obsoleto,$BlockId,$DiasCredito,$CCodigoAlmacen,$CIDDocumentoDE,$CIDConceptoDocumento){
        $sentence_sql="insert into Productores(IdProductor,Clave,FechaRegistro,Nombre,Domicilio,Colonia,CP,IdPoblacion,Telefono,Celular,Fax,
            email,OtrosIngresos,PorcentajeOtrosIngresos,Fuente,CertificadoOrganico,FechaConversion,Vigencia,Status,
            IdCertificador,IdOrganizacion,EmpleadosTemporales,EmpleadosPermanentesAsegurados,EmpleadosPermanentesNoAsegurados,EmpleadosVeladores,EmpleadosTotal,
            IdTipoProductor,Observaciones,Identificador,Usuario,Password,Obsoleto,BlockId,DiasCredito,CCodigoAlmacen,CIDDocumentoDE,CIDConceptoDocumento)
            values('$IdProductor','$Clave','$FechaRegistro','$Nombre','$Domicilio','$Colonia','$CP','$IdPoblacion','$Telefono','$Celular','$Fax',
                '$email','$OtrosIngresos','$PorcentajeOtrosIngresos','$Fuente','$CertificadoOrganico','$FechaConversion','$Vigencia','$Status',
                '$IdCertificador','$IdOrganizacion','$EmpleadosTemporales','$EmpleadosPermanentesAsegurados','$EmpleadosPermanentesNoAsegurados','$EmpleadosVeladores','$EmpleadosTotal',
                '$IdTipoProductor','$Observaciones','$Identificador','$Usuario','$Password','$Obsoleto','$BlockId','$DiasCredito','$CCodigoAlmacen','$CIDDocumentoDE','$CIDConceptoDocumento')";

        if($GLOBALS['conexion']->query($sentence_sql)){
            echo "Datos guardados correctamente";
        }
        else{
            echo "Error Alta";
        }
    }
    
}
?>