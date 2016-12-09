---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

API EXEMPLO MCMM-MI TDI 2016 - NEWS API
<!-- END_INFO -->

#general
<!-- START_5a6599f3ecfca4d9787e34f0f3e9212d -->
## List All News

Listagem de todas as notícias existentes em base de dados

> Example request:

```bash
curl "http://localhost/api/news" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/news",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
[
    {
        "id": 1,
        "title": "Not\u00edcia 1",
        "description": "Descri\u00e7\u00e3o da not\u00edcia numero 1",
        "image": "imagem1.jpg",
        "created_at": "2016-10-20 10:17:01",
        "updated_at": "2016-10-20 10:17:01"
    },
    {
        "id": 2,
        "title": "Not\u00edcia 2",
        "description": "Descri\u00e7\u00e3o da not\u00edcia numero 2",
        "image": "imagem2.jpg",
        "created_at": "2016-10-20 10:17:01",
        "updated_at": "2016-10-20 10:17:01"
    },
    {
        "id": 3,
        "title": "Not\u00edcia 3",
        "description": "Descri\u00e7\u00e3o da not\u00edcia numero 3",
        "image": "imagem3.jpg",
        "created_at": "2016-10-20 10:17:01",
        "updated_at": "2016-10-20 10:17:01"
    },
    {
        "id": 4,
        "title": "Not\u00edcia 4",
        "description": "Descri\u00e7\u00e3o da not\u00edcia numero 4",
        "image": "imagem4.jpg",
        "created_at": "2016-10-20 10:17:01",
        "updated_at": "2016-10-20 10:17:01"
    },
    {
        "id": 5,
        "title": "Not\u00edcia 5",
        "description": "Descri\u00e7\u00e3o da not\u00edcia numero 5",
        "image": "imagem5.jpg",
        "created_at": "2016-10-20 10:17:01",
        "updated_at": "2016-10-20 10:17:01"
    },
    {
        "id": 6,
        "title": "Not\u00edcia 6",
        "description": "Descri\u00e7\u00e3o da not\u00edcia numero 6",
        "image": "imagem6.jpg",
        "created_at": "2016-10-20 10:17:01",
        "updated_at": "2016-10-20 10:17:01"
    },
    {
        "id": 7,
        "title": "titulo inserido 1",
        "description": "descri\u00e7\u00e3o inserida 1",
        "image": "imageinserted1.jpg",
        "created_at": "2016-10-20 10:51:35",
        "updated_at": "2016-10-20 10:51:35"
    },
    {
        "id": 8,
        "title": "titulo inserido 1",
        "description": "descri\u00e7\u00e3o inserida 1",
        "image": "imageinserted1.jpg",
        "created_at": "2016-10-20 11:00:59",
        "updated_at": "2016-10-20 11:00:59"
    },
    {
        "id": 9,
        "title": "titulo inserido 1",
        "description": "descri\u00e7\u00e3o inserida 1",
        "image": "imageinserted1.jpg",
        "created_at": "2016-10-20 11:01:00",
        "updated_at": "2016-10-20 11:01:00"
    },
    {
        "id": 10,
        "title": "titulo inserido 1",
        "description": "descri\u00e7\u00e3o inserida 1",
        "image": "imageinserted1.jpg",
        "created_at": "2016-10-20 11:01:05",
        "updated_at": "2016-10-20 11:01:05"
    },
    {
        "id": 11,
        "title": "titulo inserido 1",
        "description": "descri\u00e7\u00e3o inserida 1",
        "image": "imageinserted1.jpg",
        "created_at": "2016-10-20 11:01:06",
        "updated_at": "2016-10-20 11:01:06"
    },
    {
        "id": 12,
        "title": "titulo inserido 1",
        "description": "descri\u00e7\u00e3o inserida 1",
        "image": "imageinserted1.jpg",
        "created_at": "2016-10-20 11:29:14",
        "updated_at": "2016-10-20 11:29:14"
    },
    {
        "id": 13,
        "title": "titulo inserido 1",
        "description": "descri\u00e7\u00e3o inserida 1",
        "image": "imageinserted1.jpg",
        "created_at": "2016-10-20 11:36:14",
        "updated_at": "2016-10-20 11:36:14"
    }
]
```

### HTTP Request
`GET api/news`

`HEAD api/news`


<!-- END_5a6599f3ecfca4d9787e34f0f3e9212d -->
<!-- START_aeceef8aaaac3f0954bf7253ecfdb38a -->
## News Insert

Inserir uma nova notícia em base de dados

> Example request:

```bash
curl "http://localhost/api/news" \
-H "Accept: application/json" \
    -d "title"="dolores" \
    -d "description"="dolores" \
    -d "image"="dolores" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/news",
    "method": "POST",
    "data": {
        "title": "dolores",
        "description": "dolores",
        "image": "dolores"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/news`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | 
    description | string |  required  | 
    image | image |  required  | Must be an image (jpeg, png, bmp, gif, or svg)

<!-- END_aeceef8aaaac3f0954bf7253ecfdb38a -->
<!-- START_ae268a25480380e2a0d316c2fd903963 -->
## News Detail

Detalhe de uma notícia

> Example request:

```bash
curl "http://localhost/api/news/{news}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/news/{news}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/news/{news}`

`HEAD api/news/{news}`


<!-- END_ae268a25480380e2a0d316c2fd903963 -->
<!-- START_9366fbdef8dea9738966cdfd7daba9f7 -->
## News Update

Atualizar uma notícia em base de dados

> Example request:

```bash
curl "http://localhost/api/news/{news}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/news/{news}",
    "method": "PUT",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`PUT api/news/{news}`

`PATCH api/news/{news}`


<!-- END_9366fbdef8dea9738966cdfd7daba9f7 -->
<!-- START_bb2ed2300538ecd019d36ca11b3af3fe -->
## News Delete

Apagar uma notícia da base de dados

> Example request:

```bash
curl "http://localhost/api/news/{news}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/news/{news}",
    "method": "DELETE",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`DELETE api/news/{news}`


<!-- END_bb2ed2300538ecd019d36ca11b3af3fe -->
