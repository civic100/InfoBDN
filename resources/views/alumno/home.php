    
    <div class="Titulo"> 
        <div class="Titulo-Home"> <h1 class="Titulo-Home">Centro Academico InfoBDN</h1> </div>
        <div class="Texto-Home"> <p class="Texto-Home">InfoBDN es una plataforma de aprendizaje en línea. Está dirigido a adultos profesionales.</p> </div>
    </div>

    <div class="imagen-Profe"><br></div>

    <div class="Fondo-Home">
            <div class="Titulo-Contenedor-Home"> <h2 class="Titulo-Contenedor-Home">Investigar</h2></div>
            <div class="SubTitulo-Contenedor-Home"> <h3 class="SubTitulo-Contenedor-Home">Una amplia selección de cursos</h3></div>
            <div class="Texto-Contenedor-Home"> <p class="Texto-Contenedor-Home">Elige entre más de 204.000 cursos de vídeo en línea con nuevo contenido cada mes.</p></div>
    </div> 

    <div class="Titulo-Home-Cursos"> 
        <h1 class="Titulo-Home-Cursos">Todos los Cursos</h1> 

    </div>
        
    <div class="Contenedor-Cursos">
            <?php
  
                foreach($lista as $persona => $campo){
                    echo"<table>";
                    echo "<tr>";
                       
                        //Imprimimos los profesores activos.
                            echo "<td> <img width='50' height='50' src=".$campo->foto."</td>";
                           
                            echo "<td>".$campo->nombre."</td>";
                            echo "<td>".$campo->descripcion."</td>";
                            echo "<td>".$campo->fechainicio."</td>";
                            echo "<td>".$campo->fechafinal."</td>";
                                //Seguir editando
                           echo "<td> <a href='index.php?controller=Matricula&action=altaCurso&codigo=$campo->codigo'>Darme de alta</a></td> ";
                          
                            
                    echo "</tr>";
                    echo"</table>";  
                    echo "</br>";
                }
            ?>
    </div>