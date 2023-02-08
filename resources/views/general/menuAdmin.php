<body>
    <?php
        echo "<div class='menuAdmin'>";
            echo "<div class='menu2'><a href= 'index.php?controller=Curso&action=listado'>Cursos</a></div>";
            echo "<div class='menu3'><a href= 'index.php?controller=Producto&action=listado'>Productos</a></div>";
            echo "<div class='menu4'><a href= 'index.php?controller=Categoria&action=mostrarCategorias' class='enlaceMenuAdmin'>Categorias</a></div>";
            echo "<div class='menu5'><a href= 'index.php?controller=Base&action=salir' class='enlaceMenuAdmin'>Salir</a></div>";
        echo "</div>";
        echo "<div class='spacerAdmin'></div>";
    ?>
</body>