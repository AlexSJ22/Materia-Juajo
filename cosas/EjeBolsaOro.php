<!DOCTYPE html>
<html lang="es">
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibir datos</title>
  </head>
  <body>
    <?php
    // Fecha inicio en formato string
    $start_date = '1970-01-01';

    // Fecha actual (hoy)
    $now = time();

    $years = 0;
    $months = 0;
    $days = 0;

    $current = strtotime($start_date);

    while (true) {
        $next_month = strtotime("+1 month", $current);
        if ($next_month > $now) {
            break;
        }
        $current = $next_month;
        $months++;
    }

    $years = intdiv($months, 12);
    $months = $months % 12;

    while (true) {
    $next_day = strtotime("+1 day", $current);
    if ($next_day > $now) {
        break;
    }
    $current = $next_day;
    $days++;
}

echo "Han pasado aproximadamente $years años, $months meses y $days días desde el inicio del tiempo en PHP hasta hoy.\n";
    ?>
  </body>
</html>