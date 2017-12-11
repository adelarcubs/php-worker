# php-worker

## Uso

RabbitMQ
```
docker run -d --hostname my-rabbit --name some-rabbit -p 8888:15672 rabbitmq:3-management
```

Conforme documentação
```
https://hub.docker.com/_/rabbitmq/
Usuário e senha guest
```

Rode o servidor
```
php -S 0.0.0.0:8080 index.php
```

Para facilitar, fiz um bash, docker.sh
```
./docker.sh
```
