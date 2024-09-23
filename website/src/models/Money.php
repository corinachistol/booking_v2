<?

    namespace Student\Booking\models;

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
