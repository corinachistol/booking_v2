<?
    //for class autoloading,do not remove!
    require_once './vendor/autoload.php';

    //Twig init +  config
    $loader = new \Twig\Loader\FilesystemLoader('./templates');

    $twig = new \Twig\Environment($loader, [
        // 'cache' => '/path/to/compilation_cache',
    ]);

    $title = 'Booking Agency';
    $tours =[
        ['title'=> 'Expensive tour', 'price'=> '100Euro'],
        ['title'=> 'Cheap tour', 'price'=> '1Euro'],
        ['title'=> 'Optimal tour', 'price'=> '50Euro'],
    ];

    //render a simple page
    $template = $twig->load('home.twig.html');
    print($template->render([
        'title' => $title,
        'tours' => $tours
    ]));
