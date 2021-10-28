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

        function createTable_Huertas(){
            $GLOBALS['sql'] = "CREATE TABLE PRV_Huertas(
                `IdHuerta` int(11) NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `Huerta` varchar(100) NOT NULL,
                `IdProductos` int(11) NOT NULL,
                `NoRegistro` varchar(20) DEFAULT NULL,
                `FDA` varchar(20) DEFAULT NULL,
                `Ubicacion` varchar(100) DEFAULT NULL,
                `IdPoblacion` smallint(6) NOT NULL,
                `Encargado` varchar(75) DEFAULT NULL,
                `Telefono` varchar(20) DEFAULT NULL,
                `IdTipoProducto` int(11) NOT NULL,
                `Superficie` decimal(13,2) DEFAULT NULL,
                `AlturaSNM` smallint(6) DEFAULT NULL,
                `RegistroSAGARPA` varchar(50) DEFAULT NULL,
                `NumeroArboles` int(11) DEFAULT NULL,
                `EdadArboles` smallint(6) DEFAULT NULL,
                `SistemaRiego` varchar(10) DEFAULT NULL,
                `PorcentajeMecanizacion` decimal(5,2) DEFAULT NULL,
                `Status` varchar(25) DEFAULT NULL,
                `FechaCambioStatus` datetime DEFAULT NULL,
                `TiempoStatus` decimal(7,2) DEFAULT NULL,
                `HuertaCancelada` tinyint(4) DEFAULT NULL,
                `FechaFinCancelacion` datetime DEFAULT NULL,
                `DiasFinCancelacion` smallint(6) DEFAULT NULL,
                `Observaciones` varchar(200) DEFAULT NULL,
                `GGN` varchar(15) DEFAULT NULL,
                `GlabalGap` tinyint(4) DEFAULT NULL
            )";
            if ($GLOBALS['conexion']->query($GLOBALS['sql']) === TRUE) {
                echo "Table PRV_Huertas created successfully";
              } else {
                echo "Error creating table: " . $GLOBALS['conexion']->error;
              }
              
              $GLOBALS['conexion']->close();
        }
        function truncate_Huertas(){
            $GLOBALS['sql'] = "TRUNCATE TABLE PRV_Huertas";
        }


        function update_Huertas($IdHuerta,$Huerta,$IdProductos,$NoRegistro,$FDA,$Ubicacion,$IdPoblacion,$Encargado,$Telefono,$IdTipoProducto,$Superficie,
            $AlturaSNM,$RegistroSAGARPA,$NumeroArboles,$EdadArboles,$SistemaRiego,$PorcentajeMecanizacion,$Status,$FechaCambioStatus,
            $TiempoStatus,$HuertaCancelada,$FechaFinCancelacion,$DiasFinCancelacion,$Observaciones,$GGN,$GlabalGap){
                $sentence_sql="insert into Huertas(IdHuerta,Huerta,IdProductos,NoRegistro,FDA,Ubicacion,IdPoblacion,Encargado,Telefono,IdTipoProducto,Superficie,
                AlturaSNM,RegistroSAGARPA,NumeroArboles,EdadArboles,SistemaRiego,PorcentajeMecanizacion,Status,FechaCambioStatus,
                TiempoStatus,HuertaCancelada,FechaFinCancelacion,DiasFinCancelacion,Observaciones,GGN,GlabalGap)
                values('$IdHuerta','$Huerta','$IdProductos','$NoRegistro','$FDA','$Ubicacion','$IdPoblacion','$Encargado','$Telefono','$IdTipoProducto','$Superficie',
                '$AlturaSNM','$RegistroSAGARPA','$NumeroArboles','$EdadArboles','$SistemaRiego','$PorcentajeMecanizacion','$Status','$FechaCambioStatus',
                '$TiempoStatus','$HuertaCancelada','$FechaFinCancelacion','$DiasFinCancelacion','$Observaciones','$GGN','$GlabalGap')";
        
                if($GLOBALS['conexion']->query($sentence_sql)){
                    echo "Datos guardados correctamente";
                }
                else{
                    echo "Error ALta";
                }
            }
    }
?>