# Kinghost API-PHP
Cliente da API de revendas da [KingHost](http://www.kinghost.com.br)

## Utilização.
As classes deste repositório são compatíveis com PHP 5.2 ou superior, o uso mais simples é incluir diretamente as classes em seu código.

```
// Exemplo de requisição que adiciona multiplos recebimentos a uma caixa postal
require_once 'Email.php';

$login = 'loginemail@dominio.com.br';
$senha = 'xxxxxxx';

$kinghost = new Email($login, $senha);

$param = array(
    'idDominio'    => 1111111,
    'caixa'        => 'meuemail@dominio.com.br',
    'destino'      => 'email1@dominio.com.br,email2@dominio.com.br
);

$r = $kinghost->addMulti($param);
var_dump($r);
```

## Issues e suporte.
De modo garantir um suporte padronizado, reporte de bugs e/ou sugestões podem ser enviadas diretamente para o email [suporte@kinghost.com.br](mailto:suporte@kinghost.com.br) ou, se já for cliente, abra um chamado através do [painel de controle](https://painel.kinghost.com.br)  na categoria "Programação PHP"
