@extends('layouts.app')
@section('title', 'Blog')
@section('content')
    {{-- <div class="container col-md-8 col-md-offset-2">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if ($posts->isEmpty())
        <p> There is no post.</p>
    @else
        @foreach ($posts as $post)
        <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{route('blog-detail',$post->id)}}">{!! $post->title !!}</a>
        </div>
        <div class="panel-body">
        {!! mb_substr($post->content,0,500) !!}
        </div>
        </div>
        @endforeach
    @endif
    </div> --}}
    <div class="container">
        <div class="list-group">
            <a href="#" class="list-group-item active"><i class="fa fa-key"></i> <span>App Settings</span></a>
            <a href="#" class="list-group-item"><i class="fa fa-credit-card"></i> <span>Billing</span></a>
            <a href="#" class="list-group-item"><i class="fa fa-question-circle"></i> <span>Support</span></a>
            <a href="#" class="list-group-item"><i class="fa fa-arrow-circle-o-left"></i> <span>Sandbox Account</span></a>
            <a href="#" class="list-group-item"><i class="fa fa-book"></i> <span>QuickStart Overview</span></a>
            <a href="#" class="list-group-item"><i class="fa fa-compass"></i> <span>Documentation</span></a>
          </div>
        <div class="well">
            <div class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" src="http://placekitten.com/150/150">
                </a>
                <div class="media-body">
                  <h4 class="media-heading">Receta 1</h4>
                <p class="text-right">By Francisco</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
      Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
      dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
      Aliquam in felis sit amet augue.</p>
                <ul class="list-inline list-unstyled">
                    <li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
                  <li>|</li>
                  <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
                  <li>|</li>
                  <li>
                     <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star-empty"></span>
                  </li>
                  <li>|</li>
                  <li>
                  <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                    <span><i class="fa fa-facebook-square"></i></span>
                    <span><i class="fa fa-twitter-square"></i></span>
                    <span><i class="fa fa-google-plus-square"></i></span>
                  </li>
                  </ul>
             </div>
          </div>
        </div>
         <div class="well">
            <div class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" src="http://placekitten.com/150/150">
                </a>
                <div class="media-body">
                  <h4 class="media-heading">Receta 2</h4>
                <p class="text-right">By Anailuj</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
      Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
      dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
      Aliquam in felis sit amet augue.</p>
                <ul class="list-inline list-unstyled">
                    <li><span><i class="glyphicon glyphicon-calendar"></i> 2 days, 8 hours </span></li>
                  <li>|</li>
                  <span><i class="glyphicon glyphicon-comment"></i> 2 comments</span>
                  <li>|</li>
                  <li>
                     <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star"></span>
                              <span class="glyphicon glyphicon-star-empty"></span>
                  </li>
                  <li>|</li>
                  <li>
                  <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                    <span><i class="fa fa-facebook-square"></i></span>
                    <span><i class="fa fa-twitter-square"></i></span>
                    <span><i class="fa fa-google-plus-square"></i></span>
                  </li>
                  </ul>
             </div>
          </div>
        </div>
      </div>
@endsection