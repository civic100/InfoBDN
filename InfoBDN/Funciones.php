<?php
/*
*
generar barra de menu
*
*/
function  Generarmenu(){
    ?>
    <div class="txt-logo">InfoBDN</div>
    <div><img class="img-logo" src="adhesivo-badamoni.jpg" alt=""></div>
    <?php
    // Menú para alumnos
    if(!empty ($_SESSION['dni'])){
    ?>
    <div>
        <nav>
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="MostrarProfesores.php">Profesores</a></li>
                <li><a href="Mostrar-MisCursos.php">Mis Cursos</a></li>
                <li><a href="Salir.php">Salir</a></li>
                <li> <?php echo($_SESSION['nombre']) ; ?> </li>
                <li> <?php echo( " <a href=PerfilAlumno.php?><img class='img-sesion' src=". $_SESSION['imagen']."></a>" ) ;?> </li>
            </ul>
        </nav>
    </div>
   
    <?php
    // Menú para profesores
    }elseif(!empty ($_SESSION['dniprofesor'])){
    ?>
    <div>
        <nav>
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="EvaluacionesAlumnos.php">Evaluaciones</a></li>
                <li><a href="Salir.php">Salir</a></li>
                <li> <?php echo($_SESSION['nombre']) ; ?> </li>
                <li> <?php echo( "<img class='img-sesion' src=". $_SESSION['imagen'].">" ) ;?> </li>
            </ul>
        </nav>
    </div>

    <?php
      // Menú para Admin
        }elseif(!empty ($_SESSION['admin'])){
            ?>
            <div>
                <nav>
                    <ul>
                        <li><a href="InicioAdmin.php">Inicio</a></li>
                        <li><a href="CursosAdmin.php">Cursos</a></li>
                        <li><a href="ProfesoresAdmin.php">Profesores</a></li>
                        <li><a href="Salir.php">Salir</a></li>
                    </ul>
                </nav>
            </div>
            <?php
    // Menú para usuarios no registrados/logeados.
    }else{
    ?>
    <div>
    <nav>
        <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="MostrarProfesores.php">Profesores</a></li>
            <li><a href="MostrarCursos.php">Cursos</a></l>
            <li><a href="Login.php">Login</a></li>
            <li><a href="RegistroUsuarios.php">Registrarte</a></li>
        </ul>
    </nav>
    </div>
    <?php
    }
}


/*
*
Conexión a la base de datos.
*
*/
function ConecxionBBDD (){
     $conexion = mysqli_connect("localhost","root","","infobdn");
    return $conexion; 
}

/*
*
Validar el inicio de sesión del usuario Admin.
*
*/
function ValidarLoginAdmin($conexion,$dni,$pasencript){
    //En la siguiente consulta comprobamos los datos introducidos en la bbdd del usuario Admin.
    $sql = "SELECT * FROM administrador WHERE dni = '$dni' AND contraseña = '$pasencript'";
    $consulta = mysqli_query($conexion, $sql);

    //Si son correctos ejecuta esta parte de código redireccionado a la página de edición del Admin.
    if(mysqli_num_rows($consulta)>0){
        //Generamos la variable de sesión de Admin.
        $_SESSION['admin'] = $dni;
        ?>  
            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=InicioAdmin.php"/>
        <?php

    //En caso contrario ejecutamos esta parte del código recargando la página
    }else{
        print("Contraseña o correo electrónico erróneos");
        ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=LoginAdmin.php"/>
        <?php
        }
        mysqli_close($conexion);
    }

