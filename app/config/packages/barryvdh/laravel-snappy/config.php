<?php

return array(


    'pdf' => array(
        'enabled' => true,
        //Linux
        'binary' => base_path('vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf-i386'),
        //Windows
        //'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe"',
        'options' => array(
            'page-size' => 'letter',
            'margin-top' => '10',
            'margin-bottom' => '20',
            'margin-left' => '10',
            'margin-right' => '10',
            'footer-right'=>'[page]/[toPage]',
        ),
    ),
    'image' => array(
        'enabled' => true,
        //Linux
        'binary' => base_path('vendor/h4cc/wkhtmltoimage-i386/bin/wkhtmltoimage-i386'),
        //Windows
        //'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltoimage.exe"',
        'options' => array(),
    ),


);
