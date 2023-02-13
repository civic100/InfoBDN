
<h1 >Editar Curso</h1>
<div >
    <div>
        <form action="index.php?controller=Curso&action=editar" method="POST">
           
            <label for='codigo'>codigo:</label>
            <input t type="text" name = "codigo" readonly value=<?php echo $lista[0]->codigo; ?>>
            <br>

            <label for='nombre'>nombre:</label>
            <input type="text" name = "nombre" value=<?php echo $lista[0]->nombre; ?>>
            <br>

            <label for='horas'>horas:</label>
            <input type="number" name = "horas" value=<?php echo $lista[0]->horas; ?>>
            <br>

            <label for='fechainicio'>fecha inicio:</label>    
            <input type="date" name = "fechainicio" value=<?php echo $lista[0]->fechainicio; ?>>
            <br>

            <label for='fechafinal'>fecha final:</label>    
            <input type="date" name = "fechafinal" value=<?php echo $lista[0]->fechafinal; ?>>
            <br>

            <label for='profesor'>profesor:</label>  
            <select name="profesor" id="profesor">
                <?php
                foreach($listaProfesores as $clave => $valor){
                    if($valor->dni == $lista[0]->profesor){
                        echo "<option  value='".$valor->dni."' selected >".$valor->nombre."</option>";
                    }else{
                        echo "<option value='".$valor->dni."' >".$valor->nombre."</option>";
                    }
                   
                }
                ?>
            </select>
            <br>
            <input type="submit" value="editar" >
        </form>
    </div>
</div>