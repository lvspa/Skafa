# Sistema de Conexão com Banco em PHP

##  Objetivo
Testar e validar conexão com banco de dados MySQL usando PDO em PHP.

##  Estrutura
- `config.php`: configurações básicas (host, dbname, user, senha)
- `ConexaoBD.php`: classe `Database` que gerencia conexão e desconexão com o banco

## O que foi feito
- Criação da classe `Database`
- Configuração do PDO com tratamento de exceções

## Erro encontrado
**Mensagem:** `Access denied for user ''@'localhost' (using password: NO)`

**Diagnóstico:**
- A vírgula foi colocada errada após a string DSN, fazendo o PHP quebrar a linha de forma incorreta.
- Isso impediu o envio correto de `username` e `password` pro construtor do PDO.

**Solução aplicada:**
```php
self::$conn = new PDO(
    "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8",
    $config['username'],
    $config['password']
);
```

# Aprendizados

    PHP quebra interpolação se não usar {} ao acessar arrays em strings.

    Nunca encerrar string de DSN com vírgula.

    Sempre revisar erro Access denied, pois pode indicar erro de sintaxe na conexão, não só credencial errada.
