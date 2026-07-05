## 258. Somar Dígitos

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/add-digits/

Dado um inteiro `num`, some repetidamente todos os seus dígitos até que o resultado tenha apenas um dígito, e retorne esse resultado.

Exemplo 1:

Entrada: `num = 38`

Saída: `2`

Explicação:

```
A soma dos dígitos de 38 é 3 + 8 = 11.
11 tem mais de um dígito, então soma-se novamente: 1 + 1 = 2.
Como 2 tem apenas um dígito, 2 é retornado.
```

Exemplo 2:

Entrada: `num = 0`

Saída: `0`

Restrições:

* `0 <= num <= 2^31 - 1`

Existe uma solução O(1) sem usar laço de repetição? Tente resolver o problema sem repetir a soma dos dígitos.

#### Abordagem

Somar repetidamente os dígitos de um número até sobrar um único dígito é exatamente o cálculo da sua **raiz digital**, que tem fórmula fechada em base 10: pra `num == 0` a raiz é `0`; caso contrário, a raiz é `1 + (num - 1) % 9`. Essa fórmula vem do fato de que `num` e a soma de seus dígitos sempre têm o mesmo resto na divisão por 9 (já que `10 ≡ 1 (mod 9)`), então repetir a soma converge pro representante de `num` no intervalo `[1, 9]` módulo 9 — daí o ajuste `(num - 1) % 9 + 1` em vez de simplesmente `num % 9`, que erraria pros múltiplos de 9 (retornaria `0` em vez de `9`). Complexidade O(1) de tempo e O(1) de espaço, sem nenhum laço.
