## 222. Contar Nós de uma Árvore Completa

#### Dificuldade: Médio
#### Link: https://leetcode.com/problems/count-complete-tree-nodes/

Dada a raiz (`root`) de uma árvore binária **completa**, retorne o número de nós na árvore.

Uma árvore binária completa é uma árvore em que todo nível, exceto possivelmente o último, está totalmente preenchido, e todos os nós do último nível estão o mais à esquerda possível. Ela pode ter entre 1 e `2^h` nós inclusive no último nível `h`.

Projete um algoritmo que rode em tempo menor que O(n), sendo n o número de nós na árvore.

Exemplo 1:

Entrada: `root = [1,2,3,4,5,6]`

Saída: `6`

Exemplo 2:

Entrada: `root = []`

Saída: `0`

Exemplo 3:

Entrada: `root = [1]`

Saída: `1`

Restrições:

* O número de nós na árvore está no intervalo `[0, 5 * 10^4]`.
* `0 <= Node.val <= 5 * 10^4`
* A árvore é garantidamente **completa**.

#### Abordagem

Aproveita-se a propriedade de árvore completa pra evitar visitar todos os nós. Pra cada nó visitado (a partir da raiz), calcula-se dois comprimentos: o da espinha mais à esquerda (descendo sempre por `left` a partir desse nó) e o da espinha mais à direita (descendo sempre por `right` a partir do mesmo nó). Se os dois comprimentos forem iguais, a subárvore enraizada nesse nó é garantidamente uma árvore **perfeita** (consequência de a árvore inteira ser completa), e seu número de nós é conhecido em O(1): `2^altura - 1`. Se forem diferentes, a subárvore não é perfeita e é preciso contar recursivamente `1 + contar(esquerda) + contar(direita)` — nesse caso, ao menos um dos dois filhos é, ele mesmo, raiz de uma subárvore perfeita, então a recursão sempre resolve um dos lados em O(1), restando aprofundar apenas no outro. Isso resulta em complexidade O(log² n): O(log n) níveis de recursão, cada um custando O(log n) pra calcular as duas espinhas.
