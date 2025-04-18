<?php    
//MODEL
class Product{
  
    private $price;
    private $weight;
  private $freeShipping = false;

public function __construct($price, $weight)
{
    $this->weight = $weight;
    $this->price = $price;
}

function getWeight(){
return $this->weight;
}

function setFreeShipping(){
$this->freeShipping = true;
}

function getFreeShipping(){
    return $this->freeShipping;
}

}

class Shipping{
    private $totalShipping;
    private $products;
    private  $pricePerKilogram;
    private $shippingProvider;


    public function __construct( $pricePerKilogram, $shipppingProvider)
    {
        $this->pricePerKilogram =  $pricePerKilogram;
    }
    
    public function addProducts(Product $product){ //prosthesa to "Product" brosta apo to "products" gia na deikso pos perimeno gia proionta edo    
        $this->products[] = $product;
}

    public function calculateTotalShipping(){
        foreach ($this->products as $product){
            if(!$product->getFreeShipping()){
         $this->totalShipping += $product-> getWeight() * $this->pricePerKilogram;
    }
}
}
        public function getTotalShippingPrice(){
            return $this->totalShipping;
        }


}
//CONTROLLER
$product = new Product(5, 1);
$product1 = new Product(6, 2);
$product2 = new Product(4, 4);
$product2->setFreeShipping();
$pricePerKilogram = 5;
$shipping = new Shipping($pricePerKilogram);
$shipping->addProducts($product);
$shipping->addProducts($product1);
$shipping->addProducts($product2);
$shipping->calculateTotalShipping();
$totalShippingPrice = $shipping->getTotalShippingPrice();
//$totalShippingPrice = $shipping->calculateTotalShipping($product -> getWeight(), $pricePerKilogram); //prosthesa alles 2
// gia ta nea 2 proionta alla de xreiazontai
//$totalShippingPrice = $shipping->calculateTotalShipping($product -> getWeight(), $pricePerKilogram);
var_dump($totalShippingPrice);


/*//MODEL
//include functions.php
function calculateShipping($productWeight, $pricePerKilogram, $hasFreeShipping, $shippingProvider){
    // if()....
    if(!$hasFreeShipping){
return $productWeight * $pricePerKilogram;
}
}
//CONTROLEER
//$products = $_SESSION['products'];
$products[1]['weight'] = 1;
$products[1]['price'] = 6;
$products[1]['freeShipping'] = true;

$products[2]['weight'] = 2;
$products[2]['price'] = 3;
$products[2]['freeShipping'] = false;

$pricePerKilogram = 5;
$totalShippingPrice = 0;
foreach ($products as $product){
$totalShippingPrice = calculateShipping($product['weight'], $pricePerKilogram, $product['freeShipping'], $shippingProvider);
}
echo $totalShippingPrice;

//RECEIPT CONTROLLER
$totalShippingPrice = calculateShipping($product['weight'], $pricePerKilogram, $product['freeShipping'], $shippingProvider);
//PDF
$totalShippingPrice = calculateShipping($product['weight'], $pricePerKilogram, $product['freeShipping'], $shippingProvider);

$products[1]['weight'] = 1;
$products[1]['price'] = 6;
$products[1]['freeShipping'] = true;

$products[2]['weight'] = 2;
$products[2]['price'] = 3;
$products[2]['freeShipping'] = false;

//email
$totalShippingPrice = calculateShipping($product['weight'], $pricePerKilogram, $product['freeShipping'], $shippingProvider);*/