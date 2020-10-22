<?PHP
error_reporting(0);
function encKeyx($token) {
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = "a3r2oafdsnkjczv32@#%$@#%";
$encryption = openssl_encrypt($token, $ciphering,
            $encryption_key, $options, $encryption_iv);
  return $encryption;}
?>
<?PHP
function decKeyx($encryption) {
  $ciphering = "AES-128-CTR";
  $iv_length = openssl_cipher_iv_length($ciphering);
  $options = 0;
$decryption_iv = '1234567891011121';
$decryption_key = "a3r2oafdsnkjczv32@#%$@#%";
$decryption=openssl_decrypt ($encryption, $ciphering,
        $decryption_key, $options, $decryption_iv);
  return $decryption;}
?>
