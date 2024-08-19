<?
    require_once './vendor/autoload.php';

    use Student\Booking\Client;
    use Student\Booking\Tour;
    
    $client = new Client();
    $tour = new Tour();

    var_dump($client);
    var_dump($tour);