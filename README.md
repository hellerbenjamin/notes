# Notes App

## Local Setup
1. Composer install
2. `php artisan migrate`
3. `php artisan db:seed`

### Password Grant Request Token
Password grant client must be created if this auth strategy is to be used

`php artisan passport:client --password`

#### Example Authentication Request
https://documenter.getpostman.com/view/5857031/UVC3jnX1#36b2a507-f9e0-43fa-96fe-548583a6db26

### Endpoint Docs
https://documenter.getpostman.com/view/5857031/UVC3jnX1#158ac60e-de7f-4a94-ad86-68251c4a5577

For easy **local** testing run `php artisan db:seed TestUserSeeder`. This will seed the database with a test user with the following credentials
```
password: test123
email: ben@benjaminheller.dev
```

**IMPORTANT**
Header bearer token must be added to these endpoints

1. Get token via request
2. Add header bearer token to request this example:
```   
curl --location --request GET '{{baseUrl}}/api/notes/1' \
   --header 'Authorization: Bearer {{token}}
```
