

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP introduction (3)</title>
</head>
<body>

<?php
abstract class converter {
    abstract protected function converter($value);
}
class C2Fconverter extends converter {
    public $celsius;
    public function converter($value) {
        $this->celsius = $value * 9 / 5 + 32;
        return ($value * 1.8) + 32;
    }
}

class F2Cconverter extends converter {
    public $fahrenheit;
    public function converter($value) {
        $this->fahrenheit = ($value - 32) * 5 / 9;
        return ($value - 32) * 5 / 9;
    }
}


class EURO2GBPconverter extends converter {

 private static $fee = 0.5;
 private $rate = 1;

  public function __construct($rate) {
      $this->rate = $rate;
  }

  public function converter($value) {
      return $value * $this->rate;
  }

 public function getrate (){
    return $this->rate;
 }


 public function getfee(){
    return self::$fee;
 }


}

$c2f = new C2Fconverter();
$fahrenheit = $c2f->converter(27);

$f2c = new F2Cconverter();
$celsius = $f2c->converter(27);

$e2p = new EURO2GBPconverter(0.88);
$pounds = $e2p->converter(999);



?>

<form action="currency.php" method="post">
    <label for="euros">Euros:</label>
    <input type="text" id="euros" name="euros">
    <input type="submit" value="Convert">
<br>
    <form action="currency.php" method="post">
    <label for="GBP">GBP:</label>
    <input type="text" id="GBP" name="GBP">
    <input type="submit" value="Convert">
<br>
    <form action="temperature.php" method="post">
    <label for="celsius">Celsius:</label>
    <input type="text" id="celsius" name="celsius">
    <input type="submit" value="Convert">
<br>
    <form action="temperature.php" method="post">
    <label for="fahrenheit">Fahrenheit:</label>
    <input type="text" id="fahrenheit" name="fahrenheit">
    <input type="submit" value="Convert">
</form>


</form>



<p>27 &deg; C = <?php echo $fahrenheit; ?> &deg; F</p>
<p>27 &deg; F = <?php echo $celsius; ?> &deg; C</p>
<p>999 EUR = <?php echo $pounds; ?> GBP</p>
<p>(exchange rate = <?php echo $e2p->getrate(); ?>,
flat fee = <?php echo $e2p->getfee(); ?> GBP) </p>
</body>
</html>




