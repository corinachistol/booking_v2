



## Booking Project  / v2.0

    -  vcs:git
    > docker:
        - php   <------------------ image:php:8.3-apache..
                                         ^
                                         |
                                         Dockerfile
                                         |
                                         +-- - gd / image processing      
                                         +-- + mysqlnd       
                                         +-- - composer       
                                         +-- + zlib       
                                         +-- + ...       
    ? mysql/ maria
    ? react





    +---------------------------+
    |                           |
    |                           |
    |          apache-mod-php <------- req HTTP / index.php ------
    |           v               |
    | [php] <---+               |
    |           ^               |
    |          cli  < input     |
    |                           |
    |                           |
    |                           |
    +---------------------------+