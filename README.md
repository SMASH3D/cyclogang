Cyclogang
==============

Building up social features on top of strava

## Installation

```git clone https://github.com/SMASH3D/cyclogang```

```docker-compose -up```
If errors come up while bringing up db container, it might be a conflict over port 3306, stop your local MySQL server if you just want to start working immediately 

```sudo service mysql stop```

Note : you can rebuild all Docker images by running:

```docker-compose build```

## Containers
Here are the docker-compose built images:

**db**: This is the MySQL database container

**php**: This is the PHP-FPM container including the application volume mounted on

**nginx**: This is the Nginx webserver container in which php volumes are mounted too

**elk**: This is a ELK stack container which uses Logstash to collect logs, send them into Elasticsearch and visualize them with Kibana.

## Web
http://cyclogang.localhost:80

## Kibana
http://cyclogang.localhost:81

## Use xdebug!
To use xdebug change the line "docker.host:127.0.0.1" in docker-compose.yml and replace 127.0.0.1 with your machine ip address. If your IDE default port is not set to 5902 you should do that, too.

## Read logs
You can access Nginx and Symfony application logs in the following directories on your host machine:

  cyclogang/logs/nginx
  
  cyclogang/logs/symfony