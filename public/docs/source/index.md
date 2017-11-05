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
<!-- END_INFO -->

#Buses
<!-- START_68c566ea3f815726c4768b79926a8234 -->
## Display a listing of the buses.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/buses" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/buses",
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
        "description_id": 1,
        "route_id": 1,
        "number": "289",
        "direction": 1,
        "lon": 36.266584,
        "lat": 50.019612,
        "created_at": "2017-11-02 06:35:09",
        "updated_at": "2017-11-02 06:35:09"
    }
]
```

### HTTP Request
`GET api/v1/buses`

`HEAD api/v1/buses`


<!-- END_68c566ea3f815726c4768b79926a8234 -->

<!-- START_1584a6395666a18e229a391d93b3c7e7 -->
## Display the specified bus.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/buses/{id}/{relation?}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/buses/{id}/{relation?}",
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
{
    "id": 1,
    "description_id": 1,
    "route_id": 1,
    "number": "289",
    "direction": 1,
    "lon": 36.266584,
    "lat": 50.019612,
    "created_at": "2017-11-02 06:35:09",
    "updated_at": "2017-11-02 06:35:09"
}
```

### HTTP Request
`GET api/v1/buses/{id}/{relation?}`

`HEAD api/v1/buses/{id}/{relation?}`


<!-- END_1584a6395666a18e229a391d93b3c7e7 -->

