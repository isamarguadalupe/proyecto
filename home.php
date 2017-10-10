<html>
<center>
  <head>
PRACTICA
  <title>FORMULARIO</title>
  </head>
  <body>
      <form name="autoress" method="POST" action="">
  <div>
  <label>Ingresar id del autor: </label>
  <input type="int" name="id_autor">
  </div>
  <div>
  <label>Ingresar Nombre del autor: </label>
  <input type="text" name="nombre_autor">
  </div>
  <input type="submit" name="guardar" value="Guardar">
   <input type="submit" name="eliminar" value="Eliminar">
  </form>
</center>
    <?php
  if (isset($_POST['guardar']))
  {
  $id_autor=$_POST['id_autor'];
  $nombre_autor=$_POST['nombre_autor'];
   if($id_autor=="")
    echo "Ingrese datos completos";
$mysqli= new mysqli("localhost","root","","biblioteca");

  $datos="INSERT INTO autores(id_autor,nombre_autor) VALUES ('$id_autor','$nombre_autor')";
  $result= $mysqli->query($datos);

  }
  if (isset($_POST['eliminar']))
  {
  $conexion=@mysql_connect("localhost","root","") or
  die("Problemas en la conexion");
 
mysql_select_db("biblioteca",$conexion) or
  die("Problemas en la selección de la base de datos");
 
$registros=mysql_query("select id_autor from autores
                       where id_autor='$_REQUEST[id_autor]'",$conexion) or
  die("Problemas en el select:".mysql_error());
if ($reg=mysql_fetch_array($registros))
{
  mysql_query("delete from autores where id_autor='$_REQUEST[id_autor]'",$conexion) or
    die("Problemas en el select:".mysql_error());
  echo "Se efectuó el borrado del autor.";
}
else
{
  echo "No existe un cliente con ese id.";
}
mysql_close($conexion);
}
  ?>
  </body>
</html>