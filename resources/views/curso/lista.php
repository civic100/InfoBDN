
    <div class="botonAdmin">
        <a class="enlaceAdmin" href="index.php?controller=Curso&action=registrar">Nuevo Curso</a>
    </div>
    <?php 
        if(count($lista) > 0){
            echo "<table >";
            echo "<tr>";
                foreach($lista[0] as $clave1 => $valor1){
                    if($clave1 != 'estado' && $clave1 != 'descripcion'){
                        echo "<th >".$clave1."</th>";
                    }
                }
            //}
            echo "<th >Editar</th>";
            echo "<th >Editar Imagen</th>";
           
            echo "<tr>";
            foreach($lista as $clave => $valor){
                echo "<tr>";
                foreach($valor as $clave1 => $valor1){
                    if($clave1 != 'descripcion'){
                        if($clave1 == 'imagen'){
                            echo "<td ><img class='imagenAdmin src='".$valor1."' ></td>";
                        }elseif($clave1 == 'activo'){
                            if($valor1 == 0){
                                echo "<td><a href='index.php?controller=Curso&action=activar&codigo=".$valor->codigo."&activo=1' ><img style='width:100px;' src='resources/css/assets/imagenes/activado.png' ></a></td>";
                            }else{
                                echo "<td><a href='index.php?controller=Curso&action=activar&codigo=".$valor->codigo."&activo=0' ><img style='width:100px;'  src='resources/css/assets/imagenes/desactivado.png'/></a></td>";
                            }
                        }
                        elseif($clave1 != 'estado'){
                            echo "<td >$valor1</td>";
                        }
                    }
                }
                echo "<td ><a href='index.php?controller=Curso&action=editar&codigo=".$valor->codigo."'><img style='width:50px;' src='resources/css/assets/imagenes/editarproducto.png' /></a></td>";
                echo "<td ><a href='index.php?controller=Curso&action=editarImagen&codigo=".$valor->codigo."'><img style='width:50px; ' src='resources/css/assets/imagenes/editarimagen.png' /></a></td>";
              
                echo "</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }else{
            echo "No hay Cursos";
        }
