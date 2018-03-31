# learn-php-graphql-server
Using [GraphQL Server](https://github.com/webonyx/graphql-php), SLIM Framework, PHP-DI, PSR-7, Doctrine Mongo ODM

## How to deploy

#### TL;DR : build docker container and install composer dependencies

In this step, you must use `docker` to work.

The apps is wrapped by docker container and the dependency is wrapped with composer. All configuration is all set for you to deploy. The only step is to build container and install the composer's dependencies
* To build docker container, simply using command below
```
cd docker # move to docker dir
docker-compose up -d # build container
```
* then run composer to install dependencies listed in `./workspace/project/composer.json`. Composer is already installed in container `dev-php`, so you could run composer from the container with this command:
```
docker exec -ti -w /home/workspace/project/ dev-php composer install
```
`/home/workspace/project` targets volume on the container so you don't have to change any argument on command above

## Test the Endpoint
The endpoint in this project can be accessed at `http://localhost:8080/graphql` using `POST` method
* You can use HTTP client testing tools such as Curl or Postman to test the endpoint
* But I suggest using native tools to interact with GraphQL response format. You can use Chrome Extension, [ChromeiQL](https://chrome.google.com/webstore/detail/chromeiql/fkkiamalmpiidkljmicmjfbieiclmeij/related?hl=en-US)


### Run with Query
* Query below will fetch all of the product in datastore
```
query { 
  products {
    id,
    name
  }
}
```
* Query below will select one product in datastore identified by id
```
query { 
  product(id:"<product id>") {
    id,
    name
  }
}
```


### Run with Mutation
* Query below will put new product on datastore
```
mutation { 
  createProduct(
    name:"Ayam Kampung",
    price:"120000"
  ) {
    id,
    name
  }
}
```


## Remove the Container
If you want to remove the app, you also should stop and remove the container and images. Simply using command below to the container:
```
docker-compose down
```
