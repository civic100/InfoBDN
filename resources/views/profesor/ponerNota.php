<div>
	<h3>Poner Nota</h3>
</div>

    <form name="formulariUsuari" action="index.php?controller=Profesor&action=ponerNota" method="POST">    

    
        <label for="dni_alumno">Dni:</label>
        <input type="text" name = "dni_alumno" readonly value=<?php echo $lista[0]->dni_alumno; ?>><br>
        <label for="curso">Curso:</label>
        <input type="text" name = "curso" readonly value=<?php echo $lista[0]->curso; ?>><br>
        <label for="nota">Nota del alumno:   </label >
        <input type="text"  name="nota" maxlength="9" id = "nota" required/><br>
    
        <button type="submit" name="subir" value="Enviar">Enviar</button><br>

        <br>
       
    </form>
</div>
