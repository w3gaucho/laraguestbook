<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>{{$_ENV['APP_NAME']}}</title>
    <?php
    //https://laravel.com/docs/6.x/helpers#paths
    $cssFile='/css/master.css';
    $filename=public_path().$cssFile;
    $cssUrl=asset($cssFile).'?'.md5_file($filename);
    ?><link rel="stylesheet" href="<?php print $cssUrl; ?>">
</head>
<body>
    <div class="c">
        <div class="r">
            <div class="g3">

            </div><!-- g3 -->
            <div class="g6 center">
                <h1>{{$_ENV['APP_NAME']}}</h1>
                <form class="" action="{{url('/mensagens')}}" method="post">
                    <textarea name="mensagem" rows="4" maxlength="280"></textarea>
                    {{ csrf_field() }}
                    <input type="hidden" value="{{getenv('cookieDelete')}}" name="cookieDelete">
                    <button type="submit" name="button">
                        Enviar
                    </button>
                </form>
                <?php
                if(isset($mensagens) && count($mensagens)>0){
                    foreach ($mensagens as $mensagem) {
                        print $mensagem->mensagem.'<hr>';
                    }
                }else{
                    print 'Nenhuma mensagem encontrada';
                }
                ?>
            </div><!-- g6 -->
        </div><!-- r -->
    </div><!-- c -->
