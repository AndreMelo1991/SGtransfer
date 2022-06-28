# SGtransfer

Sistema de transferência de pagamentos, criado com a finalidade de testes para Empresa X.

Como Rodar a Applicação<br/>
•	Clone o repositório comando =  git clone
•	Copie .env.example para .env e edite as configuraçãoes incluído suas credencias de banco de dados
•	Voce pode utilizar qualquer banco que o ORM eloquent tenha suporte, no meu caso utilizei o MYSQL
•	Rode o comando = composer install
•	Rode o comando =  php artisan key:generate
•	Rode o comando = php artisan migrate --seed  para criar as tabelas via migrate e também para popular os dados.
•	Após isto start seu apache utilizado aqui localmente o serve do artisan caso necessite segue o comando  php artisan serve
Como utilizar
•	Primeiro deve-se autenticar via jw token na api, utilizando o end poit /api/authenticate
•	Recuperar o token e informar nas transações tanto como autenticador como na tag token
•	Exemplo de request
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9hdXRoZW50aWNhdGUiLCJpYXQiOjE2NTY0NDYxNDAsImV4cCI6MTY1NjQ0OTc0MCwibmJmIjoxNjU2NDQ2MTQwLCJqdGkiOiJkYlVlR1ZKUXRwYUdHZTluIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.2Rhgm3FFoKfAn10YWY9wABrLuen6dBYG_uupdL07S8k",
    "value": "5.00",
    "user_id": "1",
    "user_id_send": "2",
}

value = Valor da Transação
user_id = Usuário que vai ser debitado a transação
user_id_send = Usuário que vai receber a transação





