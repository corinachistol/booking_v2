<?

    require_once './vendor/autoload.php';

    // initialization + configuration of main app parts
    use \Student\Booking\models\Model;

    require_once './src/view.php';


    //Twig init +  config
    $loader = new \Twig\Loader\FilesystemLoader('./templates');

    $twig = new \Twig\Environment($loader, [
        // 'cache' => '/path/to/compilation_cache',
    ]);

    //DB init + config
    Model::$pdo = new PDO("mysql:host=booking_mariadb;port=3306;dbname=booking", "booking", "booking");