/*
*
Tabla de los cursos en la página de Admin
*
*/   
function generarTablaCursos($consulta){
    //función para contar las filas generadas por la consulta
    $numlinies = mysqli_num_rows($consulta);
    echo ("Hi ha ".$numlinies." Cursos");
    echo"<table>";
    echo "<tr>";
    echo"<th>Eliminar</th>";
    echo"<th>Editar</th>";
    echo"<th>Codi</th>";
    echo"<th>Nombre</th>";
    echo "<th>descripcio</th>";
    echo "<th>horadurada</th>";
    echo "<th>datainici</th>";
    echo "<th>datafi</th>";
    echo "<th>profesor</th>";
    echo "<th>Activo</th>";
    echo "<th>Foto</th>";
    echo "</tr>";
    foreach($consulta as $curso => $campo){
        //Guardamos en la variable CodiCurso el código del curso para su posterior uso.
        $CodiCurso=$campo["codigo"];
        echo "<tr>";

        //Comprobamos por el campo activo de la base de datos, si este está a 1 o 0 dependiendo de este valor se mostrará la opción de activarlo o desactivarlo
        if($campo['activo']=='0'){ echo "<td> <a href=ActivarCursos.php?CodigoCurso=$CodiCurso>Activar</a></td>"; } 
        else{ echo "<td> <a href=EliminarCursos.php?CodigoCurso=$CodiCurso>Desactivar</a></td>"; }

        //Mostramos la opción de editar el curso pasándole la variable anteriormente guardada.
        echo "<td> <a href=EditarCursos.php?CodigoCurso=$CodiCurso>Editar</a></td>";
        
        //Imprimimos todos los datos de los empleados 
        foreach($campo as $dato => $dato1){
            if($campo['foto']==$dato1){
                echo "<td> <img width='50' height='50' src=".$dato1."></td>";
            }else{
                echo "<td> $dato1 </td>";
            }
        }
    }
    echo "</tr>";
    echo"</table>";   
    echo "</br>";
   
}

/*
*
Código para desactivar el curso seleccionado.
*
*/   
function EliminarCursos($id,$conexion){
    //Actualizamos el valor del campo activo de la base de datos a 0.
    $sql = "UPDATE cursos SET activo = '0' WHERE codigo = '$id'";
    $activo = mysqli_query($conexion, $sql);
}
/*
*
Código para activar el curso seleccionado.
*
*/  
function ActivarCursos($id,$conexion){
    //Actualizamos el valor del campo activo de la base de datos a 1.
    $sql = "UPDATE cursos SET activo = '1' WHERE codigo = '$id'";
    $activo = mysqli_query($conexion, $sql);
}

/*
*
Añadir Curso.
*
*/ 
function AñadirCurso($conexion,$NombreCurso,$Descripcion,$duracion,$fechaincio, $fechafin ,$profesor, $nombreDirectorio){
    $sql = "SELECT * FROM cursos WHERE nombre = '$NombreCurso'";
    $consulta = mysqli_query($conexion, $sql);

    //Comprobamos si el curso ya está en la base de datos, en caso de que este ejecutamos el código dentro del if.
    if(mysqli_num_rows($consulta)>0){
        print("Este Curso ya esta registrado.");
        ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=AñadirCurso.php"/>
        <?php  
    //Si es un nuevo curso ejecutamos esta parte del código.         
    }else{
        $sql = "INSERT INTO cursos (codigo, nombre, descripcion, horas, fechainicio, fechafinal, profesor,foto) VALUES ('NULL','$NombreCurso', '$Descripcion', '$duracion', '$fechaincio', '$fechafin', '$profesor','$nombreDirectorio')";
        //Controlamos que se guarde correctamente.
        if (mysqli_query($conexion, $sql)) {
            echo "Nuevo Curso registrado";
            ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=CursosAdmin.php"/>
            <?php
        } else {mysqli_connect_errno();}
            //Y al terminar el registro del curso redirigimos a la misma página para continuar.
    }
    mysqli_close($conexion);
}

/*
*
Editar Curso.
*
*/ 
function EditarCurso($id,$conexion,$codigo,$NombreCurso,$Descripcion,$duracion,$fechaincio, $fechafin ,$profesor){ 
    //Se realiza un update con los valores pasados
    $sql = "UPDATE cursos SET codigo = '$codigo', nombre = '$NombreCurso', descripcion = '$Descripcion' , horas = '$duracion', fechainicio = '$fechaincio', fechafinal = '$fechafin', profesor ='$profesor' WHERE codigo = '$id' ";
    //Y al terminar el registro del curso redirigimos a la misma página para continuar.
    if (mysqli_query($conexion, $sql)) {
        echo "Nuevo Curso actualizado";
        ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=CursosAdmin.php"/>
        <?php
    } else { mysqli_connect_errno(); }
    mysqli_close($conexion);
}

