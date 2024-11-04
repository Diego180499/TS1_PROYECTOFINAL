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
<div class="contenedor-crear-cuenta">
    <div class="formulario">
            <form  action="/crearcuenta" method="POST">
                <div class="campo">
                    <label for="usuario">Usuario</label>
                    <input name="usuario" type="text" id="usuario" placeholder="ingresa tu usuario">
                </div>
                <div class="campo">
                    <label for="password">Contraseña</label>
                    <input name="password" type="password" id="password" placeholder="crea una contraseña">
                </div>
                <div class="campo">
                    <label for="email">E-mail</label>
                    <input name="email" type="text" id="email" placeholder="ingresa tu e-mail">
                </div>
                <div class="campo">
                    <label for="phone">Teléfono</label>
                    <input name="phone" type="number" id="phone" placeholder="ingresa tu numero telefónico">
                </div>
                <div class="campo">
                    <label for="country">Nacionalidad</label>
                    <select name="country" id="" class="select">
                        <option value=1>Guatemala</option>
                        <option value=2>México</option>
                        <option value=3>Estado Unidos</option>
                        <option value=4>España</option>
                        <option value=5>colombia</option>
                    </select>
                </div>
                <div class="campo">
                    <label for="tipo">Tipo Usuario</label>
                    <select name="tipo" id="" class="select">
                        <option value=2>Usuario Publicador</option>
                        <option value=3>Usuario Registrado</option>
                    </select>
                </div>
                <input type="submit" value="Crear Cuenta" class="boton">
            </form>
    </div>
</div>