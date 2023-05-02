<?php
include "conexion.php";
$Clave = $_POST['id'];
$Titulo = $_POST['titulo'];
$Descripcion = $_POST['descripcion'];
$FechaEntrega = $_POST['fecha'];

$Update = "UPDATE tareas SET titulo='$Titulo' , descripcion='$Descripcion' , fecha='$FechaEntrega' WHERE id=$Clave";
$con->query($Update);
$con->close();

echo "<div class='alert alert-success '>";
echo "<li>" . "Se a modificado la tarea" . "</li>";
echo "</div>";
header("Refresh:1");

header('Location:index.php');

/*
<?php
                    include "conexion.php";
                    if(isset($_POST["titulo"])){
                        $Clave = $_POST['id'];
                        $Titulo = $_POST['titulo'];
                        $Descripcion = $_POST['descripcion'];
                        $FechaEntrega = $_POST['fecha'];

                        $Update = "UPDATE tareas SET titulo='$Titulo' , descripcion='$Descripcion' , fecha='$FechaEntrega' WHERE id=$Clave";
                        $con->query($Update);
                        $con->close();

                        echo "<div class='alert alert-success '>";
                        echo "<li>" . "Se a modificado la tarea" . "</li>";
                        echo "</div>";
                        header("Refresh:1");

                    }    
                ?> 
*/