<div> 
        <div> <h1>Centro Academico InfoBDN</h1> </div>
        <div> <p>InfoBDN es una plataforma de aprendizaje en línea. Está dirigido a adultos profesionales.</p> </div>
    </div>

    <div> 
        <h1>Todos los Profesores</h1> 

    </div>
        
    <div>
            <?php
                foreach($lista as $persona => $campo){
                echo"<table>";
                echo "<tr>";
                    echo "<tr>";
                    if($campo->activo =='1'){
                        //Imprimimos los profesores activos.
                            echo "<td> <img width='50' height='50' src=".$campo->foto."</td>";
                            echo "</br>";
                            echo "<td>".$campo->nombre."</td>";
                            echo "<td>".$campo->apellido."</td>";
                            echo "<td>".$campo->tituloacademico."</td>";
                        }
                    }
                    echo "</tr>";
                    echo"</table>";  
                ?>
        </div>