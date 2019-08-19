## Heroes API

Design an API (get, post, put, delete) based on normalization.

<p>Languange : PHP</p>
<p>Framework : Laravel 5.8</p>


API LIST :

<ul>
    <li>localhost:8000/heroes/api/heroes</li>
    <li>localhost:8000/heroes/api/powers</li>
    <li>localhost:8000/heroes/api/address</li>
</ul>

------------------------------------------------

POST Create

-   localhost:8000/heroes/api/heroes<br>
    Param : fullname, gender
    <br>
-   localhost:8000/heroes/api/powers<br>
    Param : powers
    <br>
-   localhost:8000/heroes/api/address<br>
    Param : address, city, country
    <br>

PUT Update

-   localhost:8000/heroes/api/heroes/{id}<br>
    param : fullname, gender<br>
-   localhost:8000/heroes/api/powers/{id}<br>
    param : powers<br>
-   localhost:8000/heroes/api/address/{id}<br>
    param : address, city, country<br>

DELETE 

-   localhost:8000/heroes/api/heroes/{id}<br>
-   localhost:8000/heroes/api/powers/{id}<br>
-   localhost:8000/heroes/api/address/{id}<br>

GET Index

-   localhost:8000/heroes/api/heroes<br>
-   localhost:8000/heroes/api/powers<br>
-   localhost:8000/heroes/api/address<br>

GET Show

-   localhost:8000/heroes/api/heroes/{id}<br>
-   localhost:8000/heroes/api/powers/{id}<br>
-   localhost:8000/heroes/api/address/{id}<br>
