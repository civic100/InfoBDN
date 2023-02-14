
    <div >
      
        <?php
        if(isset($_SESSION["Alumno"])){
            ?>
            <div > 
                <div><p>Hola <?php echo $_SESSION["Alumno"]->nombre; ?></p></div>
                <div><a href="index.php?controller=Alumno&action=editarPerfil&dni=<?php echo $_SESSION["Alumno"]->dni; ?>">Editar Perfil</a></div>
                <div><a href="index.php?controller=Matricula&action=misCursos&dni=<?php echo $_SESSION["Alumno"]->dni; ?>">Mis cursos</a></div> 
                <div><a href='index.php?controller=Base&action=salir'>Cerrar Sesion</a></div> 
            </div>
            <?php
        }elseif(isset($_SESSION["Profesor"])){
            ?>
            <div > 
                <div><p>Hola <?php echo $_SESSION["Profesor"]; ?></p>
                <div><a href="index.php?controller=Profesor&action=editarPerfil&dni=<?php echo $_SESSION["Profesor"]->dni; ?>">Editar Perfil</a></div> 
                <div><a href="index.php?controller=Profesor&action=misCursos&dni=<?php echo $_SESSION["Profesor"]->dni; ?>">Mis cursos</a></div> 
                <div><a href='index.php?controller=Base&action=salir'>Cerrar Sesion</a></div>
            </div>
            <?php

        }else{
            ?>
            <div>
                <div> <a href='index.php?controller=Alumno&action=login'> Inicia Sesion</a> </div>
                <div> <a href='index.php?controller=Base&action=listadoCursos'>Todos los Cursos</a></div>
                <div> <a href='index.php?controller=Base&action=listadoProfesores'>Todos los Profesores</a></div>
            <div>
            <?php
        }
        ?>
       
        <div> <a href='index.php'>Inicio</a></div>
         
            
    </div>