@extends('layouts.app')
<style>
  .content .text-intro p{
  font-size:13px;
  color:#8d8d8d;
  margin-top:30px;
  font-weight:400;
  line-height:22px;
  letter-spacing:1px;
  width:40%;
}
</style>
@section('content')
        <h2>Упраляйте своими делами</h2>
        <h2 class="typewrite"><span>быстро</span></h2>
        <p>Ознакомьтесь с нашей системой и начините ее использовать, именно она ускорит вашу рутинную работу!</p>

        <!--Home Sidebar-->

        <div id="ajax-sidebar">
          
          <div class="home-sidebar"style="background-image:url( '{{asset("img/home-sidebar.jpg")}}' ); position:fixed; " id="hero">
            
            <div class="parallax-option" data-jkit="[parallax:strength=0.8;axis=both]">
              <div class="parallax parallax1"><img src="{{asset('img/business-card-2.png')}}"></div>
            </div>

            <div class="parallax-option" data-jkit="[parallax:strength=0.3;axis=both]">
              <div class="parallax parallax1"><img src="{{ asset('img/business-card.png') }}""></div>
            </div>

          </div>
        </div>
@endsection('content')