/*
*
Tabla de los profesores en la página de Admin
*
*/ 
function generarTablaProfesores($consulta){
    $numlinies = mysqli_num_rows($consulta); 
    echo ("Hi ha ".$numlinies." Profesors");
    echo"<table>";
    echo "<tr>";
    echo"<th>Eliminar</th>";
    echo"<th>Editar</th>";
    echo"<th>DNI</th>";
    echo"<th>Nombre</th>";
    echo "<th>Apellido</th>";
    echo "<th>Titol academic</th>";
    echo "<th>Foto</th>";
    echo "<th>Activo</th>";
    echo "</tr>";
    foreach($consulta as $persona => $campo){
        $CodiProfesor=$campo["dni"];
        echo "<tr>";
        if($campo['activo']=='0'){
            echo "<td> <a href=ActivarProfesor.php?CodigoProfesor=$CodiProfesor>Activar</a></td>";
        } 
        else{
            echo "<td> <a href=EliminarProfesor.php?CodigoProfesor=$CodiProfesor>Desactivar</a></td>";
        }    
        echo "<td> <a href=EditarProfesor.php?CodigoProfesor=$CodiProfesor>Editar</a></td>";
        echo "<td>" .$campo['dni']. "</td>";
        echo "<td>" .$campo['nombre']. "</td>";
        echo "<td>" .$campo['apellido']. "</td>";
        echo "<td>" .$campo['tituloacademico']. "</td>";
        echo "<td> <img width='50' height='50' src=".$campo['foto']."></td>";
        echo "<td>" .$campo['activo']. "</td>";

    }
    echo "</tr>";
    echo"</table>";   
    echo "</br>";
    
}


/*
*
Añadir Profesor.
*
*/ 
function AñadirProfesor($conexion,$DniProfesor,$NombreProfe,$ApellidoProfe,$Tituloacademico, $nombreDirectorio ,$pasencript){
    $sql = "SELECT * FROM alumnos WHERE dni = '$DniProfesor'";     
    $sql2 = "SELECT * FROM profesores WHERE dni = '$DniProfesor'";
    $consulta2 = mysqli_query($conexion, $sql2);    
    $consulta = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($consulta)>0 || mysqli_num_rows($consulta2)>0 ){
        print("Este Dni ya esta registrado.");
        ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=AñadirProfesores.php"/>
        <?php                  
    }else{
        $sql = "INSERT INTO profesores (dni, nombre, apellido, tituloacademico, foto, contraseña) VALUES ('$DniProfesor', '$NombreProfe', '$ApellidoProfe', '$Tituloacademico', '$nombreDirectorio', '$pasencript')";
        if (mysqli_query($conexion, $sql)) {
            ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=ProfesoresAdmin.php"/>
            <?php   
        } else { mysqli_connect_errno(); }
    }
    mysqli_close($conexion);  
}

/*
*
Código para desactivar el profesor seleccionado.
*
*/  
function EliminarProfesores($id,$conexion){
    $sql = "UPDATE profesores SET activo = '0' WHERE dni = '$id'";
    $consulta = mysqli_query($conexion, $sql);
    $sql2 = "UPDATE cursos SET activo = '0' WHERE profesor = '$id'";
    $consulta2 = mysqli_query($conexion, $sql2);
}

/*
*
Código para activar el profesor seleccionado.
*
*/  
function ActivarProfesor($id,$conexion){
    $sql = "UPDATE profesores SET activo = '1' WHERE dni = '$id'";
    $consulta = mysqli_query($conexion, $sql);
    $sql2 = "UPDATE cursos SET activo = '1' WHERE profesor = '$id'";
    $consulta2 = mysqli_query($conexion, $sql2);
}
    
