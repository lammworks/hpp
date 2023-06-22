<?php

define ('HMAC_SHA256', 'sha256');
define ('SECRET_KEY', 'd774f42c17d443e58fb17b038baed6b24d7f15343bac4c9789ef1f01b0b2e14acbf09d6a44f94db882d6f7d63833b5a75719ddf3eb5345ce872e3c6ce0a67b2fd7e1e06a7fa04ec19fdfea0d49f9c05d94462f6756fc4e0da410ccac6b9825ec056ad11b3e8748f6a3a669bf613fa7c305d9f6dfa9104d8d99da14e8516ce6b8');

function sign ($params) {
  return signData(buildDataToSign($params), SECRET_KEY);
}

function signData($data, $secretKey) {
    return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
}

function buildDataToSign($params) {
        $signedFieldNames = explode(",",$params["signed_field_names"]);
        foreach ($signedFieldNames as $field) {
           $dataToSign[] = $field . "=" . $params[$field];
        }
        return commaSeparate($dataToSign);
}

function commaSeparate ($dataToSign) {
    return implode(",",$dataToSign);
}

?>
