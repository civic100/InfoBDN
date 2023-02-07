<header class="header-menu">

                <form name="formulariRegistro" action="index.php?controller=Alumno&action=registrarAlumno"  method="POST" >
                <h2>Registrate en InfoBDN</h2><br>

                        <label for="dni">
                            DNI Alumne:   
                        </label >
                            <input type="text"  name="dni" maxlength="9" id = "dni" required/><br>

                        <label for="nombre">
                            Nom:   
                        </label >
                            <input type="text"  name="nombre" maxlength="15" id = "nombre" required/><br>

                        <label for="apellido">
                            Cognoms:   
                        </label >
                            <input type="text"  name="apellido" maxlength="15" id = "apellido" required/><br>

                        <label for="edad">
                            Edat:
                        </label> 
                            <input type="number"  name="edad" id="edad" min="18" max="50" required/><br>

                        <label for="foto">
                            Añadir Foto:
                        </label >
                            <input name="foto" type="file" required accept=".png .jpg .jpeg"/><br>

                        <label for="email">
                            Email:
                        </label >
                            <input name="email" type="email" required/><br>
                
                        <label for="contraseña">
                            Password:
                        </label >
                        <input type="password"  maxlength="15" id = "contraseña" name="contraseña" required /><br>  

                        <br>
                        <input type="submit" name="subir" value="Aceptar"/>
                </form>
           
        </div>
        <div class="imagen-login"><br></div>