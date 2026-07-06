## 175. Combine Two Tables

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/combine-two-tables/

Tabela `Person`:

| Coluna    | Tipo    |
|-----------|---------|
| personId  | int     |
| lastName  | varchar |
| firstName | varchar |

`personId` é a chave primária (coluna com valores únicos) desta tabela.

Tabela `Address`:

| Coluna    | Tipo    |
|-----------|---------|
| addressId | int     |
| personId  | int     |
| city      | varchar |
| state     | varchar |

`addressId` é a chave primária (coluna com valores únicos) desta tabela. Cada linha contém a cidade e o estado de uma pessoa identificada por `personId`.

Escreva uma consulta para relatar o primeiro nome, último nome, cidade e estado de cada pessoa da tabela `Person`. Se não houver endereço cadastrado para um `personId`, relate `null` no lugar da cidade e do estado.

Retorne o resultado em qualquer ordem.

Exemplo 1:

Entrada:

Person:

| personId | lastName | firstName |
|----------|----------|-----------|
| 1        | Wang     | Allen     |
| 2        | Alice    | Bob       |

Address:

| addressId | personId | city          | state      |
|-----------|----------|---------------|------------|
| 1         | 2        | New York City | New York   |
| 2         | 3        | Leetcode      | California |

Saída:

| firstName | lastName | city          | state    |
|-----------|----------|---------------|----------|
| Allen     | Wang     | null          | null     |
| Bob       | Alice    | New York City | New York |

Explicação: Não existe endereço cadastrado para o `personId` 1, então cidade e estado aparecem como `null` para Allen Wang.
