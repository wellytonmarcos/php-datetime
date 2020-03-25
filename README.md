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
_Consultar formatos em: https://www.php.net/manual/en/function.date.php _


### Aplicando TimeZone
Formata os Objetos da Classe DateTime para uma Timezone específica
```
$saoPauloTimeZone = new DateTimeZone("America/Sao_Paulo"); //Timezone de São Paulo
$apiaTimeZone = new DateTimeZone("Pacific/Apia"); //Timezone de Apia
$agoraSaoPaulo = new DateTime("now", $saoPauloTimeZone); //Aplica o timezone de são paulo em agora
$agoraApia = new DateTime("now", $apiaTimeZone);//Aplica o timezone de Apia em agora
```
## Diferença de Dadas (Classe DateInterval)
Calcula diferença entre datas

### Criando um Objeto de Intervalo
Para criar um objeto de Intervalo, usa-se:
```
$intervalo = new DateInterval("P5Y15DT35M");
```
Onde:
 P5Y15D - Período é de 5 anos e 15 Dias
 T - informa que os comandos agora serão de tempo
 35M - 35 Minutos

### Adicionando um intervalo a um Objeto de Datetime
 
Para realizar a adição de um intervalo, utiliza-se ```add``` (este comando já adiciona a data existente)
```
$agora = new DateTime("now");
$agora->add($intervalo);//Adiciona intervalo a data de agora
```

### Subtrair um intervalo a um Objeto de Datetime
 
Para realizar a adição de um intervalo, utiliza-se ```sub``` (este comando já adiciona a data existente)
```
$agora = new DateTime("now");
$agora->sub($intervalo);//Adiciona intervalo a data de agora
```


### Diferença entre datas

Para testar a diferença entre datas é necessário que as duas sejam do tipo **DateTime**
```
$nascimento = new DateTime("1990-03-24"); //Data de Nascimento 
$agora = new DateTime("now"); //Agora
$diferenca = $agora->diff($nascimento); //Diferença entre datas
```
A diferença é dada em um objeto como exemplo abaixo:
```
object(DateInterval)[5]
  public 'y' => int 30                  //Em Anos
  public 'm' => int 0                   //+ Meses
  public 'd' => int 1                   //+Dias
  public 'h' => int 15                  //+horas
  public 'i' => int 54                  //+minutos
  public 's' => int 49                  //+segundos
  public 'f' => float 0.308902          //+microsegundos
  public 'weekday' => int 0             
  public 'weekday_behavior' => int 0    
  public 'first_last_day_of' => int 0
  public 'invert' => int 1              //Se já passou da data = 1, se ainda não passou = 0
  public 'days' => int 10959            //Número de dias de diferença
  public 'special_type' => int 0
  public 'special_amount' => int 0
  public 'have_weekday_relative' => int 0
  public 'have_special_relative' => int 0
```

Um exemplo do uso de ```invert``` e ```days```:
```
if ($diferenca->invert) {
    echo "<p>Estou vivo a {$diferenca->days} dias.</p>";
} else {
    echo "<p>Vou nascer em {$diferenca->days} dias!</p>";
}
```

### Interface Estática

Pode-se criar um intervalo estático também:
```
$agora = new DateTime("now");
$agora->sub(DateInterval::createFromDateString("30days"))->format(DATETIME_BR);
```
No exemplo acima foi criado um DateTime de agora, e depois removido 30 dias de agora e aplicado o formato brasileiro
O comando também pode ser usado para ```add```

## Período (Classe DatePeriod)

Classe interessante para encontrar recorrencias entre duas datas.
Para encontrars um periodo, são necessários 3 parametros:
```
$inicio = new DateTime("now"); //Criado uma Data agora
$intervalo = new DateInterval("P4M"); //Criado um Periodo (4 Meses)
$fim = new DateTime("2025-12-31"); //Criado uma data final

```
Assim pode-se instaciar um novo objeto do tipo DatePeriod:
```
$periodo = new DatePeriod($inicio, $intervalo, $fim);  //Criado um data periodo, passando a data inicial, o periodo e a data final
```
Na pratica pode-se utilizar para gerar uma lista de recorencias com um laço de repetição, conforme exemplo:
```
$listaDatas = [];
foreach ($periodo as $recurrences) {
    array_push($listaDatas, $recurrences->format(DATE_BR));
}
```

Lembrando, que pode-se utilizar ```get_class_methods(objeto)``` para visualizar os metodos utilizados.



