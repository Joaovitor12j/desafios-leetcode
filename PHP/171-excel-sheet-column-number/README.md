## 171. Excel Sheet Column Number

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/excel-sheet-column-number/

Dada uma string `columnTitle` que representa o título da coluna tal como aparece em uma planilha do Excel, retorne o número da coluna correspondente.

Por exemplo:

| Título | Número |
|--------|--------|
| A      | 1      |
| B      | 2      |
| C      | 3      |
| ...    | ...    |
| Z      | 26     |
| AA     | 27     |
| AB     | 28     |
| ...    | ...    |

Exemplo 1:

Entrada: columnTitle = "A"

Saída: 1

Exemplo 2:

Entrada: columnTitle = "AB"

Saída: 28

Exemplo 3:

Entrada: columnTitle = "ZY"

Saída: 701

Restrições:

* `1 <= columnTitle.length <= 7`
* `columnTitle` consiste apenas em letras maiúsculas do alfabeto inglês.
* `columnTitle` está no intervalo `["A", "FXSHRXW"]`.

#### Abordagem

O problema equivale a converter um número em base 26 para decimal, mas usando dígitos de 1 a 26 (sem zero) em vez de 0 a 25. Percorrendo `columnTitle` da esquerda para a direita, cada caractere multiplica o acumulado atual por 26 e soma seu valor posicional (`A` = 1 ... `Z` = 26) — exatamente a mesma lógica usada pra calcular o valor de um número em qualquer sistema posicional. Complexidade O(n) de tempo e O(1) de espaço, sendo n o tamanho de `columnTitle`.
