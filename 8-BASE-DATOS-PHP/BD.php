<?php

// CON PHP TENEMOS DOS FORMAS DE CONECTARNOS A UNA BASE DE DATOS: 
// MYSQLI Y PDO


class amor {

  const valor='Hola';
}

echo amor::valor ."\n";

class respeto extends amor{

    public static $sta='Superacion';
    public static function resp(){

        echo parent :: valor ."\n";

        echo self::$sta ."\n";

    }
}

echo respeto::resp();


?>