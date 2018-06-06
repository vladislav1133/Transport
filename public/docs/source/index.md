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

#Cities
<!-- START_c1850860a1bd09d955052a405864b21e -->
## Display all buses for specified city

> Example request:

```bash
curl -X GET "http://localhost/api/v1/cities/{id}/transports" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/cities/{id}/transports",
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
    "status": true,
    "data": {
        "transports": [
            [
                {
                    "id": 1,
                    "route_id": 1,
                    "number": "289",
                    "type": "bus",
                    "price": "4.0 UAH",
                    "interval": "15-20",
                    "work_time": "7:00-21:45",
                    "created_at": "2018-05-30 05:21:40",
                    "updated_at": "2018-05-30 05:21:40"
                }
            ]
        ]
    }
}
```

### HTTP Request
`GET api/v1/cities/{id}/transports`

`HEAD api/v1/cities/{id}/transports`


<!-- END_c1850860a1bd09d955052a405864b21e -->

<!-- START_3ecd9bc5dd79621a37a857ab1e77061e -->
## Display all routes for specified city

> Example request:

```bash
curl -X GET "http://localhost/api/v1/cities/{id}/routes" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/cities/{id}/routes",
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
    "status": true,
    "data": {
        "routes": [
            {
                "id": 1,
                "city_id": 1,
                "distance": 2.88,
                "created_at": "2018-05-30 05:21:41",
                "updated_at": "2018-05-30 05:21:41",
                "stops": [
                    {
                        "id": 1,
                        "name": "м. Пушкинская 2",
                        "lon": 36.247834,
                        "lat": 50.004178,
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40",
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
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40",
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
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40",
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
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40",
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
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40",
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
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40",
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
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40",
                        "pivot": {
                            "route_id": 1,
                            "stop_id": 7
                        }
                    }
                ]
            }
        ]
    }
}
```

### HTTP Request
`GET api/v1/cities/{id}/routes`

`HEAD api/v1/cities/{id}/routes`


<!-- END_3ecd9bc5dd79621a37a857ab1e77061e -->

#Countries
<!-- START_835512460a11f84fe321495c11302183 -->
## Display all available countries

> Example request:

```bash
curl -X GET "http://localhost/api/v1/countries" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/countries",
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
    "status": true,
    "data": {
        "countries": [
            {
                "id": 228,
                "code": "UA",
                "name": "Ukraine",
                "available": 1,
                "created_at": "2018-05-30 05:21:39",
                "updated_at": "2018-05-30 05:21:39"
            }
        ]
    }
}
```

### HTTP Request
`GET api/v1/countries`

`HEAD api/v1/countries`


<!-- END_835512460a11f84fe321495c11302183 -->

<!-- START_7d99b50403f17c446463591cd33e2ab7 -->
## Display all available cities for specified country

> Example request:

```bash
curl -X GET "http://localhost/api/v1/countries/{code}/cities" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/countries/{code}/cities",
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
    "status": false,
    "errors": [
        "Not Found"
    ]
}
```

### HTTP Request
`GET api/v1/countries/{code}/cities`

`HEAD api/v1/countries/{code}/cities`


