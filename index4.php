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

class GBP2EUROconverter extends converter {

 private $rate = 1;

  public function __construct($rate) {
      $this->rate = $rate;
  }

  public function converter($value) {
      return $value / $this->rate;
  }

 public function getrate (){
    return $this->rate;
 }


}

$c2f = new C2Fconverter();
$fahrenheit = $c2f->converter(27);
$celsius_input = 27;

$f2c = new F2Cconverter();
$celsius = $f2c->converter(27);
$fahrenheit_input = 27;

$e2p = new EURO2GBPconverter(0.88);
$pounds = $e2p->converter(999);
$euros_input = 999;

$p2e = new GBP2EUROconverter(0.88);
$euros = $p2e->converter(100);
$pounds_input = 100;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!empty($_POST['euros'])) {
    $euros_input = (float)$_POST['euros'];
    $pounds = $e2p->converter($euros_input);

  }  if (!empty($_POST['pounds'])) {
    $pounds_input = (float)$_POST['pounds'];
    $euros = $p2e->converter($pounds_input);

  }
  if (!empty($_POST['celsius'])) {
    $celsius_input = (float)$_POST['celsius'];
    $fahrenheit = $c2f->converter($celsius_input);

  }
  if (!empty($_POST['fahrenheit'])) {
    $fahrenheit_input = (float)$_POST['fahrenheit'];
    $celsius = $f2c->converter($fahrenheit_input);

  }

}



?>
<h2>Currency Converter</h2>
<form action="" method="post">
    <label for="euros">Euros:</label>
    <input type="number" id="euros" name="euros" step="0.01">
    <input type="submit" value="Convert to GBP">
</form>

<form action="" method="post">
    <label for="pounds">Pounds:</label>
    <input type="number" id="pounds" name="pounds" step="0.01">
    <input type="submit" value="Convert to Euros">
</form>

<h2>Temperature Converter</h2>
<form action="" method="post">
    <label for="celsius">Celsius:</label>
    <input type="number" id="celsius" name="celsius" step="0.01">
    <input type="submit" value="Convert to Fahrenheit">
</form>

<form action="" method="post">
    <label for="fahrenheit">Fahrenheit:</label>
    <input type="number" id="fahrenheit" name="fahrenheit" step="0.01">
    <input type="submit" value="Convert to Celsius">
</form>

<p><?php echo round($celsius_input, 2); ?> &deg; C = <?php echo round($fahrenheit, 2); ?> &deg; F</p>
<p><?php echo round($fahrenheit_input, 2); ?> &deg; F = <?php echo round($celsius, 2); ?> &deg; C</p>
<p><?php echo round($euros_input, 2); ?> EUR = <?php echo round($pounds, 2); ?> GBP</p>
<p><?php echo round($pounds_input, 2); ?> GBP = <?php echo round($euros, 2); ?> EUR</p>
<p>(exchange rate = <?php echo $e2p->getrate(); ?>,
flat fee = <?php echo $e2p->getfee(); ?> GBP) </p>
</body>
</html>




