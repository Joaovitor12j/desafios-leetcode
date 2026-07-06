## 183. Customers Who Never Order

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/customers-who-never-order/

Tabela `Customers`:

| Coluna | Tipo    |
|--------|---------|
| id     | int     |
| name   | varchar |

`id` é a chave primária (coluna com valores únicos) desta tabela. Cada linha desta tabela indica o id e o nome de um cliente.

Tabela `Orders`:

| Coluna     | Tipo |
|------------|------|
| id         | int  |
| customerId | int  |

`id` é a chave primária (coluna com valores únicos) desta tabela. `customerId` é um id que aparece na tabela `Customers`. Cada linha desta tabela indica o id de um pedido e o id do cliente que o fez.

Escreva uma consulta para encontrar todos os clientes que nunca fizeram nenhum pedido.

Retorne o resultado com a coluna `Customers` contendo o nome do cliente, em qualquer ordem.

Exemplo 1:

Entrada:

Customers:

| id | name  |
|----|-------|
| 1  | Joe   |
| 2  | Henry |
| 3  | Sam   |
| 4  | Max   |

Orders:

| id | customerId |
|----|------------|
| 1  | 3          |
| 2  | 1          |

Saída:

| Customers |
|-----------|
| Henry     |
| Max       |

Explicação: Henry e Max nunca fizeram um pedido, apenas Joe (id 1) e Sam (id 3) aparecem em `Orders`.

#### Abordagem

Usa-se `LEFT JOIN` de `Customers` com `Orders` e filtra-se pelas linhas em que `customerId` ficou `null`, isto é, clientes sem nenhum pedido correspondente. Uma alternativa equivalente seria `WHERE id NOT IN (SELECT customerId FROM Orders)`, mas o `LEFT JOIN ... WHERE ... IS NULL` evita armadilhas com `NOT IN` quando a subconsulta pode conter `null`.
