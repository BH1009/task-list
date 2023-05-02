<?php
include "conexion.php";
if(isset($_POST["titulo"])){
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Modificar tarea</title>
</head>
<body>
    
    <main id="update" class="container sm">
        <head class="header">
            <h1 class="display-1 bg-success text-light text-center">Editar tarea</h1>
        </head>
        <article id="update-task" class="row-sm-12">
            <div id="mod-task">
                <form class="form-task" action="modificartarea2.php" method="POST">
                    <?php
                        $Clave = $_GET['id'];
                        include 'conexion.php';
                        $sql = "SELECT titulo, descripcion, fecha FROM tareas WHERE id=$Clave";

                        $datos = $con->query($sql);
                        while($row =$datos->fetch_assoc()){
                    ?>  
                        <input type="hidden" name="id" value="<?php echo $Clave ?>">
                        <label for="titulo" class="form-label ms-2">Titulo</label>
                            <br>
                        <input class="form-text ms-2" type="text" name="titulo"  id="titulo" value="<?php echo $row ['titulo']?>" >
                            <br><br>
                        <label for="descripcion" class="form-label ms-2">Descripcion</label>
                            <br>
                        <textarea class="form-text ms-2" name="descripcion" id="descripcion" cols=25" rows="8" value="<?php echo $row ['descripcion']?>"><?php echo $row ['descripcion']?></textarea>
                            <br><br>
                        <label for="fecha" class="form-label ms-2">Fecha</label>
                        <br>
                        <input class="form-text ms-2" type="date" name="fecha" value="<?php echo $row ['fecha']?>">
                            <br><br>
                        <button class="btn btn-outline-primary ms-2" href="index.php">⬅Regresar</button>
                        <button class="btn btn-outline-success ms-2" type="submit">💾Guardar</button>            
                    <?php
                        }
                    ?>
                </form>  
            
            </div>
        </article>
        
    </main>
   
</body>
</html>

