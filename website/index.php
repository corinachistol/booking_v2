<?
   require_once './src/bootstrap.php';

   $page = $_GET['page'] ?? '';


   if($page === 'home') {

      $tours = getData(data: 'tours');
      $title = 'Our Fall Tours';
      renderPage($title, 'home', $tours);

   } else if($page === 'reviews'){

      $reviews = getData('reviews');
      $title = 'What people think';
      renderPage($title,'reviews', $reviews );
      
   } elseif ($page === 'test'){
      $tour = new Tour(11, 'New Tour from ORM', new Money(50, 'USD'));
      $tour->save();

   } elseif ($page === 'delete'){
      $tours = getData("tours");
      print_r($tours);
      $tours->delete( 3);
   } 
   else{
      
     renderPage("The page you are looking for was not found", '404');
   }





   

 

   
