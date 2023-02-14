
<div >
    <h1 >Editar Perfil</h1>
    <div >
         <div>
            <form action="index.php?controller=Alumno&action=editarPerfil" method="POST">
            
                    <label for="dni">Dni:</label>
                    <input type="text" name = "dni" readonly value=<?php echo $lista[0]->dni; ?>><br>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name = "nombre" value=<?php echo $lista[0]->nombre; ?>><br>
                    <label for="apellido">Apellido:</label>
                    <input type="text" name = "apellido" value=<?php echo $lista[0]->apellido; ?>><br>
                    <label for="edad">edad:</label>
                    <input type="number" name = "edad" value=<?php echo $lista[0]->edad; ?>><br>
    
                <div>
                    <input type="submit" value="Editar">
                </div>
                
            </form>
        </div>
    </div>