/*
*
Editar Profesor.
*
*/
function EditarProfesor($conexion,$DniProfesor,$NombreProfe,$ApellidoProfe,$Tituloacademico, $Foto){  
    $sql = "UPDATE profesores SET nombre = '$NombreProfe', apellido = '$ApellidoProfe' , tituloacademico = '$Tituloacademico', foto = '$Foto' WHERE dni = '$DniProfesor' ";
    if (mysqli_query($conexion, $sql)) {
        echo "Nuevo Curso editado";
        ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=ProfesoresAdmin.php"/>
        <?php
    } else { mysqli_connect_errno(); }
    mysqli_close($conexion);
}

/*
*
Validar LoginAlumnos/LoginProfesores.
*
*/
function ValidarLogin($conexion,$dni,$pasencript){
    //En la siguente consulta comprobamos los datos introducidos en la bbdd.
    $sql = "SELECT * FROM alumnos WHERE dni = '$dni' AND contraseña = '$pasencript'";
    $consulta = mysqli_query($conexion, $sql);
    
    //si son correctos ejecuta esta parte del código
    if(mysqli_num_rows($consulta)>0){
        //una vez validado generamos la sesion.
        $_SESSION['dni'] = $dni;
        while ($row = $consulta->fetch_assoc()) {
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['imagen'] = $row['foto'];
        }
        ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Home.php"/>
        <?php
    //si no son correctos ejecuta esta parte del código y asi comprarlo en la tabla profesores.
    }else{   
        $sql2 = "SELECT * FROM profesores WHERE dni = '$dni' AND contraseña = '$pasencript'";
        $consulta2 = mysqli_query($conexion, $sql2);
        if(mysqli_num_rows($consulta2)>0){
            //una vez validado generamos la sesion.
            $_SESSION['dniprofesor'] = $dni;
            while ($row = $consulta2->fetch_assoc()) {
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['imagen'] = $row['foto'];
            }
            ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Home.php"/>
            <?php
        }else{
            print("Contraseña o correo electrónico erróneos");
            ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=Login.php"/>
            <?php
            mysqli_close($conexion);
        }
    }
}

/*
*
Validar Regsitro.
*
*/
function ValidarRegistro($conexion,$dni,$pasencript,$Nom,$Cognoms,$directorio,$Edat){
        // comprobamos que no exista en ninguna de las dos tablas.
        $sql = "SELECT * FROM alumnos WHERE dni = '$dni'";     
        $sql2 = "SELECT * FROM profesores WHERE dni = '$dni'";
        $consulta2 = mysqli_query($conexion, $sql2);    
        $consulta = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($consulta)>0 || mysqli_num_rows($consulta2)>0 ){
            print("Este Dni ya esta registrado.");
            ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=http://localhost/InfoBDN/RegistroUsuarios.php"/>
            <?php              
        }else{
            //Si el correo no está registrado, hacemos un insert de los datos introducidos a la base de datos
            $sql = "INSERT INTO alumnos (dni, nombre, apellido, edad, foto, contraseña) VALUES ('$dni', '$Nom', '$Cognoms',' $Edat','$directorio','$pasencript')";
            //Controlamos que se guarde correctamente.
            if (mysqli_query($conexion, $sql)) {
                    echo "Nuevo Alumno registrado";
                    //una vez validado generamos la sesion.
            } else {
                mysqli_connect_errno();
            }
            //y al terminar el registro redirigimos a la página del menú del portal.
            ?>
                <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=http://localhost/InfoBDN/Login.php"/>
             
            <?php
            }
        mysqli_close($conexion);
}

/*
*
Editar Profesor.
*
*/
function generarTablaProfesores2($consulta){
    //Mostramos la tabla con los empleados actuales
    ?>
        
    <?php
    foreach($consulta as $persona => $campo){
        echo"<table>";
        echo "<tr>";
        echo "<tr>";
        if($campo['activo']=='1'){
            //Imprimimos los profesores activos.
            echo "<td> <img width='200' height='200' src=". $campo['foto'].">" ."<br>".$campo['nombre'] ."<br>".$campo['apellido']."</td>";
            /*echo "<td>" .$campo['nombre'] ."</td>";
            echo "<td>". $campo['apellido']. "</td>";*/
        }
        echo "</tr>";
         echo"</table>"; 
    }
    
}

