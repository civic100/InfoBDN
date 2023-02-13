
<h1 >Editar Curso</h1>
<div >
    <div>
        <form action="index.php?controller=Profesor&action=editar" method="POST">
           
            <label for='dni'>Dni:</label>
            <input t type="text" name = "dni" readonly value=<?php echo $lista[0]->dni; ?>>
            <br>

            <label for='nombre'>Nombre:</label>
            <input type="text" name = "nombre" value=<?php echo $lista[0]->nombre; ?>>
            <br>

            <label for='apellido'>Apellido:</label>
            <input type="text" name = "apellido" value=<?php echo $lista[0]->apellido; ?>>
            <br>

            <label for='tituloacademico'>Titulo academico:</label>    
            <input type="text" name = "tituloacademico" value=<?php echo $lista[0]->tituloacademico; ?>>
            <br>

            <br>
            <input type="submit" value="editar" >
        </form>
    </div>
</div>