<!-- START_5fa0de796b4fb7b2b050a2b23e072eeb -->
## Update the specified bus.

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/buses/{id}" \
-H "Accept: application/json" \
    -d "lon"="955440826" \
    -d "lat"="955440826" \
    -d "direction"="0" \
    -d "token"="dignissimos" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/buses/{id}",
    "method": "PUT",
    "data": {
        "lon": 955440826,
        "lat": 955440826,
        "direction": 0,
        "token": "dignissimos"
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
`PUT api/v1/buses/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    lon | numeric |  required  | Minimum: `0`
    lat | numeric |  required  | Minimum: `0`
    direction | numeric |  required  | Between: `0` and `1`
    token | string |  required  | 

<!-- END_5fa0de796b4fb7b2b050a2b23e072eeb -->

#Routes
<!-- START_e2f3d7fb3c463a6d8fc1fb3fa9f19e11 -->
## Display a listing of the routes.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/routes" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/routes",
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
        "distance": 2.88,
        "created_at": "2017-11-02 06:35:09",
        "updated_at": "2017-11-02 06:35:09",
        "stops": [
            {
                "id": 1,
                "name": "м. Пушкинская 2",
                "lon": 36.247834,
                "lat": 50.004178,
                "created_at": "2017-11-02 06:35:08",
                "updated_at": "2017-11-02 06:35:08",
                "pivot": {
                    "route_id": 1,
                    "stop_id": 1
                }
            },
            {
                "id": 2,
                "name": "ул. Студенческая",
                "lon": 36.251998,
                "lat": 50.00744,
                "created_at": "2017-11-02 06:35:08",
                "updated_at": "2017-11-02 06:35:08",
                "pivot": {
                    "route_id": 1,
                    "stop_id": 2
                }
            },
            {
                "id": 3,
                "name": "спуск Журавлёвский",
                "lon": 36.254763,
                "lat": 50.010589,
                "created_at": "2017-11-02 06:35:08",
                "updated_at": "2017-11-02 06:35:08",
                "pivot": {
                    "route_id": 1,
                    "stop_id": 3
                }
            },
            {
                "id": 4,
                "name": "Спорткомплекс",
                "lon": 36.259777,
                "lat": 50.015822,
                "created_at": "2017-11-02 06:35:09",
                "updated_at": "2017-11-02 06:35:09",
                "pivot": {
                    "route_id": 1,
                    "stop_id": 4
                }
            },
            {
                "id": 5,
                "name": "Институт прокуратуры",
                "lon": 36.2639,
                "lat": 50.018403,
                "created_at": "2017-11-02 06:35:09",
                "updated_at": "2017-11-02 06:35:09",
                "pivot": {
                    "route_id": 1,
                    "stop_id": 5
                }
            },
            {
                "id": 6,
                "name": "Факультет Мехатроники ТС ХНАДУ",
                "lon": 36.266584,
                "lat": 50.019612,
                "created_at": "2017-11-02 06:35:09",
                "updated_at": "2017-11-02 06:35:09",
                "pivot": {
                    "route_id": 1,
                    "stop_id": 6
                }
            },
            {
                "id": 7,
                "name": "13-е городское кладбище",
                "lon": 36.270597,
                "lat": 50.020892,
                "created_at": "2017-11-02 06:35:09",
                "updated_at": "2017-11-02 06:35:09",
                "pivot": {
                    "route_id": 1,
                    "stop_id": 7
                }
            }
        ]
    }
]
```

### HTTP Request
`GET api/v1/routes`

`HEAD api/v1/routes`


<!-- END_e2f3d7fb3c463a6d8fc1fb3fa9f19e11 -->

<!-- START_b0188eb092324bfea8f844a439f91074 -->
## Display the specified route.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/routes/{id}/{relation?}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/routes/{id}/{relation?}",
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
{
    "id": 1,
    "distance": 2.88,
    "created_at": "2017-11-02 06:35:09",
    "updated_at": "2017-11-02 06:35:09"
}
```

### HTTP Request
`GET api/v1/routes/{id}/{relation?}`

`HEAD api/v1/routes/{id}/{relation?}`


<!-- END_b0188eb092324bfea8f844a439f91074 -->

#Stops
<!-- START_7c200603bc9096fbd79a4a9df3df03dc -->
## Display a listing of the stops.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/stops" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/stops",
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
        "name": "м. Пушкинская 2",
        "lon": 36.247834,
        "lat": 50.004178,
        "created_at": "2017-11-02 06:35:08",
        "updated_at": "2017-11-02 06:35:08"
    },
    {
        "id": 2,
        "name": "ул. Студенческая",
        "lon": 36.251998,
        "lat": 50.00744,
        "created_at": "2017-11-02 06:35:08",
        "updated_at": "2017-11-02 06:35:08"
    },
    {
        "id": 3,
        "name": "спуск Журавлёвский",
        "lon": 36.254763,
        "lat": 50.010589,
        "created_at": "2017-11-02 06:35:08",
        "updated_at": "2017-11-02 06:35:08"
    },
    {
        "id": 4,
        "name": "Спорткомплекс",
        "lon": 36.259777,
        "lat": 50.015822,
        "created_at": "2017-11-02 06:35:09",
        "updated_at": "2017-11-02 06:35:09"
    },
    {
        "id": 5,
        "name": "Институт прокуратуры",
        "lon": 36.2639,
        "lat": 50.018403,
        "created_at": "2017-11-02 06:35:09",
        "updated_at": "2017-11-02 06:35:09"
    },
    {
        "id": 6,
        "name": "Факультет Мехатроники ТС ХНАДУ",
        "lon": 36.266584,
        "lat": 50.019612,
        "created_at": "2017-11-02 06:35:09",
        "updated_at": "2017-11-02 06:35:09"
    },
    {
        "id": 7,
        "name": "13-е городское кладбище",
        "lon": 36.270597,
        "lat": 50.020892,
        "created_at": "2017-11-02 06:35:09",
        "updated_at": "2017-11-02 06:35:09"
    }
]
```

### HTTP Request
`GET api/v1/stops`

`HEAD api/v1/stops`


<!-- END_7c200603bc9096fbd79a4a9df3df03dc -->

<!-- START_40ecf63ab0e072eb290381940691abb0 -->
## Display the nearest bus for user.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/stops/nearestbus/{stopId}" \
-H "Accept: application/json" \
    -d "lon"="370961550" \
    -d "lat"="370961550" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/stops/nearestbus/{stopId}",
    "method": "GET",
    "data": {
        "lon": 370961550,
        "lat": 370961550
},
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
{
    "message": "This action is unauthorized.",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\AccessDeniedHttpException",
    "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
    "line": 201,
    "trace": [
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
            "line": 175,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\app\\Exceptions\\Handler.php",
            "line": 51,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 83,
            "function": "render",
            "class": "App\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 32,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 149,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 57,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 149,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 102,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 647,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 622,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 588,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 577,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 56,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 149,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 149,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 149,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 149,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode.php",
            "line": 46,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 149,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 53,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 102,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Mpociot\\ApiDoc\\Generators\\LaravelGenerator.php",
            "line": 116,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Mpociot\\ApiDoc\\Generators\\AbstractGenerator.php",
            "line": 98,
            "function": "callRoute",
            "class": "Mpociot\\ApiDoc\\Generators\\LaravelGenerator",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Mpociot\\ApiDoc\\Generators\\LaravelGenerator.php",
            "line": 58,
            "function": "getRouteResponse",
            "class": "Mpociot\\ApiDoc\\Generators\\AbstractGenerator",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Mpociot\\ApiDoc\\Commands\\GenerateDocumentation.php",
            "line": 261,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Generators\\LaravelGenerator",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Mpociot\\ApiDoc\\Commands\\GenerateDocumentation.php",
            "line": 83,
            "function": "processLaravelRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 549,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 180,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 264,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 167,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\symfony\\console\\Application.php",
            "line": 888,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\symfony\\console\\Application.php",
            "line": 224,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\symfony\\console\\Application.php",
            "line": 125,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 88,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 121,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\STUDY\\Laravel\\transport\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```

### HTTP Request
`GET api/v1/stops/nearestbus/{stopId}`

`HEAD api/v1/stops/nearestbus/{stopId}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    lon | numeric |  required  | Minimum: `0`
    lat | numeric |  required  | Minimum: `0`

<!-- END_40ecf63ab0e072eb290381940691abb0 -->

<!-- START_db23d066d586f867c4f114438c07b2b5 -->
## Display the specified stop.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/stops/{id}/{relation?}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/stops/{id}/{relation?}",
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
{
    "id": 1,
    "name": "м. Пушкинская 2",
    "lon": 36.247834,
    "lat": 50.004178,
    "created_at": "2017-11-02 06:35:08",
    "updated_at": "2017-11-02 06:35:08"
}
```

### HTTP Request
`GET api/v1/stops/{id}/{relation?}`

`HEAD api/v1/stops/{id}/{relation?}`


<!-- END_db23d066d586f867c4f114438c07b2b5 -->

