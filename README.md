# docker-compose-wordpress



## Usage

To get started, make sure you have [Docker installed](https://docs.docker.com/docker-for-mac/install/) on your system, and then clone this repository.

Next, navigate in your terminal to the directory you cloned this, and spin up the containers for the web server by running `docker-compose up -d --build app`.

After that completes, follow the steps from the [src/README.md](src/README.md) file to get your WordPress installation added in (or create a new blank one).

Bringing up the Docker Compose network with `app` instead of just using `up`, ensures that only our site's containers are brought up at the start, instead of all of the command containers as well. The following are built for our web server, with their exposed ports detailed:

- **nginx** - `:80`
- **mysql** - `:3306`
- **php** - `:9000`

An additional container is included that lets you use the wp-cli app without having to install it on your local machine. Use the following command examples from your project root, modifying them to fit your particular use case.

- `docker-compose run --rm wp user list`

## Persistent MySQL Storage

By default, whenever you bring down the Docker network, your MySQL data will be removed after the containers are destroyed. If you would like to have persistent of data that remains after bringing containers down and back up, do the following:

1. Create a `data` folder in the project root.
2. Under the mysql service in your `docker-compose.yml` file, uncomment the line ` # - ./data:/var/lib/mysql`.

```
volumes:
  - ./data:/var/lib/mysql
```
