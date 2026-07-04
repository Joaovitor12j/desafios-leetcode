## 217. Contém Duplicata

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/contains-duplicate/

Dado um vetor de inteiros `nums`, retorne `true` se algum valor aparece pelo menos duas vezes no vetor, e retorne `false` se todo elemento for distinto.

Exemplo 1:

Entrada: `nums = [1,2,3,1]`

Saída: `true`

Explicação:

O elemento `1` aparece nos índices 0 e 3.

Exemplo 2:

Entrada: `nums = [1,2,3,4]`

Saída: `false`

Explicação:

Todos os elementos são distintos.

Exemplo 3:

Entrada: `nums = [1,1,1,3,3,4,3,2,4,2]`

Saída: `true`

Restrições:

* `1 <= nums.length <= 10^5`
* `-10^9 <= nums[i] <= 10^9`

#### Abordagem

Percorre-se `nums` mantendo um conjunto (array associativo usado como hash set) com os valores já vistos. A cada elemento, se ele já está no conjunto, existe duplicata e a função retorna `true` imediatamente; caso contrário, o valor é registrado e a iteração continua. Se o laço terminar sem encontrar repetição, retorna-se `false`. Complexidade O(n) de tempo e O(n) de espaço, sendo n o tamanho de `nums`.
