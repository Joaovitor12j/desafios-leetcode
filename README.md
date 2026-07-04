# Desafios LeetCode

Arquivo pessoal de desafios do LeetCode já resolvidos, com soluções em PHP e SQL, cada uma acompanhada de testes automatizados em PHPUnit.

Cada problema resolvido vive em sua própria pasta dentro de `PHP/` ou `SQL/` (ex.: `PHP/171-excel-sheet-column-number/`), contendo o enunciado em português (`README.md`), a solução (`solution.php` ou `solution.sql`) e os testes (`SolutionTest.php`).

## Rodando os testes com Docker (recomendado)

Pré-requisitos: Docker e Docker Compose v2 (comando `docker compose`, sem hífen).

```bash
git clone <url-do-repositorio>
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
