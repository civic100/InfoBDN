
<div class="header">
    <h1 class='tituloRegistroProducto'>Registro Producto</h1>
<!--Contenido antes de las olas-->
    <div class="inner-headerProducto flex">
         <div class="fromGenerico">
         <h2> Añadir Curso </h2>
            <!-- Creamos el formulario donde su action será pasar los datos al model/loginAdmin y su función validar -->
            <form action="index.php?controller=Curso&action=registrar" method="POST"  enctype="multipart/form-data" >
            <div class="Contenedor-Tabla">

                <label for="nombre">
                    Nombre del Curso:
                </label >
                    <input type="text"  maxlength="15" id = "nombre" name="nombre" required /><br>

                <label for="descripcion">
                    Descripcion del Curso:
                </label >
                    <input type="text"  maxlength="40" id = "descripcion" name="descripcion" required /><br>

                <label for="horadurada">
                    Hora durada del curs:   
                </label >
                    <input type="int"  name="horas" maxlength="15" id = "horas" required/><br>

                <label for="fechainicio">
                    Data de inici del Curso:
                </label >
                    <input type="date"  maxlength="15" id = "fechainicio" name="fechainicio" required /><br>

                <label for="fechafinal">
                    Data de fi del Curso:
                </label >
                    <input type="date"  maxlength="15" id = "fechafinal" name="fechafinal" required /><br>
                        
                <label for="profesor">
                    Nombre del Profesor:
                </label >

                    <select name='profesor' id = 'profesor'>"
                        <?php
                           foreach($listaProfesores as $clave => $valor){
                                echo "<option value=".$valor->dni.">".$valor->nombre."</option>";
                            }
                        ?> 
                    </select>
                    <br>     
                    <label for ="foto">
                    Foto:
                </label>
                <input type="file"   id = "foto" name="foto" required /><br>
                    <br>     
                <input type="submit"  value="Aceptar"/>
            </form>
            <br>
            <a href='CursosAdmin.php'>Editar los Cursos</a><br>
            </form>
        </div>
    </div>