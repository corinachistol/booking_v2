



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