/*
*
Tabla de los cursos activos.
*
*/
function  GenerarTablaCursosHomeActivos($consulta){
    //Mostramos la tabla con los empleados actuales
    
        foreach($consulta as $persona => $campo){
            echo "<div class='tabla'>";
            echo"<table>";
            echo "<tr>";
            //Saber la fecha actual

            if($campo['activo']=='1'){
                //Imprimimos los profesores activos.
                    echo "<td> <img width='100' height='100' src=".$campo['foto']."></td>";
                    echo "<td>". $campo['descripcion']. "</br>"."</td>";
                    echo "<th>Incio: </th>" . "<td>". $campo['fechainicio']."</br>". "</td>";
                    echo "<th>Fin: </th>" . "<td>". $campo['fechafinal']."</br>". "</td>";
                    $CodiCurso=$campo["codigo"];
                     
                    echo "<td> <a href=DarAltaCursoUsu.php?CodigoCurso=$CodiCurso>Darme de alta</a></td>";
            }
            echo "</tr>";
            echo"</table>";   
            echo "</div>";
    }
    
   
    
}
/*
*
Tabla de todos los cursos.
*
*/
function  GenerarTablaCursosHomeAll($consulta){
    //Mostramos la tabla con los empleados actuales
        $fechaActual = date('Y-m-d');
        foreach($consulta as $persona => $campo){
            //Saber la fecha actual
            echo "<div class='tabla'>";
            echo"<table>";
            echo "<tr>";
               if($fechaActual < $campo['fechainicio']){
                  
                    //Imprimimos los profesores activos.
                        echo "<td> <img width='100' height='100' src=".$campo['foto']."></td>";
                        echo "<td>". $campo['descripcion']. "</br>"."</td>";
                        echo "<th>Incio: </th>" . "<td>". $campo['fechainicio']."</br>". "</td>";
                        echo "<th>Fin: </th>" . "<td>". $campo['fechafinal']."</br>". "</td>";
                        $CodiCurso=$campo["codigo"];
                     
                        echo "<td> <a href=DarAltaCursoUsu.php?CodigoCurso=$CodiCurso>Darme de alta</a></td>";
                }else{
                    echo "<td> <img width='100' height='100' src=".$campo['foto']."></td>";
                    echo "<td>". $campo['descripcion']. "</br>"."</td>";
                    echo "<th>Incio: </th>" . "<td>". $campo['fechainicio']."</br>". "</td>";
                    echo "<th>Fin: </th>" . "<td>". $campo['fechafinal']."</br>". "</td>";

                    echo "<td>El curso ya ha empezado </td>";
                }
            echo "</tr>";
            echo"</table>";   
            echo "</div>";
            
        }
       
    
}




         
/*
*
Dar Alta Cursos matricula
*
*/
function  DarAltaCurso($idAlumno,$idCurso,$conexion){

    $sql = "SELECT * FROM matricula WHERE dni_alumno = '$idAlumno' AND  curso ='$idCurso'"; 

    $consulta = mysqli_query($conexion, $sql);

    //Comprobamos si el curso ya está en la base de datos, en caso de que este ejecutamos el código dentro del if.
    if(mysqli_num_rows($consulta)>0){
        echo "Ya estas inscrito en el curso.";
        ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=Home.php"/>
        <?php  
    //Si es un nuevo curso ejecutamos esta parte del código.         
    }else{
        $sql2 = "INSERT matricula (dni_alumno, curso) VALUES ('$idAlumno','$idCurso')";
        if (mysqli_query($conexion, $sql2)) {
            echo "Te has inscrito al curso.";
            //una vez validado generamos la sesion.
        } else {
            mysqli_connect_errno();
        }
    }
}

/*
*
Desactivar Cursos matricula
*
*/
function DesactivarCurso($idAlumno,$idCurso,$conexion){
    //Actualizamos el valor del campo activo de la base de datos a 1.
    $sql = "DELETE FROM matricula WHERE dni_alumno = '$idAlumno' AND curso = '$idCurso'";
   
    if (mysqli_query($conexion, $sql)) {
        echo "Te has dado de alta del curso.";
        //una vez validado generamos la sesion.
    } else {
        mysqli_connect_errno();
    }
}

