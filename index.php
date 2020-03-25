<?php
/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */

 /** DEFININDO FORMATOS DE DATAS */
define("DATETIME_BR", "d/m/Y H:i:s"); //Data e Hora no Formato Brasileiro
define("DATE_BR", "d/m/Y"); //Exibindo apenas a data no Formato Brasileiro

//Criando Objetos
$dateTimeNow = new DateTime();                  //Criando uma nova data hora de agora
//var_dump($dateTimeNow);                       //Descomentar caso queira debugar
/* 
Saida esperada: 
object(DateTime)[1]
  public 'date' => string '2020-03-25 13:10:07.215701' (length=26) (Data e Hora atual)
  public 'timezone_type' => int 3                                   Time Zone brasileira
  public 'timezone' => string 'UTC' (length=3)  */
