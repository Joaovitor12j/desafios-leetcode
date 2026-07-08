## 181. Employees Earning More Than Their Managers

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/employees-earning-more-than-their-managers/

Tabela `Employee`:

| Coluna      | Tipo    |
|-------------|---------|
| id          | int     |
| name        | varchar |
| salary      | int     |
| managerId   | int     |

`id` é a chave primária (coluna com valores únicos) desta tabela. Cada linha desta tabela indica o id de um funcionário, seu nome, salário e o id de seu gerente. Se `managerId` for `null`, o funcionário não possui gerente.

Escreva uma consulta para encontrar os funcionários que ganham mais do que seus gerentes.

Retorne o resultado com a coluna `Employee` contendo o nome do funcionário, em qualquer ordem.

Exemplo 1:

Entrada:

Employee:

| id | name  | salary | managerId |
|----|-------|--------|-----------|
| 1  | Joe   | 70000  | 3         |
| 2  | Henry | 80000  | 4         |
| 3  | Sam   | 60000  | null      |
| 4  | Max   | 90000  | null      |

Saída:

| Employee |
|----------|
| Joe      |

Explicação: Joe é o único funcionário que ganha mais que seu gerente (Sam). Henry ganha menos que seu gerente (Max).

Restrições:

* `id` é uma coluna com valores únicos.
* `managerId` é `null` ou o `id` de alguma pessoa presente nesta mesma tabela.

#### Abordagem

Faz-se um self-join da tabela `Employee` consigo mesma, ligando `managerId` do funcionário ao `id` do gerente. Um `INNER JOIN` já descarta automaticamente funcionários sem gerente (`managerId IS NULL`), já que não há correspondência para eles. Basta então filtrar as linhas em que o salário do funcionário é maior que o salário do gerente encontrado.
