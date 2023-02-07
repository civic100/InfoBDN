<form action="index.php?controller=Admin&action=validar" method="POST">
                    
    <label for="nombre">Usuario:</label>
    <input type="text"  placeholder="Usuario" name="nombre" id="nombre" autofocus>
    
    <label for="password">Contraseña:</label>
    <input type="password" placeholder="Password" name="password" id="password">
             
    <div class="buttonSubmit">
        <input type="submit" value="Iniciar sesión" class="rainbowButton" >
    </div>
    
    <a href= 'index.php?controller=Alumno&action=login' class='enlaceMenuAdmin'>Alumno Login</a>

</form>