/*
*
Tabla mis Cursos
*
*/
function  GenerarTablaMisCursos($conexion,$consulta){
    
        ?>
            <div class="buscador">
                <div class="container-1">
                    <input type="search" id="search" placeholder="Buscador..." />
                </div>
            </div>
        <?php
        foreach($consulta as $persona => $campo){
            echo"<table>";
            echo "<tr>";
            echo"<th>Curso</th>";
            echo"<th>Nota</th>";
            echo"<th>Opcion</th>";
            echo "<tr>";
        
            //Imprimimos los profesores activos.
            /* echo "<td> <img width='50' height='50' src=". $campo['foto'] ."</td>";*/
            echo "</br>";
            $idcurso=$campo['curso'];
            $sql="SELECT nombre FROM cursos WHERE codigo = $idcurso ";
            $consulta = mysqli_query($conexion, $sql);
            $fechaActual = date('Y-m-d'); 
            while($fila=mysqli_fetch_array($consulta)){
                echo "<td>" .$fila['nombre'] ."</td>";
            }
            
            if ( $campo['nota'] == 0){
                echo "<td>"."Sin evaluar"."</td>";
            }else{
                echo "<td>".$campo['nota']. "</td>";
            }
      
            if($campo['activo']=='1'  &&  $campo['nota'] == 0 ){
                echo "<td> <a href=DarbajaCursoUsu.php?CodigoCurso=$idcurso>Desmatricular</a></td>";
            }else{
                echo "<td> Curso Finalizado </td>";
            }
            echo "</tr>";
            echo"</table>";   
         }
}
    


/*
*
Tabla Evaluaciones Profe
*
*/
function GenerarTablaEvaluacionesProfesor($consulta){
 
    foreach($consulta as $persona => $campo){
        //Saber la fecha actual
        $fechaActual = date('Y-m-d');
            echo"<table>";
            echo "<tr>";
            echo"<th>Curso</th>";
            echo"<th>Dni Alumno</th>";
            echo"<th>Nota</th>";
            echo"<th>Opcion</th>";
            echo "<tr>";
            $idalumno=$campo['dni_alumno'];
            $_SESSION['curso'] = $campo['codigo'];
                echo "<td>".$campo['nombre']. "</td>";
                echo "<td>".$campo['dni_alumno']. "</td>";
                echo "<td>".$campo['nota']. "</td>";

                if($fechaActual >  $campo['fechafinal']){
                    echo "<td> <a href=EvaluarAlumno.php?CodigoAlumno=$idalumno >Poner Nota</a></td>";   
                }
                else{
                    echo "<td>El curso aún no ha finalizado</td>";   
                }
            echo "</tr>";
            echo"</table>";   
    }      
}

/*
*
Añadir notas
*
*/
function AddNota ($conexion, $dnialumno,$curso, $nota){

    $sql = "UPDATE matricula SET nota = '$nota'  WHERE dni_alumno = '$dnialumno' AND curso = '$curso'";
    if (mysqli_query($conexion, $sql)) {
    
        ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="2;URL=EvaluacionesAlumnos.php"/>
        <?php
    }else {
        mysqli_connect_errno();
    }
}

/*
*
Editar Perfil Alumno.
*
*/
function EditarPerfilAlumno($conexion,$Dni,$Nombre,$Apellido,$Edad){  
    $sql = "UPDATE alumnos SET nombre = '$Nombre', apellido = '$Apellido' , tituloacademico = '$Edad' WHERE dni = '$Dni' ";
    if (mysqli_query($conexion, $sql)) {
    
        ?>
            <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=ProfesoresAdmin.php"/>
        <?php
    } else { mysqli_connect_errno(); }
    mysqli_close($conexion);
}

/*
*
Tabla Cursos Profesor Evaluacion.
*
*/
function  generarTablaEvaluaciones($consulta){
    
    foreach($consulta as $persona => $campo){
        $Codicurso=$campo["codigo"];
        
        echo " <a href=EvaluacionesAlumnos2.php?Codigocurso=$Codicurso> <img width='100' height='100' src=".$campo['foto']."> </a>";

    }
}

