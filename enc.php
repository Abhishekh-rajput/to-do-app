<?PHP
error_reporting(0);

function encKey($token) {
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '1234567891011121';
$encryption_key = "qwwertsiyisbfsdkjsdf";
$encryption = openssl_encrypt($token, $ciphering,
            $encryption_key, $options, $encryption_iv);
  return $encryption;}
?>
<?PHP
function decKey($encryption) {
  $ciphering = "AES-128-CTR";
  $iv_length = openssl_cipher_iv_length($ciphering);
  $options = 0;
$decryption_iv = '1234567891011121';
$decryption_key = "qwwertsiyisbfsdkjsdf";
$decryption=openssl_decrypt ($encryption, $ciphering,
        $decryption_key, $options, $decryption_iv);
$decryption = filter_var($decryption, FILTER_SANITIZE_STRING);
  return $decryption;}
?>
