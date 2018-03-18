## Learn PHP GraphQL Server using Mongo & Doctrine ODM

Hasil dari localhost:8080/graphql/ 

```
Hello from /grapql/ on http get
```

Setup Mongo
```
use graphql;
db.createUser({
    user: "valdie",
    pwd: "arsanur",
    roles: [{ 
        role: "userAdminAnyDatabase",
        db: "admin"
    }]
});
```

Sedangkan untuk mencoba controller POST, kita gunakan postman. Berikut adalah hasil dari localhost:8080/graphql/ pada http POST:

[ss 2]

Setup controller

[]

Setup Dependency Injection

[]

Setup GraphQL

