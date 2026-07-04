## 205. Cordas Isomórficas

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/isomorphic-strings/

Dadas duas strings `s` e `t`, determine se elas são isomórficas.

Duas strings `s` e `t` são isomórficas se os caracteres em `s` puderem ser substituídos para se obter `t`.

Todas as ocorrências de um caractere devem ser substituídas por outro caractere, preservando a ordem dos caracteres. Não há dois caracteres que possam ser mapeados para o mesmo caractere, mas um caractere pode ser mapeado para si mesmo.

Exemplo 1:

Entrada: `s = "egg"`, `t = "add"`

Saída: `true`

Explicação:

As strings `s` e `t` podem ser tornadas idênticas por:

* Mapeando `'e'` para `'a'`.
* Mapeando `'g'` para `'d'`.

Exemplo 2:

Entrada: `s = "foo"`, `t = "bar"`

Saída: `false`

Explicação:

As strings `s` e `t` não podem ser idênticas, pois `'o'` precisaria ser mapeado tanto para `'a'` quanto para `'r'`.

Exemplo 3:

Entrada: `s = "paper"`, `t = "title"`

Saída: `true`

Restrições:

* `1 <= s.length <= 5 * 10^4`
* `t.length == s.length`
* `s` e `t` consistem em qualquer caractere ASCII válido.

#### Abordagem

Usa-se dois mapas (arrays associativos), um para a direção `s -> t` e outro para `t -> s`, garantindo que a correspondência entre caracteres seja bijetora. Percorre-se as duas strings simultaneamente pelo índice: se o caractere de `s` já tem um mapeamento registrado, ele deve bater com o caractere correspondente de `t` na mesma posição; caso contrário, é criado um novo mapeamento nos dois sentidos. Qualquer divergência encontrada faz a função retornar `false` imediatamente. Complexidade O(n) de tempo e O(1) de espaço (no máximo 128 entradas por mapa, um por caractere ASCII), sendo n o comprimento das strings.
