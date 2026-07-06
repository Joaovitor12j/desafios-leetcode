## 197. Rising Temperature

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/rising-temperature/

Tabela `Weather`:

| Coluna      | Tipo    |
|-------------|---------|
| id          | int     |
| recordDate  | date    |
| temperature | int     |

`id` é a chave primária (coluna com valores únicos) desta tabela. Esta tabela contém informações sobre a temperatura em um determinado dia.

Escreva uma consulta para encontrar todos os ids das datas em que a temperatura foi mais alta em comparação com sua data anterior (dia imediatamente anterior).

Retorne o resultado em qualquer ordem.

Exemplo 1:

Entrada:

Weather:

| id | recordDate | temperature |
|----|------------|-------------|
| 1  | 2015-01-01 | 10          |
| 2  | 2015-01-02 | 25          |
| 3  | 2015-01-03 | 20          |
| 4  | 2015-01-04 | 30          |

Saída:

| id |
|----|
| 2  |
| 4  |

Explicação: Em 2015-01-02, a temperatura era mais alta que no dia anterior (2015-01-01): 25 > 10. Em 2015-01-04, a temperatura era mais alta que no dia anterior (2015-01-03): 30 > 20.

#### Abordagem

Como não existe função de data nativa comum a ambos os engines, essa solução fuciona apenas no sqlite, para o MySQL usaria "DATE_ADD(w2.recordDate, INTERVAL 1 DAY)".

Faz-se um self-join de `Weather` consigo mesma, ligando cada linha (`w1`) a outra linha (`w2`) cuja `recordDate` seja exatamente um dia antes da de `w1` (`date(w1.recordDate, '-1 day') = w2.recordDate`). Em seguida, filtra-se pelas linhas em que a temperatura de `w1` é maior que a de `w2`, retornando o `id` de `w1`. O uso da função `date()` (em vez de subtrair datas diretamente) garante que a comparação funcione corretamente com base em datas de calendário, não em uma diferença aritmética simples de dias.
