<?

     function getData($data): Tour {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM ' . $data);
        $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($info);
      
        return new Tour($info['id'], $info['title'], $info['price']);
     }

 
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
     
    class Tour {
        private int $id;
        private string $title;
        private Money $price;
        public function __construct(int $id, string $title, Money $price) {
            $this->id = $id;
            $this->title = $title;
            $this->__set("price", $price);
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

        public function save() {
            global $pdo;

            $amount = $this->price->__get("price_amount");
            $currency = $this->price->__get("price_currency");
            //                                  v parameters
            $sql = 'INSERT INTO tours VALUES(?, ?, ?, ?)';
            $stmt = $pdo->prepare($sql);
            //                                                      PDO prepared statements advantages
            $stmt->execute([$this->id, $this->title, $amount, $currency]);
        }

        public function delete($id){
            global $pdo;
            $sql = 'DELETE FROM tours WHERE id=?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
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