## 219. Contém Duplicata II

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/contains-duplicate-ii/

Dado um vetor de inteiros `nums` e um inteiro `k`, retorne `true` se existirem dois índices distintos `i` e `j` no vetor tais que `nums[i] == nums[j]` e `abs(i - j) <= k`.

Exemplo 1:

Entrada: `nums = [1,2,3,1]`, `k = 3`

Saída: `true`

Exemplo 2:

Entrada: `nums = [1,0,1,1]`, `k = 1`

Saída: `true`

Exemplo 3:

Entrada: `nums = [1,2,3,1,2,3]`, `k = 2`

Saída: `false`

Restrições:

* `1 <= nums.length <= 10^5`
* `-10^9 <= nums[i] <= 10^9`
* `0 <= k <= 10^5`

#### Abordagem

Usa-se um mapa (array associativo) que guarda, pra cada valor já visto, o índice mais recente em que ele apareceu. Percorrendo `nums` pelo índice `i`, se `nums[i]` já está no mapa e a distância até o último índice registrado é `<= k`, existe duplicata próxima o bastante e a função retorna `true` imediatamente; caso contrário (ou se ainda não visto), o mapa é atualizado com o índice atual antes de seguir pro próximo elemento. Se o laço terminar sem encontrar par válido, retorna-se `false`. Complexidade O(n) de tempo e O(n) de espaço, sendo n o tamanho de `nums`.
