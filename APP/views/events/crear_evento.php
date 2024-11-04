<?php
$categoriasArray = [];
for($i =0; $i<$categorias->num_rows; $i++){
    array_push($categoriasArray,$categorias->fetch_object() );   
}

$tiposArray = [];
for($i =0; $i<$tipos_publico->num_rows; $i++){
    array_push($tiposArray,$tipos_publico->fetch_object() );   
}

?>

<nav class="navegador">
    <div class="enlaces-admin">
        <a href="/iniciar-sesion">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
            <path d="M9 12h12l-3 -3" />
            <path d="M18 15l3 -3" />
            </svg>
        </a>
    </div>
</nav>

<div class="contenedor-crear-evento">
    <div class="titulo-crear-evento">
        <h2>Crear Evento</h2>
    </div>
    <div class="contenedor-formulario-ce">
        <form action="/crear_evento" method="POST" class="formulario-ce">
            <div class="campo-ce">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre">
            </div>
            <div class="campo-ce">
                <label for="descripcion">Descripcion</label>
                <textarea name="descripcion" id=""></textarea>
            </div>
            <div class="campo-ce">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha">
            </div>
            <div class="campo-ce">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="">
                    <option value="0">--Seleccionar Categoría--</option>
                    <?php
                    for($i =0; $i<sizeof($categoriasArray); $i++){
                        echo("<option value=".htmlspecialchars($categoriasArray[$i]->id).">".htmlspecialchars($categoriasArray[$i]->category_name)."</option>");
                    }
                    ?>
                </select>
            </div>
            <div class="campo-ce">
                <label for="fecha">Lugar</label>
                <input type="text" name="lugar">
            </div>
            <div class="campo-ce">
                <label for="tipo">Tipo Público</label>
                <select name="tipo" id="">
                    <option value="0">--Seleccionar Tipo Público--</option>
                    <?php
                    for($i =0; $i<sizeof($tiposArray); $i++){
                        echo("<option value=".htmlspecialchars($tiposArray[$i]->id).">".htmlspecialchars($tiposArray[$i]->type_name)."</option>");
                    }
                    ?>
                </select>
            </div>
            <div class="campo-ce">
                <label for="cupo">Cantidad Cupo</label>
                <input type="number" name="cupo">
            </div>
            <div>
                <?php
                echo('<input type="text" name="organizador" hidden value="'.htmlspecialchars($organizador).'">');
                ?>
            </div>
            <div class="campo-ce">
                <label for="link">Link Evento</label>
                <input type="text" name="link">
            </div>
            <div class="campo-ce">
                <input type="submit" value="Crear Evento" class="boton-ce">
            </div>
        </form>
    </div>
</div>