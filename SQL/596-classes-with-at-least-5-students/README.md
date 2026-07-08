## 596. Classes With at Least 5 Students

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/classes-with-at-least-5-students/

Tabela `Courses`:

| Coluna  | Tipo    |
|---------|---------|
| student | varchar |
| class   | varchar |

`(student, class)` é a chave primária (coluna com valores únicos) desta tabela. Cada linha desta tabela indica o nome de um estudante e a turma em que ele está matriculado.

Escreva uma consulta para encontrar todas as turmas que possuem pelo menos cinco estudantes.

Retorne o resultado em qualquer ordem.

Exemplo 1:

Entrada:

Courses:

| student | class    |
|---------|----------|
| A       | Math     |
| B       | English  |
| C       | Math     |
| D       | Biology  |
| E       | Math     |
| F       | Computer |
| G       | Math     |
| H       | Math     |
| I       | Math     |

Saída:

| class |
|-------|
| Math  |

Explicação: Math possui 6 estudantes, então é incluída no resultado. As demais turmas possuem apenas um estudante cada, sendo excluídas.

Restrições:

* `(student, class)` é a combinação de colunas com valores únicos desta tabela.

#### Abordagem

Agrupa-se `Courses` por `class` e filtra-se com `HAVING COUNT(DISTINCT student) >= 5`. Usa-se `COUNT(DISTINCT student)` em vez de `COUNT(*)` para contar estudantes únicos por turma, já que a chave primária composta `(student, class)` já garante que não há linhas duplicadas, mas o `DISTINCT` deixa explícito que o critério é sobre estudantes distintos, não sobre matrículas.
