<div>
    <h1 >Editar Imagen</h1>
    <div >
         <div >
            <form action="index.php?controller=Profesor&action=editarImagen" method="POST" enctype="multipart/form-data">
                <div>

                <?php 
                    echo "<label for='img'>Imagen Actual:</label>";
                    echo "<img src='".$lista[0]->foto."'>";

                ?>

                </div>
                <div >
                    
                    <label for='imagen'>Nueva Imagen:</label>
                    <div>
                      <button class="btn1">Subir Imagen</button>
                      <input type="file" name="foto" />
                    </div>

                    <input type="hidden" name="codigo" value="<?php echo $_GET['dni']; ?>" >

                </div>
                <br>
                <div >
                    <input type="submit" value="Editar" >
                </div>
                
            </form>
        </div>
    </div>