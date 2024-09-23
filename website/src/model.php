<?

    
    // $pdo = new PDO("mysql:host=booking_mariadb;port=3306;dbname=booking", "booking", "booking");
 
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


    // tour model - Active Record
    //HW3: 
    //  1. add a column for price currency in tours table
    //  2. create separate class named Money (value, currency )
    //  3. refactor Tour class - use Money price instead of int 

    // HW4*:
    //  1. add: delete() - removes the DB record corresponding to this object;


    class Model{
        public static PDO $pdo;
    }
     
    class Tour extends Model {

        public int $id;
        public string $title;
        public Money $price;
     
        public function __construct(int $id, string $title , Money $price ) {
            $this->id = $id;
            $this->title = $title;
            $this->__set("price",  $price);
      
        }

        public function __set($name, $value) {
            if($name == 'price'){
                if(!empty($value) && $value instanceof Money){
                    $this->price = $value;
                }else{
                    die(sprintf("Cannot leave %s empty", $name));
                }
            }
        }

         public function __get($name) {
            if ($name == 'id') return $this->id;
            elseif ($name == 'title') return $this->title;
            elseif ($name == 'price') return $this->price;
            else die(sprintf("Unknown property %s", $name));
        }

        public function save() {
            // global $pdo;
            $amount = $this->price->__get("price_amount");
            $currency = $this->price->__get("price_currency");
            //                                  v parameters
            $sql = 'INSERT INTO tours VALUES(?, ?, ?, ?)';
            $stmt = static::$pdo->prepare($sql);
            //                                                      PDO prepared statements advantages
            $stmt->execute([$this->id, $this->title, $amount, $currency]);
        }

        public static function delete($id){
            
            $sql = 'DELETE FROM tours WHERE id=?';
            $stmt = static::$pdo->prepare($sql);
            $stmt->execute([$id]);
        }

        public static function getAll() {
            
            $stmt = static::$pdo->query('SELECT * FROM tours ' );
            $tours_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $tours = [];

            //manual hydration
            foreach($tours_result as $tour_data) {
                $tours[] = new Tour(
                                    $tour_data['id'], 
                                    $tour_data['title'], 
                                    new Money($tour_data['price'], $tour_data['currency']) 
                                        
                                    );
                                    
            }
            return $tours;

        }

        public static function getOne(int $id) {

            $stmt = static::$pdo->prepare('SELECT * FROM  tours WHERE id = ?');
            $stmt->execute([$id]);

            // automated hydration
            // $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Tour');
            // $tour = $stmt->fetch();

            $tour_data = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $tour = new Tour(
                                $tour_data['id'], 
                                $tour_data['title'], 
                                new Money($tour_data['price'], $tour_data['currency']) 
                );
            return $tour;
        }

    }

   



    class Money{
        private int $price_amount;
        private string $price_currency;
        public function __construct( int $price_amount, string $price_currency){
            $this->__set("price_amount",$price_amount );
            $this->__set("price_currency", $price_currency);
        }

        public function __set($name, $value){
            if($name == 'price_amount'){
                if(!empty($value) && is_int($value) && $value > 0) {
                    $this->price_amount = $value;
                } else{
                    die(sprintf("Cannot leave %s empty" , $name,));
                }
            } elseif ($name == 'price_currency') {
                if(!empty($value) && is_string($value) && strlen($value) > 2 ){
                    $this->price_currency = $value;
                }else{
                    die(sprintf("Cannot leave %s empty", $name ));
                }
            } else{
               die(sprintf("Cannot leave %s empty", $name));
            }
        }

        public function __get($name) {
            if ($name == 'price_amount') return $this->price_amount;
            elseif ($name == 'price_currency') return $this->price_currency;
            else die(sprintf("Unknown property %s", $name));
        }

        // public function __tostring() {
        //     return $this->price_amount . ' ' . $this->price_currency;
        // }
     }




class Review extends Model {
    public int $id;
    public string $author_name;
    public string $body;

    public function __construct(int $id=0, string $autor_name='', string $body=''){
        $this->id = $id;
        $this->author_name = $autor_name;
        $this->body = $body;
    }

    public function __get($name){
        if ($name == 'id') return $this->id;
        elseif ($name == 'author_name') return $this->author_name;
        elseif ($name == 'body') return $this->body;
        else die(sprintf("Unknown property %s", $name));
    }

    public function __set($name,$value){
        if($name == 'id'){
            if (!empty($value) && is_int($value)){
                $this->id = $value;
            }else{
                die(sprintf("Cannot leave %s empty", $name));
            }
        }elseif ($name == 'author_name'){
            if(!empty($value) && is_string($value)){
                if(strlen($value) >= 20 && strlen($value) <= 100){
                    $this->author_name = $value;
                }
            }else{
                die('Only string is allowed and the author name must be between 20 and 100 characters');
            }

        }elseif ($name == 'body'){
            if(!empty($value) && is_string($value)){
                if(strlen($value) >= 20 && strlen($value) <= 1000){
                    $this->author_name = $value;
                }
            }else{
                die('Only 1000 characters are allowed');
            }
        }
    }
    

    public static function getAll() {

        $stmt = static::$pdo->prepare('SELECT * FROM reviews');
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Review');
        $reviews = $stmt->fetchAll();
        // $reviews_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($reviews);
        return $reviews;

    }

    public function save() {
        $stmt = static::$pdo->prepare('INSERT INTO reviews VALUES (?, ?, ?)');
        $stmt->execute([$this->id, $this->author_name, $this->body]);
    }


}