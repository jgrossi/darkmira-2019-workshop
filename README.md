## Provisioning

The app was built with a `docker-compose.yml` file. So to run it just:

```
docker-compose up -d --build
``` 

Docker creates a database called `darkmira`, configured in the `.env.example` file. 

Now, just rename it, run composer to install dependencies and generate the Laravel's application key.

```
mv .env.example .env
docker-compose exec php composer install
```

Then visit http://localhost:8888 and you're going to see a welcome page.

### Xdebug

Follow the image below to configure xdebug with Phpstorm using Docker.

<img src="https://i.imgur.com/IaHYDwI.png">