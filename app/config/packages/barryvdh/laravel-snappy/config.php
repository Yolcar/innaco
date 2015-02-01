<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf.exe"',
        'options' => array(
            'page-size' => 'letter',
            'margin-top' => '40',
            'margin-bottom' => '30',
            'margin-left' => '40',
            'margin-right' => '30',
        ),
    ),
    'image' => array(
        'enabled' => true,
        'binary' => '"C:\Program Files\wkhtmltopdf\bin\wkhtmltoimage.exe"',
        'options' => array(),
    ),


);
