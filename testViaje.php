<?php 

include 'viaje.php';
include 'pasajero.php';
include 'responsableV.php';

echo "****************************************************************\n";
echo "Bienvenido al creador de viaje.\n";
echo "****************************************************************\n";
echo "Ingrese el código del viaje: ";
$codigo = trim(fgets(STDIN));
echo "Ingrese el destino del viaje: ";
$destino = trim(fgets(STDIN));
echo "Ingrese el cupo del viaje: ";
$cupo = trim(fgets(STDIN));

$viaje = new Viaje($codigo,$destino,$cupo);

echo "================================================================\n";
echo "Ingrese el nombre del responsable del viaje: ";
$nombre = trim(fgets(STDIN));
echo "Ingrese el apellido del responsable del viaje: ";
$apellido = trim(fgets(STDIN));
echo "Ingrese el número de empleado: ";
$numEmpleado = trim(fgets(STDIN));
echo "Ingrese el número de licencia: ";
$numLicencia = trim(fgets(STDIN));

$responsable = new ResponsableV($nombre, $apellido, $numEmpleado, $numLicencia);

$opcion = 99;

while ($opcion!=0){
    echo "================================================================\n";
    echo "Menu de opciones\n";
    echo "1) Modificar código del viaje\n";
    echo "2) Modificar destino del viaje\n";
    echo "3) Modificar el cupo del viaje\n";
    echo "4) Agregar pasajeros\n";
    echo "5) Modificar pasajeros\n";
    echo "6) Eliminar pasajeros\n";
    echo "7) Ver pasajeros\n";
    echo "8) Ver datos del responsable del viaje\n";
    echo "9) Ver datos del viaje\n";
    echo "0) Salir\n";
    echo "================================================================\nIngrese una opción: ";
    $opcion = trim(fgets(STDIN));
    switch ($opcion){
        case 1:
            echo "Ingrese el nuevo código del viaje: ";
            $codigo = trim(fgets(STDIN));
            $viaje->setCodigo($codigo);
            break;
        
        case 2:
            echo "Ingrese el nuevo destino del viaje: ";
            $destino = trim(fgets(STDIN));
            $viaje->setDestino($destino);
            break;

        case 3:
            echo "Ingrese el nuevo cupo del viaje: ";
            $cupo = trim(fgets(STDIN));
            $viaje->setCupo($cupo);
            break;

        case 4:
            if ($viaje->getCantPasajeros()<$viaje->getCupo()){
                echo "Ingrese el nombre del pasajero: ";
                $nombre = trim(fgets(STDIN));
                echo "Ingrese el apellido: ";
                $apellido = trim(fgets(STDIN));
                echo "Ingrese el DNI: ";
                $dni = trim(fgets(STDIN));
                echo "Ingrese el número de teléfono: ";
                $numTelefono = trim(fgets(STDIN));
                $pasajero = new Pasajero($nombre, $apellido, $dni, $numTelefono);
                $mensaje = $viaje->agregarPasajero($pasajero);
                echo $mensaje;
            } else {
                echo "No queda lugares disponibles para el viaje\n";
            }
            break;

        case 5:
            echo "Ingrese el número de DNI del pasajero a modificar: ";
            $dniIndice = trim(fgets(STDIN));
            if ($viaje->existePasajero($dni)){
                echo "Ingrese el nombre del pasajero: ";
                $nombre = trim(fgets(STDIN));
                echo "Ingrese el apellido: ";
                $apellido = trim(fgets(STDIN));
                echo "Ingrese el DNI: ";
                $dni = trim(fgets(STDIN));
                echo "Ingrese el número de teléfono: ";
                $numTelefono = trim(fgets(STDIN));
                $persona = new Pasajero($nombre,$apellido,$dni,$numTelefono);
                $viaje->modificarPasajero($persona,$dniIndice);

            } else {
                echo "No existe el pasajero con ese DNI.\n";
            }
            break;

        case 6:
            echo "Ingrese el número de documento del pasajero que desea eliminar: ";
            $dniIndice = trim(fgets(STDIN));
            if ($viaje->existePasajero($dniIndice)){
                $viaje->eliminarPasajero($dniIndice);
            } else {
                echo "No existe pasajero con ese DNI\n";
            }
            break;

        case 7:
            if ($viaje->getCantPasajeros()==0){
                echo "No hay pasajeros para mostrar.\n";
            } else {
                print_r($viaje->getListaPasajeros());
            }
            break;

        case 8:
            echo $responsable;
            break;
        
        case 9:
            echo $viaje;
            break;
    }
}
?>