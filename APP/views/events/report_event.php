<?php
$eventId = $_GET["event_id"];

?>

<nav class="navegador">
        <div class="enlace-inicio">
            <a href="/">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                </svg>
            </a>
        </div>
    </nav>
<div class="contenedor-formulario">
    <div class="formulario-reportar">
        <form action=<?php echo("/reportar_evento?event_id=".$eventId)?>  method="POST">
            <div class="campo-form">
                <label for="mmotivo">Motivo</label>
                <textarea name="motivo" id="motivo"></textarea>
            </div>
            <div class="boton-form">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</div>