<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.jpg" type="image/x-icon">
    <title>Task-List</title>
</head>
<body>
    <main class="container sm">
        <header id="head" class="row">
            <div class="head bg-success text-light text-center">
                <h1 class="display-4">
                    Tareas    
                </h1>
            </div>
        </header>

        <section id="menu-task" class="row">
            <article id="add-task" class="col-sm-6">
                <div class="form-task">
                    <form action="index.php" method="post" novalidate>
                    <?php
                        include "conexion.php";
                        $Titulo = '';
                        $Descripcion = '';
                        $FechaEntrega = '';
                        if(isset($_POST["titulo"])){
                            $Titulo = $_POST['titulo'];
                            $Descripcion = $_POST['descripcion'];
                            $FechaEntrega = $_POST['fecha'];
                        
                            $error = array();
                            $cont = 0;
                            if(empty($Titulo)){
                                array_push($error, "El campo titulo esta vacio");
                                $cont++;
                            }
                            if(empty($FechaEntrega)){
                                array_push($error, "El campo fecha esta vacio");
                                $cont++;
                            }
                        
                            if(count($error) > 0){ 
                                
                                echo "<br>";
                                echo "<div class='alert alert-danger alert-dismissible fade show p-2'>";
                                    for($i = 0; $i < count($error); $i++){
                                        echo "<li>" . $error[$i] . "</li>";
                                    }
                            }
                            else{
                                $Insert = "INSERT INTO tareas (titulo,descripcion,fecha) VALUES ('$Titulo','$Descripcion','$FechaEntrega')";
                                $con->query($Insert);
                                $con->close();
                                header("refresh:1");
                                echo "<br>";
                                echo "<div class='alert alert-success '>";
                                    echo "<li>" . "Se a agregado una nueva tarea" . "</li>";
                            }
                            echo "</div>";
                        }
                    ?>    
                    <label for="titulo" class="form-label ms-2">Titulo</label>
                        <br>
                    <input type="text" name="titulo" id="titulo" class="form-text ms-2" placeholder="✏Escriba un titulo" value="<?php echo $Titulo; ?>">
                        <br><br>
                    <label for="descripcion" class="form-label ms-2">Descripcion</label>
                        <br>
                    <textarea name="descripcion" id="descripcion" cols="25" rows="8" class="form-text ms-2" placeholder="📝Escriba una descripcion" value="<?php echo $Descripcion; ?>"></textarea>
                        <br><br>
                    <label for="fecha" class="form-label ms-2">Fecha</label>
                        <br>
                    <input type="date" name="fecha" id="fecha" class="form ms-2" value="<?php echo $FechaEntrega; ?>">
                        <br><br>
                    <button class="btn btn-outline-success ms-2" type="submit" name="enviar">Agregar tarea</button>
                        <br><br>
                    </form>
                </div>
            </article>
                
            <article id="tasks" class="col-sm-6">
                <div class="list">
                <?php
                    include 'conexion.php';
                    $sql = "SELECT id, titulo, descripcion, fecha FROM tareas";
                    $datos = $con->query($sql);
                    while($row = $datos->fetch_assoc()){ 
                ?>  
                    <br>
                    <!--card para representar la informacion-->                
                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row ['titulo']?></h5>
                            <p class="card-text">
                                <p><?php echo $row ['descripcion']?></p>
                                <p><?php echo $row ['fecha']?></p>
                            </p>
                            <a href="modificartarea.php?id=<?php echo $row['id'] ?>"><button class="btn btn-outline-warning">⚠</button></a>
                            <a href="eliminartarea.php?id=<?php echo $row['id'] ?>"><button class="btn btn-outline-danger" >❌</button></a>
                        </div>
                    </div>
                    <br>
                <?php    
                    }
                ?>
                </div>
            </article>
        </section>
    </main>
   
    
</body>
</html>