<!-- END_7d99b50403f17c446463591cd33e2ab7 -->

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
{
    "status": true,
    "data": {
        "routes": [
            {
                "id": 1,
                "city_id": 1,
                "distance": 2.88,
                "created_at": "2018-05-30 05:21:41",
                "updated_at": "2018-05-30 05:21:41",
                "stops": [
                    {
                        "id": 1,
                        "name": "м. Пушкинская 2",
                        "lon": 36.247834,
                        "lat": 50.004178,
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40",
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
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40",
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
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40",
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
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40",
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
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40",
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
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40",
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
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40",
                        "pivot": {
                            "route_id": 1,
                            "stop_id": 7
                        }
                    }
                ]
            }
        ]
    }
}
```

### HTTP Request
`GET api/v1/routes`

`HEAD api/v1/routes`


<!-- END_e2f3d7fb3c463a6d8fc1fb3fa9f19e11 -->

<!-- START_e73d089bbe423491becf7ec69ea105ef -->
## Display the specified route

> Example request:

```bash
curl -X GET "http://localhost/api/v1/routes/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/routes/{id}",
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
    "city_id": 1,
    "distance": 2.88,
    "created_at": "2018-05-30 05:21:41",
    "updated_at": "2018-05-30 05:21:41",
    "stops": [
        {
            "id": 1,
            "name": "м. Пушкинская 2",
            "lon": 36.247834,
            "lat": 50.004178,
            "created_at": "2018-05-30 05:21:40",
            "updated_at": "2018-05-30 05:21:40",
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
            "created_at": "2018-05-30 05:21:40",
            "updated_at": "2018-05-30 05:21:40",
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
            "created_at": "2018-05-30 05:21:40",
            "updated_at": "2018-05-30 05:21:40",
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
            "created_at": "2018-05-30 05:21:40",
            "updated_at": "2018-05-30 05:21:40",
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
            "created_at": "2018-05-30 05:21:40",
            "updated_at": "2018-05-30 05:21:40",
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
            "created_at": "2018-05-30 05:21:40",
            "updated_at": "2018-05-30 05:21:40",
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
            "created_at": "2018-05-30 05:21:40",
            "updated_at": "2018-05-30 05:21:40",
            "pivot": {
                "route_id": 1,
                "stop_id": 7
            }
        }
    ]
}
```

### HTTP Request
`GET api/v1/routes/{id}`

`HEAD api/v1/routes/{id}`


<!-- END_e73d089bbe423491becf7ec69ea105ef -->

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
        "created_at": "2018-05-30 05:21:40",
        "updated_at": "2018-05-30 05:21:40"
    },
    {
        "id": 2,
        "name": "ул. Студенческая",
        "lon": 36.251998,
        "lat": 50.00744,
        "created_at": "2018-05-30 05:21:40",
        "updated_at": "2018-05-30 05:21:40"
    },
    {
        "id": 3,
        "name": "спуск Журавлёвский",
        "lon": 36.254763,
        "lat": 50.010589,
        "created_at": "2018-05-30 05:21:40",
        "updated_at": "2018-05-30 05:21:40"
    },
    {
        "id": 4,
        "name": "Спорткомплекс",
        "lon": 36.259777,
        "lat": 50.015822,
        "created_at": "2018-05-30 05:21:40",
        "updated_at": "2018-05-30 05:21:40"
    },
    {
        "id": 5,
        "name": "Институт прокуратуры",
        "lon": 36.2639,
        "lat": 50.018403,
        "created_at": "2018-05-30 05:21:40",
        "updated_at": "2018-05-30 05:21:40"
    },
    {
        "id": 6,
        "name": "Факультет Мехатроники ТС ХНАДУ",
        "lon": 36.266584,
        "lat": 50.019612,
        "created_at": "2018-05-30 05:21:40",
        "updated_at": "2018-05-30 05:21:40"
    },
    {
        "id": 7,
        "name": "13-е городское кладбище",
        "lon": 36.270597,
        "lat": 50.020892,
        "created_at": "2018-05-30 05:21:40",
        "updated_at": "2018-05-30 05:21:40"
    }
]
```

### HTTP Request
`GET api/v1/stops`

`HEAD api/v1/stops`


<!-- END_7c200603bc9096fbd79a4a9df3df03dc -->

<!-- START_40ecf63ab0e072eb290381940691abb0 -->
## Display a nearest bus for user.

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
    "message": "The given data was invalid.",
    "errors": {
        "lon": [
            "The lon field is required."
        ],
        "lat": [
            "The lat field is required."
        ]
    }
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

<!-- START_0bcfc82a06f321a919516fb4e2473c23 -->
## Display the specified stop.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/stops/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/stops/{id}",
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
    "status": true,
    "data": {
        "stop": {
            "id": 1,
            "name": "м. Пушкинская 2",
            "lon": 36.247834,
            "lat": 50.004178,
            "created_at": "2018-05-30 05:21:40",
            "updated_at": "2018-05-30 05:21:40"
        }
    }
}
```

### HTTP Request
`GET api/v1/stops/{id}`

`HEAD api/v1/stops/{id}`


<!-- END_0bcfc82a06f321a919516fb4e2473c23 -->

#Transports
<!-- START_0428247d4a10003d950e1b8dfaf6fc01 -->
## Display a listing of the transports.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/transports" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/transports",
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
    "status": true,
    "data": {
        "transports": [
            {
                "id": 1,
                "route_id": 1,
                "number": "289",
                "type": "bus",
                "price": "4.0 UAH",
                "interval": "15-20",
                "work_time": "7:00-21:45",
                "created_at": "2018-05-30 05:21:40",
                "updated_at": "2018-05-30 05:21:40",
                "vehicles": [
                    {
                        "id": 1,
                        "transport_id": 1,
                        "direction": 1,
                        "lon": 36.247834,
                        "lat": 50.004178,
                        "created_at": "2018-05-30 05:21:40",
                        "updated_at": "2018-05-30 05:21:40"
                    },
                    {
                        "id": 2,
                        "transport_id": 1,
                        "direction": 1,
                        "lon": 36.254763,
                        "lat": 50.010589,
                        "created_at": "2018-05-30 05:21:41",
                        "updated_at": "2018-05-30 05:21:41"
                    },
                    {
                        "id": 3,
                        "transport_id": 1,
                        "direction": 0,
                        "lon": 36.266584,
                        "lat": 50.019612,
                        "created_at": "2018-05-30 05:21:41",
                        "updated_at": "2018-05-30 05:21:41"
                    }
                ]
            }
        ]
    }
}
```

