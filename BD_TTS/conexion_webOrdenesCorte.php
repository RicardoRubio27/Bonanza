<?php 

    class BaseDatos{
        var $conexion;
        var $servidor="192.168.64.2:8080";
        var $usuario="root";
        var $contrasena="";
        var $EjercicioDB="tts";
        var $sql;
        
        
        function __construct(){
            if($GLOBALS['conexion']=new mysqli($this->servidor,$this->usuario,$this->contrasena,$this->EjercicioDB)){
                echo "<p>conexion exitosa</p>";
            }
            else{
                echo "<p>error de conexion</p>";
            }
        }

        function createTable_WEB_OrdenesCorte(){
            $GLOBALS['sql'] = "CREATE TABLE WEB_OrdenesCorte(
                `IdOrdenCorte` int(11) NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `IdLote` varchar(50) DEFAULT NULL,
                `Huerta` datetime DEFAULT NULL,
                `Nombre` varchar(100) NOT NULL,
                `Chofer` tinyint(4) DEFAULT NULL,
                `Placas` tinyint(4) DEFAULT NULL,
                `Ticket` int(11) DEFAULT NULL,
                `PesoBruto` decimal(14,2) NOT NULL,
                `PesoTara` varchar(200) DEFAULT NULL,
                `TaraCajas` tinyint(4) DEFAULT NULL,
                `PesoMuestra` tinyint(4) DEFAULT NULL,
                `PesoNeto` decimal(14,2) DEFAULT NULL,
                `COPREF` decimal(14,2) DEFAULT NULL,
                `Cancelado` decimal(14,4) DEFAULT NULL,
                `FechaProduccion` decimal(14,4) DEFAULT NULL,
                `Estatus` decimal(14,4) DEFAULT NULL,
                `GlobalGap` decimal(14,4) DEFAULT NULL,
                `GGN` decimal(14,4) DEFAULT NULL,
                `JefeCuadrilla` decimal(14,4) DEFAULT NULL,
                `JefeAcopio` decimal(14,4) DEFAULT NULL
            )";
        if ($GLOBALS['conexion']->query($GLOBALS['sql']) === TRUE) {
            echo "Table PRV_Productores created successfully";
            } else {
            echo "Error creating table: " . $GLOBALS['conexion']->error;
            }
              
            $GLOBALS['conexion']->close();
        }
    
        function truncate_WEB_OrdenesCorte(){
            $GLOBALS['sql'] = "TRUNCATE TABLE WEB_OrdenesCorte";
        }

        function insert_WEB_OrdenesCorte($IdOrdenCorte,$IdLote,$Huerta,$Nombre,$Chofer,$Placas,$Ticket,$PesoBruto,$PesoTara,$TaraCajas,$PesoMuestra,
            $PesoNeto,$COPREF,$Cancelado,$FechaProduccion,$Estatus,$GlobalGap,$GGN,$JefeCuadrilla,
            $JefeAcopio){
        $sentence_sql="insert into WEB_OrdenesCorte(IdOrdenCorte,IdLote,Huerta,Nombre,Chofer,Placas,Ticket,PesoBruto,PesoTara,TaraCajas,PesoMuestra,
            PesoNeto,COPREF,Cancelado,FechaProduccion,Estatus,GlobalGap,GGN,JefeCuadrilla,
            JefeAcopio)
            values('$IdOrdenCorte','$IdLote','$Huerta','$Nombre','$Chofer','$Placas','$Ticket','$PesoBruto','$PesoTara','$TaraCajas','$PesoMuestra',
                '$PesoNeto','$COPREF','$Cancelado','$FechaProduccion','$Estatus','$GlobalGap','$GGN','$JefeCuadrilla',
                '$JefeAcopio')";

        if($GLOBALS['conexion']->query($sentence_sql)){
            echo "Datos guardados correctamente";
        }
        else{
            echo "Error Alta";
        }
    }
    }

?>