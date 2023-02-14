
<div class="Titulo-Home-Cursos"> 
        <h1 class="Titulo-Home-Cursos">Evaluar mis Cursos</h1> 

</div>
<div class="Contenedor-Cursos">
            <?php
  
                foreach($lista as $persona => $campo){
                    echo"<table>";
                    echo "<tr>";
                       
                        //Imprimimos los profesores activos.
                            echo "<td> <img width='50' height='50' src=".$campo->foto."</td>";
                           
                           echo "<td> <a href='index.php?controller=Profesor&action=evaluarNota&codigo=$campo->codigo'> $campo->nombre </a></td> ";
                          
                            
                    echo "</tr>";
                    echo"</table>";  
                    echo "</br>";
                }
            ?>
    </div>