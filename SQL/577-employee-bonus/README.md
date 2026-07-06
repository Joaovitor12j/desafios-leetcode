## 577. Employee Bonus

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/employee-bonus/

Tabela `Employee`:

| Coluna     | Tipo    |
|------------|---------|
| empId      | int     |
| name       | varchar |
| supervisor | int     |
| salary     | int     |

`empId` é a chave primária (coluna com valores únicos) desta tabela. Cada linha desta tabela indica o nome e o salário de um funcionário. Também contém o id de seu gerente.

Tabela `Bonus`:

| Coluna | Tipo |
|--------|------|
| empId  | int  |
| bonus  | int  |

`empId` é a chave primária (coluna com valores únicos) desta tabela. `empId` é uma chave estrangeira (referência) para a coluna `empId` da tabela `Employee`. Cada linha desta tabela contém o id e o bônus de um funcionário.

Escreva uma consulta para relatar o nome e o bônus de cada funcionário com um bônus menor que `1000`.

Retorne o resultado em qualquer ordem.

Exemplo 1:

Entrada:

Employee:

| empId | name  | supervisor | salary |
|-------|-------|------------|--------|
| 3     | Brad  | null       | 4000   |
| 1     | John  | 3          | 1000   |
| 2     | Dan   | 3          | 2000   |
| 4     | Thad  | 3          | 4000   |

Bonus:

| empId | bonus |
|-------|-------|
| 2     | 500   |
| 4     | 2000  |

Saída:

| name | bonus |
|------|-------|
| Brad | null  |
| John | null  |
| Dan  | 500   |

Explicação: Brad e John não possuem registro em `Bonus`, então seu bônus é tratado como `null` (que é menor que `1000`). Dan tem bônus `500`, que é menor que `1000`. Thad tem bônus `2000`, então é excluído do resultado.

#### Abordagem

Usa-se `LEFT JOIN` de `Employee` com `Bonus` para preservar funcionários sem registro de bônus (cujo `bonus` aparece como `null` após o join). O filtro `WHERE bonus < 1000 OR bonus IS NULL` mantém tanto os funcionários com bônus baixo quanto os sem bônus algum — o `IS NULL` é necessário porque, em SQL, `null < 1000` nunca é avaliado como verdadeiro.
