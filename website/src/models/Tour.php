<?


    namespace Student\Booking\models;
    use Student\Booking\models\Money;


    // tour model - Active Record
    //HW3: 
    //  1. add a column for price currency in tours table
    //  2. create separate class named Money (value, currency )
    //  3. refactor Tour class - use Money price instead of int 

    // HW4*:
    //  1. add: delete() - removes the DB record corresponding to this object;


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
            $tours_result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
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

            $tour_data = $stmt->fetch(\PDO::FETCH_ASSOC);
            
            $tour = new Tour(
                                $tour_data['id'], 
                                $tour_data['title'], 
                                new Money($tour_data['price'], $tour_data['currency']) 
                );
            return $tour;
        }

    }
