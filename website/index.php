<?
    // phpinfo();
    // die();
    //for class autoloading,do not remove!
    require_once './vendor/autoload.php';

    //Twig init +  config
    $loader = new \Twig\Loader\FilesystemLoader('./templates');

    $twig = new \Twig\Environment($loader, [
        // 'cache' => '/path/to/compilation_cache',
    ]);

    
    // connect to database / fetch data - mysqli
    // PHP 8.2 + only mysql pdo / no mysqli
    $pdo = new PDO("mysql:host=booking_mariadb;port=3306;dbname=booking", "booking", "booking");

    $stmt = $pdo->query('SELECT * FROM tours');

    $tours = [];

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $tours[] = $row;
    }

    // var_dump($tours);
    // die();


    //render a simple page
    $template = $twig->load('home.html.twig');

    print($template->render([
        'title' => $title,
        'tours' => $tours
    ]));
