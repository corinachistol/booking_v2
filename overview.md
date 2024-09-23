



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
                                         +-- + composer  (dev tool)  
                                                  |
                                                  +-- composer init
                                                  +-- class autoloading
                                                                index.php ---- require_once './vendor/autoload.php';
                                                  +-- ...   
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



## Composer lesson3 (simialr to npm-node)











    - packaging management, install/update/delete dependencies
    - genereaza scheletul proiectelor dupa standartul psr
    - iti ofera posibilitatea de a gasi mai repede clasele si functiile, autoloading
    - namespace


    > make easier templating
        * native php <tag><?= $variable ?></tag>
            - complex syntax
            - no universal language
            - no blocks principle
            - other DX features
            - caching

        * TEMPLATING ENGINE:
            - twig (symfony, Drupal)
            - blade (Laravel)
            - wordpress (basics)


    TEMPLATING ENGINE

    [TEMPLATE/view] ---------> render() ------------> PAGE
                                 ^
                                 |
                                 data + expressions 





    compsoer require <vendor_id>/<package_id> 
                                    ^
                                    |
                                    +----- download dependencies







## lesson4

pattern: S.O.L.I.D. (OOP)
pattern: MVTemplate (MVController)
pattern:...

    > templating
    










BROWSER ---> res (HTML) <------- twig render('home.html.twig) <------ data <----- mysqli <------ docker <---- mariadb server
                                                                                                                    ^
                                                                                                                    |
                                                                                                                booking 
                                                                                                                    ^
                                                                                                                    |
                                                                                                                tours
                                                                                                                    |
                                                                                                                data







+-----------------------------------------------------+
|                                                     |
|      host machine                                               |
|                                                     |  localhost     <---- 13306:3306 --> [mariadb] / booking_mariadb
|                                                     |                                       ^
                                                                                              |
                                                                                              booking-net
                                                                                              |
                                                                                              v
|                                         |                             <---- 8088:80 -----> [php]  booking_php
|                                                     |                                       ^
|                                                     |                                       |
|                                                     |                                     PDO['localhost']
+-----------------------------------------------------+





query parameter
?page=...







## lesson6  
                        +------- renderhome(..)
                       /
    index.php  --------> ?
                       \
                        ^  +------- renderReviews(..)
                        |   404
                        | ----------> render404()
                        |
                        |
                        router

                    OPTIMIZATION:
                     - url: ?page=reviews -> /reviews (url rewrite)
                     + DRY: model 
                     + DRY: view 







## lesson7

ORM ( Object Relational Mapper) / ODM / OGM 
DDD (main driving design, key words= Domain / Entity (Modle))



<app>                       <db>
    Objects <--- map ---> DDL /DML


## lesson8a
+------------------------+
|   Active Record        |
+------------------------+

    1. model class : Tour
            |
        1.1 properties/methods
        1.2 init
        1.3 BREAD
            |   |
            |   +--- 1.3.A - save()
            |
            +--- ----1.3.B - getAll()

        
        dehydration
    2. object -------> raw SQL 
            hydration
    3. object <------- raw results







    Model(bootstrap)
     ^   |
     |   +-- $odi <------- new PDO(...)
     |
     +-- Tour
     +-- Client
     +-- REview


## lesson10
// CLASS: 
    // - OOP:
    //     - props/methods
    //     - class/interface/inheritance/abstraction
    //     - namespace
    //     - traits
    //     - polymorphism
    //     - encapsulation
    //     - objects
    
    //     - SOLID
    //     - dp: singleton, obserber, active record;
    //     - ORM
    //     - CRUD / BREAD (browse,read, edit,add, delete)


src  = \Student\Booking
    |
    +---\models
            |
            +-- Model.php
            |     |                                        src
            |     +-- namespace models                      v
            |           Model class    -------> \Student\Booking\models\Model 
            +-- Tour
            +-- Review
            +-- Money
            +-- Client



\Student\Booking\ + ....custom classes
 |   ^                        |
 |   |                        models
 |   src/                      |
 |                           Model
 |
                              ...
 ^---------------------------\PDO
                                ...
