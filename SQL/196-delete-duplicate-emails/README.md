## 196. Delete Duplicate Emails

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/delete-duplicate-emails/

Tabela `Person`:

| Coluna | Tipo    |
|--------|---------|
| id     | int     |
| email  | varchar |

`id` é a chave primária (coluna com valores únicos) para esta tabela. Cada linha desta tabela contém um endereço de e-mail. Os endereços de e-mail não terão letras maiúsculas.

Escreva uma consulta para excluir todos os e-mails duplicados, mantendo apenas uma linha com o menor `id` para cada e-mail.

Após executar sua consulta, o resultado exibido é a tabela `Person` já atualizada. A ordem de saída não importa.

Exemplo 1:

Entrada:

Person:

| id | email            |
|----|------------------|
| 1  | john@example.com |
| 2  | bob@example.com  |
| 3  | john@example.com |

Saída:

| id | email            |
|----|------------------|
| 1  | john@example.com |
| 2  | bob@example.com  |

Explicação: `john@example.com` estava duplicado nos ids 1 e 3. Mantém-se apenas o menor id (1) e remove-se o id 3.

#### Abordagem

Diferente dos demais desafios de SQL, esta consulta é um `DELETE`, não um `SELECT`: ela altera a tabela em vez de apenas relatar linhas. A estratégia é calcular, para cada `email`, o menor `id` (com `GROUP BY email` + `MIN(id)`) e excluir toda linha cujo `id` não esteja nesse conjunto de menores ids — ou seja, remover qualquer linha "extra" que não seja a primeira ocorrência de cada e-mail.

