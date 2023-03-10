  function generateRandomString($length, $bitmask) {
      $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $lowercase = 'abcdefghijklmnopqrstuvwxyz';
      $numbers = '0123456789';
      $special  = '~!@#$%^&*(){}[],./?';   
      $characters = '';
      if ($bitmask & 1) {
        $characters .= $uppercase;
      }      
      if ($bitmask & 2) {
        $characters .= $lowercase;
      }
      if ($bitmask & 4) {
        $characters .= $numbers;
      }
      if ($bitmask & 8) {
        $characters .= $special;
      }
      if (!$characters) {
        $characters = $uppercase . $lowercase;
      }
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }  
  $x = 0;
  if (isset($_GET['x'])) {
    $x = (integer)$_GET['x'];
  }
  $n = 32;
  if (isset($_GET['n'])) {
    $n = (integer)$_GET['n'];
    if ($n < 1) {
      $n = 32;
    }
  }

  $data = generateRandomString($n, $x);
  header("Access-Control-Allow-Origin: *");  
  header('Content-Type: application/json');
  die(json_encode($data));  
