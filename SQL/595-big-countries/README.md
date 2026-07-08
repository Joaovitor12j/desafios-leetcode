## 595. Big Countries

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/big-countries/

Tabela `World`:

| Coluna     | Tipo    |
|------------|---------|
| name       | varchar |
| continent  | varchar |
| area       | int     |
| population | int     |
| gdp        | bigint  |

`name` é a chave primária (coluna com valores únicos) desta tabela. Cada linha desta tabela dá informações sobre o nome de um país, o continente ao qual pertence, sua área, população e PIB.

Um país é considerado grande se:

- possui área de pelo menos três milhões (ou seja, `3000000` km²), ou
- possui população de pelo menos vinte e cinco milhões (ou seja, `25000000`).

Escreva uma consulta para encontrar o nome, população e área dos países grandes.

Retorne o resultado em qualquer ordem.

Exemplo 1:

Entrada:

World:

| name        | continent | area    | population | gdp          |
|-------------|-----------|---------|------------|--------------|
| Afghanistan | Asia      | 652230  | 25500100   | 20343000000  |
| Albania     | Europe    | 28748   | 2831741    | 12960000000  |
| Algeria     | Africa    | 2381741 | 37100000   | 188681000000 |

Saída:

| name        | population | area   |
|-------------|------------|--------|
| Afghanistan | 25500100   | 652230 |
| Algeria     | 37100000   | 2381741|

Explicação: Afghanistan atende ao critério de população (25500100 >= 25000000). Algeria atende ao critério de população (37100000 >= 25000000). Albania não atende a nenhum dos dois critérios.

Restrições:

* `name` é uma coluna com valores únicos.

#### Abordagem

Filtra-se `World` com `WHERE area >= 3000000 OR population >= 25000000`, selecionando apenas `name`, `population` e `area`, conforme o critério de "país grande" descrito no enunciado.
