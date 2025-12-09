<?php
define('ATACAR', 'medallas_modalidad.php');
define('PARAMETRO', 'codigo');

function ejemplo($objetivo, $parametro)
{
    $atacar = ATACAR;
    print <<<EJEMPLO
    <div class="ejemplo">
    <p class="sitio">Atacando <span class="url">$atacar</span></p>
    <p class="info">Objetivo: $objetivo</p>
    <p class="parametro">DATO: <span class="dato">$parametro</span></p>
    <button>PROBAR</button>
    <div class="resultado"></div>
    </div>
EJEMPLO;
}

?>