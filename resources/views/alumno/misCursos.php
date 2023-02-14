    
    <div class="Titulo"> 
        <div class="Titulo-Home"> <h1 class="Titulo-Home">Centro Academico InfoBDN</h1> </div>
        <div class="Texto-Home"> <p class="Texto-Home">InfoBDN es una plataforma de aprendizaje en línea. Está dirigido a adultos profesionales.</p> </div>
    </div>

    <div class="Titulo-Home-Cursos"> 
        <h1 class="Titulo-Home-Cursos">Mis cursos</h1> 

    </div>
        
    <div class="Contenedor-Cursos">
            <?php
                foreach($listaMisCursos as $persona => $campo){
                    echo"<table>";
                    echo "<tr>";
                    echo"<th>Curso</th>";
                    echo"<th>Nota</th>";
                    echo "<tr>";
                    if($campo->activo =='1'){
                        //Imprimimos los profesores activos.
                        echo "<td>".$campo->nombre."</td>";
                        echo "<td>".$campo->nota."</td>";
                        echo "<tr>"; 
                    }
                echo "</tr>";
                echo"</table>";  
                }
            ?>
    </div>