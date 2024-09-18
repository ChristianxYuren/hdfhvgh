<?php
        $username="root";
        $password="";
        $servername="localhost";
        $database="nba";

        //crear conexion
        $conexion = new mysqli($servername,$username,$password,$database);

        //verificar la conexion
        if($conexion->connect_error){
            die("conexion fallida:".$conexion->connect_error);

        }
        $sql="SELECT * FROM jugadores"
        $resultado=$conexion->query($sql);
        $conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar datos de la base de datos</title>
</head>
<body>
    <style>
        body{
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            background-color: cornflowerblue;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            height: 100px;
        }
        h1{
            text-align: center;
            color:bisque;
            margin-bottom: 20px;
        }
        table{
            width:100;
            border-collapse:collapse;
            margin-top:50px;
        }
        th, td{
            padding:10px;
            text-aling:left;
            border-botton
        }
    </style>
    <div class="container">
        <h1>Datos del jugador de la NBA</h1>
       <?php

       if($resultado->num_rows >0):?>
       <table>
        <tr>
            <th>Nombre</th>
        </tr>
        <?php while ($fila = $resultado->fetch_assoc()):?>
            <tr>
                <td><?php echo $fila['nombre'];?></td>
                <td><?php echo $fila['apodo'];?></td>
                <td><?php echo $fila['equipo'];?></td>
                <td><?php echo $fila['posicion'];?></td>
                <td><?php echo $fila['altura'];?></td>
                <td><?php echo $fila['peso'];?></td>
                <td><?php echo $fila['numero'];?></td>
                <td><?php echo $fila['edad'];?></td>
                <td><?php echo $fila['nacionalidad'];?></td>
                <td><?php echo $fila['puntos'];?></td>
            </tr>
            <?php   endwhile;?>
       </table>
       <?php else: ?>
        <p>No se encontraron jugadores</p>
        <?php ?>
    </div>
</body>
</html>