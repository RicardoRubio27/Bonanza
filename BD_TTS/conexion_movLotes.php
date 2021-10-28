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
        

        function createTable_MovLotes(){
            $GLOBALS['sql'] = "CREATE TABLE MOV_Lotes(
                `IdLote` int(11) NOT NULL UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                `Referencia` varchar(50) DEFAULT NULL,
                `Fecha` datetime DEFAULT NULL,
                `Ejercicio` varchar(100) NOT NULL,
                `IdMes` tinyint(4) DEFAULT NULL,
                `Dia` tinyint(4) DEFAULT NULL,
                `IdTipoProducto` int(11) DEFAULT NULL,
                `PesoNeto` decimal(14,2) NOT NULL,
                `Observaciones` varchar(200) DEFAULT NULL,
                `Bloqueo` tinyint(4) DEFAULT NULL,
                `Procesado` tinyint(4) DEFAULT NULL,
                `Kilogramos` decimal(14,2) DEFAULT NULL,
                `KilogramosComprados` decimal(14,2) DEFAULT NULL,
                `Perdida` decimal(14,4) DEFAULT NULL,
                `PerdidaUnitario` decimal(14,4) DEFAULT NULL,
                `CostoTotal` decimal(14,4) DEFAULT NULL,
                `GastosTotales` decimal(14,4) DEFAULT NULL,
                `InsumosTotales` decimal(14,4) DEFAULT NULL,
                `CostoPromedio` decimal(14,4) DEFAULT NULL,
                `GastoUnitario` decimal(14,4) DEFAULT NULL,
                `InsumosUnitario` decimal(14,4) NOT NULL,
                `CostoMasGastos` decimal(14,4) DEFAULT NULL,
                `CostoTotalEstimado` decimal(14,4) DEFAULT NULL,
                `CostoPromedioEstimado` decimal(14,4) DEFAULT NULL,
                `CostoMasGastosEstimado` decimal(14,4) DEFAULT NULL,
                `GastosCuentaProductor` decimal(14,4) DEFAULT NULL,
                `TotalPagoProductor` decimal(14,4) DEFAULT NULL,
                `IniciarProceso` tinyint(4) DEFAULT NULL,
                `InicioProceso` datetime DEFAULT NULL,
                `FinalizarProceso` tinyint(4) DEFAULT NULL,
                `FinProceso` datetime DEFAULT NULL,
                `IdLineaProduccion` int(11) DEFAULT NULL,
                `ImporteVenta` decimal(14,2) DEFAULT NULL,
                `Diferencia` decimal(14,2) DEFAULT NULL,
                `DiferenciaEstimada` decimal(14,2) DEFAULT NULL,
                `StatusLote` varchar(20) COMPUTED DEFAULT NULL,
                `Personalizado` varchar(20) DEFAULT NULL,
                `Comercial` tinyint(4) NULL
                `CompacSizer` int(11) NULL
            )";
        if ($GLOBALS['conexion']->query($GLOBALS['sql']) === TRUE) {
            echo "Table PRV_Productores created successfully";
            } else {
            echo "Error creating table: " . $GLOBALS['conexion']->error;
            }
              
            $GLOBALS['conexion']->close();
        }
    
        function truncate_MovLotes(){
            $GLOBALS['sql'] = "TRUNCATE TABLE MOV_Lotes";
        }

        function update_Mov_Lotes($IdLote,$Referencia,$Fecha,$Ejercicio,$IdMes,$Dia,$IdTipoProducto,$PesoNeto,$Observaciones,$Bloqueo,$Procesado,
    $Kilogramos,$KilogramosComprados,$Perdida,$PerdidaUnitario,$CostoTotal,$GastosTotales,$InsumosTotales,$CostoPromedio,
    $GastoUnitario,$InsumosUnitario,$CostoMasGastos,$CostoTotalEstimado,$CostoPromedioEstimado,$CostoMasGastosEstimado,$GastosCuentaProductor,
    $TotalPagoProductor,$IniciarProceso,$InicioProceso,$FinalizarProceso,$FinProceso,$IdLineaProduccion,$ImporteVenta,$Diferencia,$DiferenciaEstimada,$StatusLote,$Personalizado,$Comercial,$CompacSizer){
        $sentence_sql="insert into MOV_Lotes(IdLote,Referencia,Fecha,Ejercicio,IdMes,Dia,IdTipoProducto,PesoNeto,Observaciones,Bloqueo,Procesado,
        Kilogramos,KilogramosComprados,Perdida,PerdidaUnitario,CostoTotal,GastosTotales,InsumosTotales,CostoPromedio,
        GastoUnitario,InsumosUnitario,CostoMasGastos,CostoTotalEstimado,CostoPromedioEstimado,CostoMasGastosEstimado,GastosCuentaProductor,
        TotalPagoProductor,IniciarProceso,InicioProceso,FinalizarProceso,FinProceso,IdLineaProduccion,ImporteVenta,Diferencia,DiferenciaEstimada,StatusLote,Personalizado,Comercial,CompacSizer)
        values('$IdLote','$Referencia','$Fecha','$Ejercicio','$IdMes','$Dia','$IdTipoProducto','$PesoNeto','$Observaciones','$Bloqueo','$Procesado',
        '$Kilogramos','$KilogramosComprados','$Perdida','$PerdidaUnitario','$CostoTotal','$GastosTotales','$InsumosTotales','$CostoPromedio',
        '$GastoUnitario','$InsumosUnitario','$CostoMasGastos','$CostoTotalEstimado','$CostoPromedioEstimado','$CostoMasGastosEstimado','$GastosCuentaProductor',
        '$TotalPagoProductor','$IniciarProceso','$InicioProceso','$FinalizarProceso','$FinProceso','$IdLineaProduccion','$ImporteVenta','$Diferencia','$DiferenciaEstimada','$StatusLote','$Personalizado','$Comercial','$CompacSizer')";

        if($GLOBALS['conexion']->query($sentence_sql)){
            echo "Datos guardados correctamente";
        }
        else{
            echo "Error Alta";
        }
    }
    }

?>