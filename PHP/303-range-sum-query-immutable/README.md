## 303. Consulta de Soma de Intervalo - Imutável

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/range-sum-query-immutable/

Dado um vetor de inteiros `nums`, calcule a soma dos elementos entre os índices `left` e `right` (inclusivos), onde `left <= right`.

Implemente a classe `NumArray`:

* `NumArray(int[] nums)` Inicializa o objeto com o vetor de inteiros `nums`.
* `int sumRange(int left, int right)` Retorna a soma dos elementos de `nums` entre os índices `left` e `right` inclusivos (ou seja, `nums[left] + nums[left + 1] + ... + nums[right]`).

Exemplo 1:

Entrada:

```
["NumArray", "sumRange", "sumRange", "sumRange"]
[[[-2, 0, 3, -5, 2, -1]], [0, 2], [2, 5], [0, 5]]
```

Saída:

```
[null, 1, -1, -3]
```

Explicação:

```
NumArray numArray = new NumArray([-2, 0, 3, -5, 2, -1]);
numArray.sumRange(0, 2); // retorna (-2) + 0 + 3 = 1
numArray.sumRange(2, 5); // retorna 3 + (-5) + 2 + (-1) = -1
numArray.sumRange(0, 5); // retorna (-2) + 0 + 3 + (-5) + 2 + (-1) = -3
```

Restrições:

* `1 <= nums.length <= 10^4`
* `-10^5 <= nums[i] <= 10^5`
* `0 <= left <= right < nums.length`
* No máximo `10^4` chamadas serão feitas para `sumRange`.

#### Abordagem

Como o vetor é imutável (não há atualizações entre as consultas), pré-computa-se no construtor um vetor de somas de prefixo `$prefix`, onde `$prefix[0] = 0` e `$prefix[i + 1] = $prefix[i] + nums[i]`. Assim, `$prefix[i]` guarda a soma de todos os elementos de `nums` antes do índice `i`. Com isso, `sumRange(left, right)` é calculado em O(1) subtraindo `$prefix[left]` de `$prefix[right + 1]` — a soma acumulada até `right` menos a soma acumulada até antes de `left` sobra exatamente a soma do intervalo `[left, right]`. Complexidade O(n) de tempo e espaço na construção (sendo n o tamanho de `nums`), e O(1) de tempo por chamada de `sumRange`.
