<?php

function encoder(array $input, string $key, $desembleCode = [])
{

    $key_int_array  = [];
    $key_ascii_value_total  = 0;
    $key   = base64_encode($key);
    for ($i = 0; $i < strlen($key); $i++) {
        $ascii_value = ord($key[$i]);
        $key_ascii_value_total +=  $ascii_value;
        array_push($key_int_array, $ascii_value);
    }

    $input  = base64_encode(json_encode($input));
    $input_int_array  = [];
    for ($x = 0; $x < strlen($input); $x++) {
        $ascii_value = ord($input[$x]) + $key_ascii_value_total;
        array_push($input_int_array, $ascii_value);
    }

    $output  = base64_encode(json_encode($input_int_array));


    $scattered_chunk_arr = [];
    if (!empty($desembleCode)) {
        $len  = count($desembleCode);
        $cutLen  = ceil(strlen($output) / $len);
        $cut_start = 0;
        $cut_end  = strlen($output);
        $chunk_arr  = [];
        while ($cut_start < $cut_end) {
            $chunk  =  substr($output, $cut_start, $cutLen);
            array_push($chunk_arr, $chunk);
            $cut_start += $cutLen;
        }

        $scattered_chunk_arr  = [];

        while (!empty($desembleCode)) {
            $key  = array_shift($desembleCode);
            array_push($scattered_chunk_arr, $chunk_arr[$key]);
        }



        //  $output  =  base64_encode(json_encode($scattered_chunk_arr));
    }

    return ['encode done', $key_ascii_value_total, base64_encode(json_encode($scattered_chunk_arr))];
}

$encode = encoder(["blesssing atm password is 1092 and expire on 12/2018 with 094"], 'Xsd%$sW', [3, 4, 2, 10, 6, 1, 8, 7, 9, 0, 5]);

//print_r($encode);
// echo (base64_decode('WHNkJSRzVw=='));

function decode($encrytedStr_array, $key, $scatterer)
{
    $key  = base64_encode($key);
    $key_ascii_total_val  = 0;
    for ($index = 0; $index < strlen($key); $index++) {
        $key_ascii_total_val += ord($key[$index]); //calculate the secrete key
    }

    if ($encrytedStr_array[1] !== $key_ascii_total_val) {
        return false; // if the secreate key does not match
    }


    try {



        //reorganize the scattered array
        $scattared_array  = base64_decode($encrytedStr_array[2]);
        $scattared_array  = json_decode($scattared_array);

        $ind = 0;
        // let 	keys  = Object.keys(scatterer);
        $value  = ($scatterer);
        $re_oranize_arr  = [];
        while (count($scatterer) > $ind) {
            $re_oranize_arr[$value[$ind]] = $scattared_array[$ind];
            $ind++;
        }

        ksort($re_oranize_arr);


        $int_array_encryted  = json_decode(base64_decode(join("", $re_oranize_arr)));
        $decrypted  = '';
        for ($index_ = 0; $index_ < count($int_array_encryted); $index_++) {
            $decrypted .= chr($int_array_encryted[$index_] - $key_ascii_total_val);
        }


        return json_decode(base64_decode($decrypted))[0];
    } catch (error) {
        echo ("ERR DECODING THE CIPHER. MAKE SURE YOU HAVE YOUR SECRTE KEY AND SCATTERER ARRAY");
    }
}
//echo decode()

$p  = decode(
    [
        'encode done',
        1032,
        'WyJFeE16RXNNVEE0TXl3eE1URXdMREV3T0RNc01URXpNQ3d4TURnekxERXhNRFlzTVRFek9Td3giLCJNVEExTERFeE1ETXNNVEUwTUN3eE1UVTBMREV4TURVc01URXdNQ3d4TVRBMUxERXhOVEVzTVQiLCJNVEV5TVN3eE1USXdMREV4TVRRc01URTBPQ3d4TVRBMUxERXhNRFFzTVRBNU9Dd3hNVE0yTEQiLCJMREV4TURBc01UQTVOeXd4TURnMUxERXhNRGtzTVRFek55d3hNVEEyTERFeE16SmQiLCJNRFVzTVRFd015d3hNVEU0TERFd09EUXNNVEV6TVN3eE1UQXpMREV4TkRBc01URTFNeXd4TVQiLCJ3eE1UTXhMREV3T0RNc01URXhNQ3d4TVRRMExERXhNekFzTVRFME1Td3hNVE14TERFeE16VXMiLCJPU3d4TVRRd0xERXhOVEVzTVRFMU1Dd3hNVEE1TERFeE16Z3NNVEE1Tnl3eE1UVXpMREV4TUQiLCJJeUxERXhNVFVzTVRBNU9Dd3hNVFV3TERFeE16QXNNVEV6Tnl3eE1EazNMREV4TlRJc01URXciLCJrc01URTFNeXd4TURrNExERXdPRE1zTVRFeU9Td3hNVEl3TERFeE1UUXNNVEUwTXl3eE1UQTEiLCJXekV4TVRrc01URTFNeXd4TVRBMkxERXhNemNzTVRFek1Dd3hNVEF6TERFeE1UZ3NNVEUxTkMiLCJFd09Td3hNVEUyTERFeE16VXNNVEV6TlN3eE1USXhMREV4TVRrc01UQTROU3d4TVRNNUxERXgiXQ=='
    ],
    'Xsd%$sW',
    [3, 4, 2, 10, 6, 1, 8, 7, 9, 0, 5]

);

echo $p;



class CryptoJsAes
{
    /**
     * Encrypt any value
     * @param mixed $value Any value
     * @param string $passphrase Your password
     * @return string
     */
    public static function encrypt($value, string $passphrase)
    {
        $salt = openssl_random_pseudo_bytes(8);
        $salted = '';
        $dx = '';
        while (strlen($salted) < 48) {
            $dx = md5($dx . $passphrase . $salt, true);
            $salted .= $dx;
        }
        $key = substr($salted, 0, 32);
        $iv = substr($salted, 32, 16);
        $encrypted_data = openssl_encrypt(json_encode($value), 'aes-256-cbc', $key, true, $iv);
        $data = ["ct" => base64_encode($encrypted_data), "iv" => bin2hex($iv), "s" => bin2hex($salt)];
        return json_encode($data);
    }

    /**
     * Decrypt a previously encrypted value
     * @param string $jsonStr Json stringified value
     * @param string $passphrase Your password
     * @return mixed
     */
    public static function decrypt(string $jsonStr, string $passphrase)
    {
        $json = json_decode($jsonStr, true);
        $salt = hex2bin($json["s"]);
        $iv = hex2bin($json["iv"]);
        $ct = base64_decode($json["ct"]);
        $concatedPassphrase = $passphrase . $salt;
        $md5 = [];
        $md5[0] = md5($concatedPassphrase, true);
        $result = $md5[0];
        for ($i = 1; $i < 3; $i++) {
            $md5[$i] = md5($md5[$i - 1] . $concatedPassphrase, true);
            $result .= $md5[$i];
        }
        $key = substr($result, 0, 32);
        $data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);
        return json_decode($data, true);
    }
}



