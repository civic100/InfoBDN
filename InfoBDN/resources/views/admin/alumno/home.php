<header class="header-menu">
            <?php
                Generarmenu();
            ?>
        </header>

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
            <div class="box">
                <?php
                    //Realizamos la conexión a la bbdd 
                    $conexion=ConecxionBBDD ();
                    if($conexion == false){
                        mysqli_connect_errno();
                    }
                    else{
                        //Realizamos la consulta a la bbdd para mostrar todos los datos de la tabla empleados
                        $sql = "SELECT * FROM cursos where fechainicio > curdate() ";
                        $consulta = mysqli_query($conexion, $sql);

                        if ($consulta== false){
                            mysqli_error($conexion); 
                        }
                        else{
                            GenerarTablaCursosHomeActivos($consulta);
                        }
                    }
                ?>
            </div>
        </div>