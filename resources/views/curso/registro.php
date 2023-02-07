<div class="fromGenerico">
            <!-- Creamos el formulario donde su action será pasar los datos al model/loginAdmin y su función validar -->
            <form action="index.php?controller=Curso&action=registrarCurso" method="POST">
                <div style=" float: left; width: 45%; text-align: justify;">
                    <label for="nombre">Nombre:</label>
                    <input type="text" maxlength="30" placeholder="Nombre" name="nombre" id="nombre" autofocus require >

                    <label for="apellido">Apellido:</label>
                    <input type="text" maxlength="30" placeholder="Apellido" name="apellido" id="apellido" require>

                    <label for="correo">Correo Electronico:</label>
                    <input type="text" maxlength="30" placeholder="Correo Electronico" name="correo" id="correo" require>

                    <label for="calle">Calle:</label>
                    <input type="text" maxlength="50" placeholder="Calle" name="calle" id="calle" require>
                </div>
                <div style="float: right; width: 45%; text-align: justify;">
                    <label for="numeroCalle">Numero calle:</label>
                    <input type="text" maxlength="10" placeholder="Numero Calle" name="numeroCalle" id="numeroCalle" require>

                    <label for="dni">Dni:</label>
                    <input type="text" maxlength="9" placeholder="Dni" name="dni" id="dni" require>

                    <label for="password">Contraseña:</label>
                    <input type="password" maxlength="50" placeholder="Password" name="password" id="password" require>
                    

                    <label for="codigo">Codigo Postal:</label>
                    <input type="text" maxlength="5" placeholder="Codigo Postal" name="codigo" id="codigo" require>
                </div>
                <div class="buttonSubmit">
                    <input type="submit" value="Registrarse" class="rainbowButton" >
                    <br>
                    <a href= 'index.php?controller=Cliente&action=login' class='enlaceMenuAdmin'>Login Usuario</a>
                </div>
                
            </form>
        </div>