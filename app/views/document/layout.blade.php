<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$document->name}}</title>

    {{ HTML::style('css/site_global.css') }}
    {{ HTML::style('css/index.css') }}
    {{ HTML::style('style_report/bootstrap.min.css') }}
    {{ HTML::script('js/html5shiv.min.js') }}
    {{ HTML::script('js/respond.min.js') }}
    {{ HTML::script('js/jquery-2.1.3.min.js') }}
    {{ HTML::script('style_report/wkhtmltopdf.tablesplit.js') }}
    {{ HTML::style('style_report/style.css') }}
</head>

<body>
<div class="clearfix colelem" id="pu77"><!-- group -->
    <div class="clip_frame grpelem" id="u77"><!-- image -->
        {{ HTML::image('images/logo.gif',null,['width'=>"93", 'height'=>"91"]) }}
    </div>
    <div class="clearfix grpelem" id="u69-8"><!-- content -->
        <p id="u69-2">INNACO &#45; INDUSTRIA NACIONAL DE CONEXIONES, C.A.</p>
        <p id="u69-4">Fabricantes de Productos de Ferretería</p>
        <p id="u69-6">Caracas – Venezuela</p>
    </div>
    <div class="clip_frame grpelem" id="u83"><!-- image -->
        {{ HTML::image('images/logo.gif',null,['width'=>"93", 'height'=>"91"]) }}
    </div>
</div>
<div class="form-group text-center"><!-- content -->
    @yield('body')
</div>
</body>
</html>