### HTTP Request
`GET api/v1/transports`

`HEAD api/v1/transports`


<!-- END_0428247d4a10003d950e1b8dfaf6fc01 -->

<!-- START_3e48382bb469972960b6ed2a868603ea -->
## Display the specified transport.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/transports/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/transports/{id}",
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
    "status": true,
    "data": {
        "transport": {
            "id": 1,
            "route_id": 1,
            "number": "289",
            "type": "bus",
            "price": "4.0 UAH",
            "interval": "15-20",
            "work_time": "7:00-21:45",
            "created_at": "2018-05-30 05:21:40",
            "updated_at": "2018-05-30 05:21:40",
            "vehicles": [
                {
                    "id": 1,
                    "transport_id": 1,
                    "direction": 1,
                    "lon": 36.247834,
                    "lat": 50.004178,
                    "created_at": "2018-05-30 05:21:40",
                    "updated_at": "2018-05-30 05:21:40"
                },
                {
                    "id": 2,
                    "transport_id": 1,
                    "direction": 1,
                    "lon": 36.254763,
                    "lat": 50.010589,
                    "created_at": "2018-05-30 05:21:41",
                    "updated_at": "2018-05-30 05:21:41"
                },
                {
                    "id": 3,
                    "transport_id": 1,
                    "direction": 0,
                    "lon": 36.266584,
                    "lat": 50.019612,
                    "created_at": "2018-05-30 05:21:41",
                    "updated_at": "2018-05-30 05:21:41"
                }
            ]
        }
    }
}
```

### HTTP Request
`GET api/v1/transports/{id}`

`HEAD api/v1/transports/{id}`


<!-- END_3e48382bb469972960b6ed2a868603ea -->

#Vehicles
<!-- START_12ff41f7ad1178889ff27d3f37371473 -->
## Display a listing of the vehicles.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/vehicles" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/vehicles",
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
    "status": true,
    "data": {
        "vehicles": [
            {
                "id": 1,
                "transport_id": 1,
                "direction": 1,
                "lon": 36.247834,
                "lat": 50.004178,
                "created_at": "2018-05-30 05:21:40",
                "updated_at": "2018-05-30 05:21:40"
            },
            {
                "id": 2,
                "transport_id": 1,
                "direction": 1,
                "lon": 36.254763,
                "lat": 50.010589,
                "created_at": "2018-05-30 05:21:41",
                "updated_at": "2018-05-30 05:21:41"
            },
            {
                "id": 3,
                "transport_id": 1,
                "direction": 0,
                "lon": 36.266584,
                "lat": 50.019612,
                "created_at": "2018-05-30 05:21:41",
                "updated_at": "2018-05-30 05:21:41"
            }
        ]
    }
}
```

### HTTP Request
`GET api/v1/vehicles`

`HEAD api/v1/vehicles`


<!-- END_12ff41f7ad1178889ff27d3f37371473 -->

<!-- START_1a23e8b95bbe6e1a88591b687cff3158 -->
## Display the specified vehicle.

> Example request:

```bash
curl -X GET "http://localhost/api/v1/vehicles/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/vehicles/{id}",
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
    "status": true,
    "data": {
        "vehicle": {
            "id": 1,
            "transport_id": 1,
            "direction": 1,
            "lon": 36.247834,
            "lat": 50.004178,
            "created_at": "2018-05-30 05:21:40",
            "updated_at": "2018-05-30 05:21:40"
        }
    }
}
```

### HTTP Request
`GET api/v1/vehicles/{id}`

`HEAD api/v1/vehicles/{id}`


<!-- END_1a23e8b95bbe6e1a88591b687cff3158 -->

<!-- START_698e4398a5187cbc465191401cbd3968 -->
## Update the specified vehicle.

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/vehicles/{id}" \
-H "Accept: application/json" \
    -d "lon"="1873262742" \
    -d "lat"="1873262742" \
    -d "direction"="1" \
    -d "token"="officiis" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/vehicles/{id}",
    "method": "PUT",
    "data": {
        "lon": 1873262742,
        "lat": 1873262742,
        "direction": 1,
        "token": "officiis"
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
`PUT api/v1/vehicles/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    lon | numeric |  required  | Minimum: `0`
    lat | numeric |  required  | Minimum: `0`
    direction | numeric |  required  | Between: `0` and `1`
    token | string |  required  | 

<!-- END_698e4398a5187cbc465191401cbd3968 -->

