<!DOCTYPE html>
      <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    	<title>Catalogo de Peliculas</title>
  </head>
 <body>
   <div class= "container">
    
     <div class= "header clearfix">
     
       <nav>
         <ul class= "navbar navbar-expand-lg navbar-light bg-light">
       
        <a class="navbar-brand">Home</a></li>
        <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
         
         </ul>
       </nav>
     </div>


	<?php
   	    require_once 'login.php'; //ya sabemos que es esto :)
		   $conn = new mysqli($hn, $un, $pw, $db);
       if ($conn->connect_error){//revisamos errores
  		 die($conn->connect_error);
	     }
  
 	    $_query = "SELECT * FROM db_peliculas";//query de SQL
	   $result = $conn->query($_query); //objeto nuevo
         if (!$result){//revisamos errores
  	      die($conn->error);
         }
         $rows = $result->num_rows; //checamos los rows de informacion
         for ($j = 0 ; $j < $rows ; ++$j){//un loop, lo recuerdas?
  	     $result->data_seek($j);//buscamos la informacion del renglon seleccionando
  	     $row = $result->fetch_array(MYSQLI_ASSOC);//regresa la informaci�n foramateada
		//codigo que repetimos
  	    echo 'Folio: ' . $row['id'] . '<br>';
         echo 'Nombre pelicula: ' . $row['nombre'] . '<br>';
  	    echo 'Tipo de pelicula: ' . $row['tipo_pelicula'] . '<br>';
  	    echo 'Clasificacion: ' . $row['class'] . '<br>';
  	    echo "_____________________<br><br>";
      }
     $result->close();
     $conn->close();


	?>

</div>
	</body>
  
  <body>
    <div class="container"></div>
  <h1>INSERTA NUEVAS PELICULAS </h1>
   <?php
echo <<<_END
   <form method='post' action='add_record.php'>
     Captura todos los campos:<br>
     <input type='text' name='movie_name' size='30'>
     <input type='text' name='movie_type' size='30'>
     <input type='text' name='movie_rate' size='1'>
     <input type='submit' value='Grabar'>
   </form>
   <hr>
_END;
      echo '<p><a href="edit_record.php?id=' . $row['id'] . '">Editar este record</a></p>';
      echo '<p><a href="delete_record.php?id=' . $row['id'] . '">Borrar este record</a></p>';


	?>
</div>
	
	<body> 

 </html>
