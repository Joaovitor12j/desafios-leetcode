# Desafios LeetCode

Arquivo pessoal de desafios do LeetCode já resolvidos, com soluções em PHP e SQL, cada uma acompanhada de testes automatizados em PHPUnit.

Cada problema resolvido vive em sua própria pasta dentro de `PHP/` ou `SQL/` (ex.: `PHP/171-excel-sheet-column-number/`), contendo o enunciado em português (`README.md`), a solução (`solution.php` ou `solution.sql`) e os testes (`SolutionTest.php`).

## Abordagem

A seção 'Abordagem' dentro de cada problema descreve a abordagem que eu tomei para resolver o problema.

## Problemas resolvidos

### PHP

| # | Problema | Dificuldade |
|---|----------|--------------|
| 171 | [Excel Sheet Column Number](PHP/171-excel-sheet-column-number/) | Fácil |
| 203 | [Remover Elementos de uma Lista Encadeada](PHP/203-remover-elementos-da-lista-vinculada/) | Fácil |
| 205 | [Cordas Isomórficas](PHP/205-isomorphic-strings/) | Fácil |
| 217 | [Contém Duplicata](PHP/217-contains-duplicate/) | Fácil |
| 219 | [Contém Duplicata II](PHP/219-contains-duplicate-ii/) | Fácil |
| 222 | [Contar Nós de uma Árvore Completa](PHP/222-count-complete-tree-nodes/) | Médio |
| 232 | [Implementar Fila Usando Pilhas](PHP/232-implement-queue-using-stacks/) | Fácil |
| 258 | [Somar Dígitos](PHP/258-add-digits/) | Fácil |
| 283 | [Mover Zeros](PHP/283-move-zeroes/) | Fácil |
| 303 | [Consulta de Soma de Intervalo - Imutável](PHP/303-range-sum-query-immutable/) | Fácil |

### SQL

| # | Problema | Dificuldade |
|---|----------|--------------|
| 175 | [Combine Two Tables](SQL/175-combine-two-tables/) | Fácil |
| 181 | [Employees Earning More Than Their Managers](SQL/181-employees-earning-more-than-their-managers/) | Fácil |
| 182 | [Duplicate Emails](SQL/182-duplicate-emails/) | Fácil |
| 183 | [Customers Who Never Order](SQL/183-customers-who-never-order/) | Fácil |
| 196 | [Delete Duplicate Emails](SQL/196-delete-duplicate-emails/) | Fácil |
| 197 | [Rising Temperature](SQL/197-rising-temperature/) | Fácil |
| 511 | [Game Play Analysis I](SQL/511-game-play-analysis-i/) | Fácil |
| 577 | [Employee Bonus](SQL/577-employee-bonus/) | Fácil |
| 584 | [Find Customer Referee](SQL/584-find-customer-referee/) | Fácil |
| 586 | [Customer Placing the Largest Number of Orders](SQL/586-customer-placing-the-largest-number-of-orders/) | Fácil |
| 595 | [Big Countries](SQL/595-big-countries/) | Fácil |
| 596 | [Classes With at Least 5 Students](SQL/596-classes-with-at-least-5-students/) | Fácil |

## Rodando os testes com Docker (recomendado)

Pré-requisitos: Docker e Docker Compose v2 (comando `docker compose`, sem hífen).

```bash
git clone https://github.com/Joaovitor12j/desafios-leetcode
cd desafios-leetcode

make build     # constrói a imagem (PHP + extensões + Composer)
make install   # roda "composer install" dentro do container
make test      # roda toda a suíte de testes (PHP + SQL)
```

Outros comandos disponíveis no `Makefile`:

| Comando         | O que faz                                                  |
|-----------------|-------------------------------------------------------------|
| `make build`    | Constrói (ou reconstrói) a imagem Docker do projeto.         |
| `make install`  | Instala as dependências do Composer dentro do container.    |
| `make test`     | Roda toda a suíte de testes (PHP + SQL).                     |
| `make test-php` | Roda apenas a suíte de testes PHP.                           |
| `make test-sql` | Roda apenas a suíte de testes SQL.                           |
| `make shell`    | Abre um shell interativo (`bash`) dentro do container.       |
| `make down`     | Remove containers, imagem e volumes criados pelo projeto.    |
| `make clean`    | Alias de `make down`.                                        |

O código do repositório é montado dentro do container via bind mount (veja `docker-compose.yml`), então qualquer alteração feita localmente já é refletida nos comandos acima — não é necessário reconstruir a imagem ao adicionar um novo problema resolvido, apenas quando o próprio `Dockerfile` mudar (por exemplo, ao adicionar uma nova extensão do PHP).

## Rodando os testes sem Docker (alternativa)

Pré-requisitos: PHP 8.3+ com a extensão `pdo_sqlite` habilitada, e o [Composer](https://getcomposer.org/).

```bash
composer install
composer test        # equivalente a "vendor/bin/phpunit"
```

## Licença

Distribuído sob a licença definida em [`LICENSE`](LICENSE).
