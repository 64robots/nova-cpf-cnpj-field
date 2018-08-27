# Brazilian CPF and CNPJ for Laravel Nova

This field provides built-in validation for a Brazilian CPF

### Install

Run this command into your nova project:

`composer require r64/nova-cpf-cnpj-field`

### Add it to your Nova Resource:

```php
use R64\NovaCpfCnpjField\Cpf;
use R64\NovaCpfCnpjField\Cnpj;

Cpf::make('cpf');
Cnpj::make('cnpj');
```
