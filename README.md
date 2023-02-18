# Smaller Web Hexagon PHP

Implementação do exemplo de arquitetura hexagonal de Alistair Cockburn: Smaller Web Hexagon

## Instalação

```sh
composer install
```

## Execução

Para rodar o projeto, digite no seu terminal:

```sh
php -S localhost:8080 -t src
```

E então acesse <http://localhost:8080>, para interagir com a aplicação
você pode usar dois query params: source e value. Ex:

<http://localhost:8080?source=memory&value=100>

<http://localhost:8080?source=database&value=100>

<http://localhost:8080?source=json&value=100>

Os valores possíveis para source são: memory, database e json.

Para rodar os testes, digite no seu terminal:

```sh
./vendor/bin/pest
```
