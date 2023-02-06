
<div class="contenedor-central">
	<h3 class="txt-contenedor-central">Inicio de sesión Usuario</h3>
</div>
<div class="linea-central"></div>
<div class="formulario-admin">
    <form name="formulariUsuari" action="index.php?controller=Alumno&action=validarAlumno" method="POST">    
        <label for="dni">
            Dni del Usuari:   
        </label >
            <input type="text"  name="dni" maxlength="9" id = "dni" required/><br>
    
        <label for="Password">
            Password:
        </label >
            <input type="password"  maxlength="15" id = "Password" name="Password" required /><br>
            <button type="submit" name="subir" value="Enviar">Enviar</button><br>

        <br>
        <a href= 'index.php?controller=Alumno&action=registrar' >Registrate</a>
    </form>
</div>
<div class="imagen-login"><br></div>