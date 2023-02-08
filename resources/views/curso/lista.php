
    <div class="botonAdmin">
        <a class="enlaceAdmin" href="index.php?controller=Curso&action=registrar">Nuevo Curso</a>
    </div>
    <?php 
        if(count($lista) > 0){
            echo "<table class='tablaAdmin'>";
            echo "<tr>";
                foreach($lista[0] as $clave1 => $valor1){
                    if($clave1 != 'estado' && $clave1 != 'descripcion'){
                        echo "<th class='thAdmin'>".$clave1."</th>";
                    }
                }
            //}
            echo "<th class='thAdmin'>Editar</th>";
            echo "<th class='thAdmin'>Editar Imagen</th>";
            echo "<th class='thAdmin'>Estado</th>";
            echo "<tr>";
            foreach($lista as $clave => $valor){
                echo "<tr>";
                foreach($valor as $clave1 => $valor1){
                    if($clave1 != 'descripcion'){
                        if($clave1 == 'imagen'){
                            echo "<td class='tdAdmin'><img class='imagenAdmin' src='".$valor1."' ></td>";
                        }elseif($clave1 == 'activo'){
                            if($valor1 == 0){
                                echo "<td><a href='index.php?controller=Curso&action=editarDestacado&codigo=".$valor->codigo."&destacado=1' class='enlaceDestacado'><img style='width:50px;' src='resources/css/assets/imagenes/destacadoNo.png' class='destacado' /></a></td>";
                            }else{
                                echo "<td><a href='index.php?controller=Curso&action=editarDestacado&codigo=".$valor->codigo."&destacado=0' class='enlaceDestacado'><img style='width:50px;' src='resources/css/assets/imagenes/destacadoSi.png' class='destacado' /></a></td>";
                            }
                        }
                        elseif($clave1 != 'estado'){
                            echo "<td class='tdAdmin'>$valor1</td>";
                        }
                    }
                }
                echo "<td class='tdAdmin'><a href='index.php?controller=Curso&action=editar&codigo=".$valor->codigo."'><img style='width:50px;' src='resources/css/assets/imagenes/editarproducto.png' /></a></td>";
                echo "<td class='tdAdmin'><a href='index.php?controller=Curso&action=editarImagen&codigo=".$valor->codigo."'><img style='width:50px;' src='resources/css/assets/imagenes/editarimagen.png' /></a></td>";
                echo "<td class='tdAdmin'><a class='enlaceActivado' href='index.php?controller=Curso&action=activar&codigo=".$valor->codigo."'>";
                if($valor->activo == 0){
                    echo "<img style='width:50px;' class='activado' src='resources/css/assets/imagenes/desactivado.png' />";
                }else{
                    echo "<img style='width:50px;' class='activado' src='resources/css/assets/imagenes/activado.png' />";
                }
                echo "</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }else{
            echo "No hay Cursos";
        }
