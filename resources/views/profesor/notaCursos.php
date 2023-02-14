

    <div class="Titulo-Home-Cursos"> 
        <h1 class="Titulo-Home-Cursos">Evaluar mis cursos</h1> 

    </div>
        
    <div class="Contenedor-Cursos">
            <?php
                foreach($lista as $persona => $campo){
                    echo"<table>";
                    echo "<tr>";
                    echo"<th>DniAlumno</th>";
                    echo"<th>Curso</th>";
                    echo"<th>Nota</th>";
                    echo "<tr>";
                
                        //Imprimimos los profesores activos.
                        echo "<td>".$campo->dni_alumno."</td>";
                        echo "<td>".$campo->curso."</td>";
                        echo "<td>".$campo->nota."</td>";
                        echo "<tr>"; 

                        echo "<td> <a href='index.php?controller=Profesor&action=ponerNota&dni=$campo->dni_alumno&curso=$campo->curso'> Poner nota </a></td> ";

                echo "</tr>";
                echo"</table>";  
                }
            ?>
    </div>