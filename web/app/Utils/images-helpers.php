<?php

if (!file_exists('checkIsImageBase64')) {
    function checkIsImageBase64($value="")
    {

        if (!$value) {
            trigger_error('Informe a imagem no formato base64: ', E_USER_NOTICE);
        }

        $explode = explode(',', $value);
        $allow = ['png', 'jpg', 'svg', 'jpeg'];
        $format = str_replace(
            [
                'data:image/',
                ';',
                'base64',
            ],
            [
                '', '', '',
            ],
            $explode[0]
        );

        // check file format
        if (!in_array($format, $allow)) {
            return false;
        }

        // check base64 format
        if (!preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $explode[1])) {
            return false;
        }

        return true;
    }
}


if (!function_exists('createImageBase64')) {
    function createImageBase64($folder, $image, $name = "")
    {

        $folder = rtrim($folder, '/');

        if (!$folder) {
            trigger_error('Informe o nome da pasta de destino do arquivo: ', E_USER_NOTICE);
        }

        if (!$image) {
            trigger_error('Informe a imagem', E_USER_NOTICE);
        }

        if (!checkIsImageBase64($image)) {
            trigger_error('Informe a imagem no formato base64: ', E_USER_NOTICE);
        }

        $folder = $folder . DIRECTORY_SEPARATOR;
        $ext = substr($image, 11, strpos($image, ';') - 11);
        $nameImage = sprintf('%s.%s', str_slug($name), $ext);

        if(is_file($folder . $nameImage)) {
            $nameImage = sprintf('%s-%s.%s', str_slug($name), time(), $ext);
        }

        $urlImage = $folder . $nameImage;

        $file = str_replace('data:image/' . $ext . ';base64,', '', $image);
        $file = base64_decode($file);

        if (!file_exists($folder)) {
            mkdir($folder, 0755, true);
        }

        if (file_put_contents($urlImage, $file)) {     
            return $nameImage;
        }

        return false;

    }
}
