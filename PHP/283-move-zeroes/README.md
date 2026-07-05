## 283. Mover Zeros

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/move-zeroes/

Dado um vetor de inteiros `nums`, mova todos os `0`'s pro final dele, mantendo a ordem relativa dos elementos diferentes de zero.

**Nota**: você deve fazer isso in-place, sem fazer uma cópia do vetor.

Exemplo 1:

Entrada: `nums = [0,1,0,3,12]`

Saída: `[1,3,12,0,0]`

Exemplo 2:

Entrada: `nums = [0]`

Saída: `[0]`

Restrições:

* `1 <= nums.length <= 10^4`
* `-2^31 <= nums[i] <= 2^31 - 1`

Consegue pensar em uma solução com o mínimo possível de operações?

#### Abordagem

Usa-se dois ponteiros: `i`, que percorre o vetor inteiro, e `insertPos`, que marca a próxima posição livre pra um elemento diferente de zero. A cada `i`, se `nums[i]` for diferente de zero, ele é trocado (swap) com `nums[insertPos]` e `insertPos` avança. Como a troca só desloca elementos não-zero pra frente (e zeros pra trás, na posição que o não-zero deixou), a ordem relativa dos não-zero é preservada e o vetor termina com todos os zeros agrupados no final, tudo em uma única passada e sem alocar memória extra. Complexidade O(n) de tempo e O(1) de espaço, sendo n o tamanho de `nums`.
