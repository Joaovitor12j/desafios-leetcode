## 586. Customer Placing the Largest Number of Orders

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/customer-placing-the-largest-number-of-orders/

Tabela `Orders`:

| Coluna          | Tipo |
|-----------------|------|
| order_number    | int  |
| customer_number | int  |

`order_number` é a chave primária (coluna com valores únicos) desta tabela. Esta tabela contém informações sobre a ID do pedido e a ID do cliente.

Escreva uma consulta para encontrar o `customer_number` do cliente que fez o maior número de pedidos.

Os testes são gerados de forma que exatamente um cliente tenha feito mais pedidos do que qualquer outro cliente.

Exemplo 1:

Entrada:

Orders:

| order_number | customer_number |
|---------------|------------------|
| 1             | 1                |
| 2             | 2                |
| 3             | 3                |
| 4             | 3                |

Saída:

| customer_number |
|------------------|
| 3                |

Explicação: O cliente com o número `3` tem duas contas, número de pedido `3` e número de pedido `4`. Este é o cliente com mais pedidos.

#### Abordagem

Agrupa-se `Orders` por `customer_number`, conta-se as linhas de cada grupo com `COUNT(*)`, ordena-se decrescentemente por essa contagem e retorna-se apenas a primeira linha com `ORDER BY ... DESC LIMIT 1`. Como o enunciado garante que existe exatamente um cliente com o maior número de pedidos, não há ambiguidade de empate a resolver.
