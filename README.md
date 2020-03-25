# Classe DateTime no PHP
Modelos de Trabalho com Datas no PHP

### Definindo Formatos
Definine a configuração dos formatos padrões que se pode utilizar
```
define("DATETIME_BR", "d/m/Y H:i:s"); //Data e Hora no Formato Brasileiro
define("DATE_BR", "d/m/Y"); //Exibindo apenas a data no Formato Brasileiro
```

### Criando objetos DateTime
Criar objetos a partir da Classe DateTime
```
$agora = new DateTime();                  //Criando uma nova data hora de agora
$avulsa = new DateTime("2020-02-02");        //Criando uma data a partir de uma data específica (Usar Americano)
$estatica = DateTime::createFromFormat('Y-m-d', "2020-02-02"); //Criando a partir de uma objeto estático a partir de um formato, sem instaciar
```

### Formatando Objetos
Formata Objetos da Classe DateTime
```
$agoraDateTimeBr = $agora->format(DATETIME_BR); //Utilizando data e hora BR
$agoraDateBr = $agora->format(DATE_BR); //Utilizando apenas data BR
$somenteDia = $agora->format('d'); //Exibe apenas o dia (numero)
$somenteDiaS = $agora->format('l'); //Exibe apenas o dia (Str da semana)
$somenteMes = $agora->format('m'); //Exibe apenas o mes (numero)
$somenteMesS = $agora->format('M'); //Exibe apenas o mes (Str abreviado)
```
*Consultar formatos em: https://www.php.net/manual/en/function.date.php *
