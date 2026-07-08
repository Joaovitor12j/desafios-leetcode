## 182. Duplicate Emails

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/duplicate-emails/

Tabela `Person`:

| Coluna | Tipo    |
|--------|---------|
| id     | int     |
| email  | varchar |

`id` é a chave primária (coluna com valores únicos) desta tabela. Cada linha desta tabela contém um endereço de e-mail. Os endereços de e-mail não terão letras maiúsculas.

Escreva uma consulta para relatar todos os e-mails duplicados. Note que não é garantido que a coluna `email` não contenha valores `null`.

Retorne o resultado com a coluna `Email` em qualquer ordem.

Exemplo 1:

Entrada:

Person:

| id | email               |
|----|---------------------|
| 1  | john@example.com    |
| 2  | bob@example.com     |
| 3  | john@example.com    |

Saída:

| Email               |
|----------------------|
| john@example.com    |

Explicação: `john@example.com` aparece duas vezes.

Restrições:

* `id` é uma coluna com valores únicos.

#### Abordagem

Agrupa-se por `email` com `GROUP BY` e filtra-se com `HAVING COUNT(*) > 1`, que retorna apenas os e-mails que aparecem mais de uma vez. Como `GROUP BY` já agrupa valores `null` entre si, e um único `null` isolado nunca teria contagem maior que 1, o filtro funciona corretamente mesmo com e-mails nulos na tabela.
