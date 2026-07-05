## 232. Implementar Fila Usando Pilhas

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/implement-queue-using-stacks/

Implemente uma fila (first in first out — FIFO) usando apenas duas pilhas. A fila implementada deve suportar todas as funções de uma fila normal (`push`, `peek`, `pop` e `empty`).

Implemente a classe `MyQueue`:

* `void push(int x)` Adiciona o elemento `x` ao final da fila.
* `int pop()` Remove e retorna o elemento do início da fila.
* `int peek()` Retorna o elemento do início da fila.
* `boolean empty()` Retorna `true` se a fila estiver vazia, `false` caso contrário.

**Nota**: você só pode usar as operações padrão de uma pilha — ou seja, apenas `push to top`, `peek/pop from top`, `size` e `is empty` são válidas.

Exemplo 1:

Entrada:

```
["MyQueue", "push", "push", "peek", "pop", "empty"]
[[], [1], [2], [], [], []]
```

Saída:

```
[null, null, null, 1, 1, false]
```

Explicação:

```
MyQueue myQueue = new MyQueue();
myQueue.push(1); // fila: [1]
myQueue.push(2); // fila: [1, 2]
myQueue.peek(); // retorna 1
myQueue.pop(); // retorna 1, fila: [2]
myQueue.empty(); // retorna false
```

Restrições:

* `1 <= x <= 9`
* No máximo `100` chamadas serão feitas para `push`, `pop`, `peek` e `empty`.
* Todas as chamadas para `pop` e `peek` são válidas (ou seja, sempre haverá pelo menos um elemento na fila quando essas operações forem chamadas).

#### Abordagem

Usa-se duas pilhas (arrays PHP manipulados só com `array_push`/`array_pop`, respeitando a restrição de operações de pilha): `$in`, que recebe todo elemento novo via `push`, e `$out`, de onde saem os elementos via `pop`/`peek`. Sempre que `$out` está vazia e é preciso ler o próximo elemento da fila, todos os itens de `$in` são transferidos pra `$out` um a um — essa transferência inverte a ordem, fazendo o elemento mais antigo de `$in` ficar no topo de `$out`, restaurando a ordem FIFO. Enquanto `$out` não estiver vazia, ela já contém os elementos na ordem correta e a transferência não precisa ser refeita. `empty()` verifica se as duas pilhas estão vazias. Cada elemento é transferido de `$in` pra `$out` no máximo uma vez, então o custo é amortizado O(1) por operação.
