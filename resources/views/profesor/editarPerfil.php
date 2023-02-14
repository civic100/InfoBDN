<div >
    <h1 >Editar Perfil</h1>
    <div >
         <div>
            <form action="index.php?controller=Profesor&action=editarPerfil" method="POST">
            
                    <label for="dni">Dni:</label>
                    <input type="text" name = "dni" readonly value=<?php echo $lista[0]->dni; ?>><br>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name = "nombre" value=<?php echo $lista[0]->nombre; ?>><br>
                    <label for="apellido">Apellido:</label>
                    <input type="text" name = "apellido" value=<?php echo $lista[0]->apellido; ?>><br>
                    <label for="tituloacademico">tituloacademico:</label>
                    <input type="text" name = "tituloacademico" value=<?php echo $lista[0]->tituloacademico; ?>><br>
    
                <div>
                    <input type="submit" value="Editar">
                </div>
                
            </form>
        </div>
    </div>