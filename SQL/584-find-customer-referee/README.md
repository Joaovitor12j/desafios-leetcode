## 584. Find Customer Referee

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/find-customer-referee/

Tabela `Customer`:

| Coluna      | Tipo    |
|-------------|---------|
| id          | int     |
| name        | varchar |
| referee_id  | int     |

`id` é a chave primária (coluna com valores únicos) desta tabela. Cada linha desta tabela indica o id de um cliente, seu nome e o id do cliente que o indicou.

Encontre os nomes dos clientes que não foram indicados pelo cliente de id `2`.

Retorne o resultado em qualquer ordem.

Exemplo 1:

Entrada:

Customer:

| id | name | referee_id |
|----|------|------------|
| 1  | Will | null       |
| 2  | Jane | null       |
| 3  | Alex | 2          |
| 4  | Bill | null       |
| 5  | Zack | 1          |
| 6  | Mark | 2          |

Saída:

| name |
|------|
| Will |
| Jane |
| Bill |
| Zack |

Explicação: Alex e Mark foram indicados pelo cliente de id `2`, então são excluídos. Os demais clientes (indicados por outra pessoa ou sem indicação) aparecem no resultado.

#### Abordagem

Filtra-se `Customer` com `WHERE referee_id != 2 OR referee_id IS NULL`. A condição `IS NULL` é necessária porque, em SQL, qualquer comparação com `null` (incluindo `referee_id != 2`) resulta em `null`, não em verdadeiro — então clientes sem indicador seriam descartados incorretamente se dependêssemos apenas do `!=`.
