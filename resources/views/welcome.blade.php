<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
        <!--- name Field --->
        <div class="lalala">
            {!! Form::label('name', 'name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <!--- Name Field --->
        <div class="lalala">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <!--- Title Field --->
        <div class="lalala">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <!--- Password Field --->
        <div class="lalala">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', null, ['class' => 'form-control']) !!}
        </div>

        <!--- Text Field --->
        <div class="lalala">
            {!! Form::label('text', 'Text:') !!}
            {!! Form::text('text', null, ['class' => 'form-control']) !!}
        </div>

        <!--- Name Field --->
        <div class="lalala">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <!--- Password Field --->
        <div class="lalala">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', null, ['class' => 'form-control']) !!}
        </div>
        <div class="container">
        	<div class="row">
        		<div class="col-md-10" role="main">

        		</div>
        	</div>
        </div>
         <link rel="stylesheet" href="/css/bootstrap.css">
        <div class="media">
        	<div class="media-left">
        		<a href="#">
        		  <img class="media-object img-circle" alt="64x64" src="" style="width: 64px; height: 64px;">
        		</a>
        	</div>
        	<div class="media-body">
        		<h4 class="media-heading"></h4>

        	</div>
        </div>
        @extends('app')
        @section('content')

        @stop
        @if($errors->any())
        	<ul class="list-group">
        		@foreach($errors->all() as $error)
        		    <li class="list-group-item list-group-item-danger">{ $error }</li>
        		@endforeach
        	</ul>
        @endif
        <!--- Testarea Field --->
        <div class="lalala">
            {!! Form::label('testarea', 'Testarea:') !!}
            {!! Form::textarea('testarea', null, ['class' => 'form-control']) !!}
        </div>
        <!--- Email Field --->
        <div class="lalala">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('',['class'=>'btn btn-primary form-control']) !!}
        <scfor></scfor>
        {!! Form::open(['url'=>'llll']) !!}
        	qqqq
        {!! Form::close() !!}
        <form action=""></form>
        {!! Form::open(['url'=>'']) !!}

        <form action="" method="post">
            { csrf_field() }
            <div class="form-group">
              <label for="" class="control-label">:</label>
              <input id="" name="" type="text" class="form-control">
          </div>
            <div class="form-group">
                <label for="" class="control-label">:</label> 
                <input id="" name="" type="email" class="form-control">
            </div>
            <div class="form-group">
            	<label for="password" class="control-label">Password:</label> 
            	<input id="password" name="password" type="password" class="form-control">
            </div>
        </form>  
        {!! Form::close() !!}
    </body>
</html>
