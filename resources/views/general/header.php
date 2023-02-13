
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <link href="//fonts.googleapis.com/css?family=Lobster:400" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <script src="views\css\assets\script.js"></script>
    <div >
      
        <?php
        if(isset($_SESSION["Alumno"])){
            ?>
            <div > 
                <nav>
                    <ul>
                     <li class="usuarioLi"><a href="#" class="usuarioLink">
                     </a>
                        <ul>
                            <li><a href="index.php?controller=Cliente&action=editarPerfil&correo=<?php echo $_SESSION["Alumno"]; ?>">Editar Perfil</a></li>
                            <li><a href='index.php?controller=Base&action=salir'>Cerrar Sesion</a></li>
                        </ul>
                     </li>
                    </ul>
                </nav>
            </div>
            <?php
        }else{
            ?>
                <div> <a href='index.php?controller=Alumno&action=login'> Inicia Sesion</a> </div>
                <div> <a href='index.php?controller=Curso&action=listado'>Todos los Cursos</a></div>
                 <div> <a href='index.php?controller=Profesor&action=listado'>Todos los Profesores</a></div>
            <?php
        }
        ?>

      
        
            
    </div>