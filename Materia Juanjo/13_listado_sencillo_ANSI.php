<?php
header('Content-Type: text/csv; charset=iso-8859-1');
// header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="alumnos.csv";');
/*
Podemos usar mb_convert_encoding o iconv
Son equivalentes salvo que aparezca algún caracter que no existe en el juego de caracteres destino. 

Usando mb_convert_encoding lo cambia por un '?'

Usando iconv tenemos tres posibilidades:
->Sin modificadores, da un notice y se salta esa línea.
->Usando //TRANSLIT intenta realizar un cambio aprosimado con lo que tiene. Por ejemplo € -> EUR
->Usando //IGNORE hace esa línea pero borra el carácter
*/
/*
print mb_convert_encoding("Iñaki;Sansón\n",'iso-8859-1','utf-8');
print mb_convert_encoding("Álvar€;Álvarez\n",'iso-8859-1','utf-8');
print iconv("UTF-8", "ISO-8859-1","1Úrsul€;Úrsulez\n");
print iconv("UTF-8", "ISO-8859-1//TRANSLIT","2Úrsul€;Úrsulez\n");
print iconv("UTF-8", "ISO-8859-1//IGNORE","3Úrsul€;Úrsulez\n");
print iconv("UTF-8", "ASCII//TRANSLIT","4Úrsul€ Iñaki;Úrsulez\n");
*/
print mb_convert_encoding("Iñaki;Sansón\n",'iso-8859-1','utf-8');print mb_convert_encoding("Álvaro;Álvarez\n",'iso-8859-1','utf-8');
print iconv("UTF-8", "ISO-8859-1//TRANSLIT","Úrsula;Úrsulez\n");
?>