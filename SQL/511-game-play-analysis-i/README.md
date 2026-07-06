## 511. Game Play Analysis I

#### Dificuldade: Fácil
#### Link: https://leetcode.com/problems/game-play-analysis-i/

Tabela `Activity`:

| Coluna        | Tipo |
|---------------|------|
| player_id     | int  |
| device_id     | int  |
| event_date    | date |
| games_played  | int  |

`(player_id, event_date)` é a chave primária (coluna com valores únicos) desta tabela. Esta tabela mostra a atividade dos jogadores de um jogo. Cada linha é um registro de um jogador que fez login e jogou um número de jogos (possivelmente 0) antes de fazer logout no mesmo dia, usando um dispositivo específico.

Escreva uma consulta para relatar a primeira data de login de cada jogador.

Retorne o resultado com as colunas `player_id` e `first_login`, em qualquer ordem.

Exemplo 1:

Entrada:

Activity:

| player_id | device_id | event_date | games_played |
|-----------|-----------|------------|--------------|
| 1         | 2         | 2016-03-01 | 5            |
| 1         | 2         | 2016-05-02 | 6            |
| 2         | 3         | 2017-06-25 | 1            |
| 3         | 1         | 2016-03-02 | 0            |
| 3         | 4         | 2018-07-03 | 5            |

Saída:

| player_id | first_login |
|-----------|-------------|
| 1         | 2016-03-01  |
| 2         | 2017-06-25  |
| 3         | 2016-03-02  |

Explicação: A data mais antiga de login do jogador 1 é 2016-03-01, do jogador 2 é 2017-06-25 e do jogador 3 é 2016-03-02.

#### Abordagem

Agrupa-se a tabela `Activity` por `player_id` e aplica-se `MIN(event_date)` para obter a data de login mais antiga de cada jogador, renomeando a coluna resultante para `first_login`.
