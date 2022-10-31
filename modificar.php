<!-- 1.Conexion. Almacenamos los datos del envio POST -->
<?php
$conexion=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($conexion,"tienda de ropa");

// <!-- 2.almacenamos los datos del envio GET.-->

$id = $_GET['id'];

// <!-- 3.Preparar la orden SQL y generar la consulta en la tabla ropa a realizar-->

$consulta = "SELECT * FROM 'ropa' WHERE 'id'=$id";

// <!-- 4. ejecutar la orden y almacenamos en una variable el resultado-->

$respuesta = mysqli_query ($conexion, $consulta);

// <!-- 5. transformamos el registro obtenido a un array-->
$datos = mysqli_fetch_array ($respuesta);
 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Tienda de Ropa</title>
   </head>
  </body>
  <?php
// <!-- 5.Asignamos a diferentes variables los respectivos valores-->
$tipo de prenda=$datos['tipo de prenda'];
$marca =$datos['marca'];
$talle =$datos['talle'];
$precio =$datos['precio'];
$imagen =$datos['imagen'];?>
<h2>Modificar</h2>
<p>Ingrese los nuevos datos de la prenda</p>
<form class="" action="index.html" method="post">
  <form  action="" method="POST" enctype="multipart/form-data">
  <label>Tipo de prenda</label>
  <input type="text" name="tipo de prenda" placeholder="Tipo de prenda" value="<?php echo "$tipo de prenda";?>">
  <label>Marca</label>
  <input type="text" name="marca"placeholder="Marca" value="<?php echo "$marca";?>">
  <label>Talle</label>
  <input type="text" name="talle" placeholder="Talle" value="<?php echo "$talle";?>">
  <label>Precio</label>
  <input type="text" name="precio" placeholder="Precio" value="<?php echo "$precio";?>">
  <label>Imagen</label>
  <input type="file" name="imagen" placeholder="imagen">
  <input type="submit" name="guardar_cambios" value="Guardar cambios">
  <button type="submit" name="Cancelar" formaction="index.html">Cancelar</button>
  </form>

<?php

if (array_key_exists('guardar_cambios',$_POST)) {

  $conexion=mysqli_connect("127.0.0.1","root","");
  mysqli_select_db($conexion,"tienda de ropa");

  $tipo de prenda=$_POST ['tipo de prenda'];
  $marca=$_POST['marca'];
  $talle=$_POST['talle'];
  $precio=$_POST['precio'];
  $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

  $consulta = "UPDATE ropa SET tipo de prenda WHERE id=$id?='$tipo de prenda', marca='$marca', talle='$talle', precio='$precio',";

  mysqli_query ($conexion, $consulta);

  header ('location:index.html');

}

 ?>

</html>
