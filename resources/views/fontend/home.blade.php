@extends('fontend.index')
@section('content')
<div class="responive-header">
  <div class="logo"><a href="{{ route('home') }}" title=""><img src="{{asset($settings->logo)}}	" alt="" /></a></div>
  <span class="open-responsive-btn"><i class="la la-bars"></i><i class="la la-close"></i></span>
  <div class="resp-btn-sec">
      @guest
    <div class="acount-header-btn">
      <span class="register-btn">Register</span>/
      <span class="login-btn">LogIn</span>
    </div>
    @else
    @php
    $user_id=Auth::user()->id;
    $profile = App\Profile::where('user_id',$user_id)->first();
    $points = App\Point::where('user_id',$user_id)->first();
    @endphp
    <div class="acount-header-btn">
      <a href="{{route('profile')}}"><img style="border-radius: 50%;height: 55px;width: 55px;margin-top: 16px;margin-left: 10px" src="{{$profile->photo}}" alt=""></a>
      <span style="margin: 0px 0px 0 13px;color: #ffffff;font-family: Roboto;font-size: 16px;">{{ Auth::user()->name }}</span>
      <a href="{{ route('logout') }}" title="Logout"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
     <img style="border-radius: 50%;height: 40px;width: 40px;margin-top: 24px;margin-left: 10px"  src="{{asset('/images/logo/logout.png')}}">
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>

    </div>
    @endguest

    @guest
    <a href="add-listing.html" title="" class="add-listing-btn"><i class="la la-plus"></i>Free Point</a>
    @else
       <a href="{{ route('logout') }}"  onclick="event.preventDefault();	 document.getElementById('logout-form').submit();" title="" class="add-listing-btn"> Point : {{$points->point}}</a>
    @endguest

    <div class="search-header">
      <span class="open-search"><i class="la la-search"></i><i class="la la-close"></i></span>
      <form>
        <input type="text" placeholder="Search">
      </form>
    </div>
  </div>
  <div class="responisve-menu">
    <span class="close-reposive"><i class="la la-close"></i></span>
    <div class="logo"><a href="{{ route('home') }}" title=""><img src="{{asset($settings->logo)}}"  alt="" /></a></div>
    <ul>
      <li><a href="{{ route('home') }}" title="">Home</a></li>
      <li><a href="{{ route('photo') }}" title="">Photos</a></li>
      <li><a href="{{ route('video') }}" title="">Videos</a></li>
      <li><a href="{{ route('promotion') }}" title="">Promition</a></li>
      <li><a href="{{ route('contact') }}" title="">Contact US</a></li>
      @guest
      @else
      <li><a href="{{route('profile')}}" title="">Profile</a></li>
      @endguest
    </ul>
  </div>
</div><!-- Responsive-header -->
<header class="on-top">
  <div class="logo"><a href="{{ route('home') }}" title=""><img src="{{asset($settings->logo)}}" alt="" /></a></div>
  <div class="menu-sec">


      @guest
    <div class="acount-header-btn">
      <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
      <span class="login-btn">LogIn</span>
      <span class="register-btn">Register</span>
    </div>
    @endguest
   @guest
     <a href="{{ route('logout') }}"  onclick="event.preventDefault();	 document.getElementById('logout-form').submit();" title="" class="add-listing-btn"><i class="la la-plus"></i> Free Point</a>
   @else
   <div class="search-header">
        <div class="review-avatar">
          <a href="{{ route('logout') }}"  title="Logout"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
         <img style="border-radius: 50%;height: 40px;width: 40px;margin-top: 24px;margin-left: 10px"  src="{{asset('/images/logo/logout.png')}}">
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
     </div>
  </div>
   <div class="search-header">
     <h3 style="margin: 37px 0px 0 13px;color: #ffffff;font-family: Roboto;font-size: 16px;">{{ Auth::user()->name }}</h3>
  </div>
   <div class="search-header">
   <div class="review-avatar"> <a href="{{route('profile')}}"><img style="border-radius: 50%;height: 55px;width: 55px;margin-top: 16px;margin-left: 10px" src="{{$profile->photo}}" alt=""></a> </div>
  </div>
   <a href="{{ route('logout') }}"  onclick="event.preventDefault();	 document.getElementById('logout-form').submit();" title="" class="add-listing-btn"> Point : {{$points->point}}</a>
@endguest

    <nav class="header-menu">
      <ul>
        <li><a href="{{ route('home') }}" title="">Home</a></li>
        <li><a href="{{ route('photo') }}" title="">Photos</a></li>
        <li><a href="{{ route('video') }}" title="">Videos</a></li>
        <li><a href="{{ route('promotion') }}" title="">Promition</a></li>
        <li><a href="{{ route('contact') }}" title="">Contact US</a></li>
        @guest
        @else
        <li><a href="{{route('profile')}}" title="">Profile</a></li>
        @endguest
      </ul>
    </nav>
  </div>
</header>

<section>
  <div class="block no-padding">
    <div class="row">
      <div class="col-md-12">
        <div class="main-featured-sec">
          <ul class="featured-bg-slide">
            @foreach($sliders as $slider)
            <li><img src="{{ asset($slider->slider) }}" alt="" /></li>
            @endforeach
          </ul>
          <div class="mian-featured-area">
            <div class="main-featured-text">
              <h1>{{$settings->header1}}</h1>
              <span>{{$settings->header2}}</span>
            </div>
            <div class="directory-searcher">
              <form action="{{route('search.photo')}}" method="post" enctype="multipart/form-data">
                   {{csrf_field() }}
                <div class="field"><input type="text" name="keyword" placeholder="Keywords"></div>

                <div class="field">
                  <select data-placeholder="All Categories" name="category" class="chosen-select" tabindex="2">
                          <option value="All Categories">All Categories</option>
                          @foreach($categorys as $cat)
                         <option value="{{$cat->id}}">{{$cat->name}}</option>
                         @endforeach
                      </select>
                </div>
                <div class="field">
                  <button type="submit"><i class="la la-search"></i>SEARCH</button>
                </div>
              </form>
            </div>
            <div class="cat-lists">
              <ul>
                <li><a href="#" title=""><i class="la la-car"></i><span>Cars</span></a></li>
                <li><a href="#" title=""><i class="la la-spoon"></i><span>Food & Drinks</span></a></li>
                <li><a href="#" title=""><i class="la la-plane"></i><span>Travels</span></a></li>
                <li><a href="#" title=""><i class="la la-briefcase"></i><span>Business</span></a></li>
                <li><a href="#" title=""><i class="la la-shopping-cart"></i><span>Shoppings</span></a></li>
              </ul>
            </div>
            <a class="arrow-down floating" href="#scroll-here" title=""><i class="la la-angle-down"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="scroll-here">
  <div class="block gray">
    <div class="container">
      <div class="row">
        <div class="col-md-12 column">
          <div class="heading">
            <h2>WHAT DO YOU WANT TO DO?</h2>
            <span>Discover & connect with great network with photographer in the world.</span>
          </div>
          <div class="row">
           <div class="do-tonight-sec">
             <div class="row">
                   @foreach($photos as $photo)
                   <div class="col-md-4">
                     <div class="dt-box">
                       <a href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}" title=""><img src="{{$photo->photo}}" alt="" /></a>
                       <span>{{$photo->title}}</span>
                     </div>
                   </div>
                   @endforeach
             </div>
                  <a href="{{route('photo')}}" title="" class="view-all-blog">More Photos</a>
           </div>
         </div>
        </div>
      </div>
    </div>
  </div>
</section>



<section>
  <div class="block gray remove-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <h2>Quick and Easy Search</h2>
          </div>
        </div>
        <div class="col-md-12">
          <div class="services-sec">
            <div class="row">
              <div class="col-md-4">
                <div class="services">
                  <i class="la la-paperclip"></i>
                  <h3>Choose a Category</h3>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="services">
                  <i class="la la-map-marker"></i>
                  <h3>Find Best Photos</h3>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="services">
                  <i class="la la-tencent-weibo"></i>
                  <h3>Make Point</h3>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="block dark">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="counter-sec">
            <div class="counter">
              <i class="la la-file"></i>
              <h3>Photos</h3>
              <span>108</span>
            </div>
            <div class="counter">
              <i class="la la-user"></i>
              <h3>USERS</h3>
              <span>675</span>
            </div>
            <div class="counter">
              <i class="la la-list"></i>
              <h3>Videos</h3>
              <span>13</span>
            </div>
            <div class="counter">
              <i class="la la-folder-o"></i>
              <h3>Promotion</h3>
              <span>45</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="block gray remove-top">
    <div class="row"   style="margin-top:50px;">
      <div class="col-md-12">
        <div class="heading">
          <h2>Recent Promotion</h2>
          <span>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</span>
        </div>
        <div class="listing-carousel">
          <div class="row" id="listing-carousel">
            @foreach($promotions as $pro)
            <div class="col-md-3">
              <div class="listing-box">
                <div class="listing-box-thumb">
                  <span class="price-list">New</span>
                  <img src="{{$pro->photo}}" alt="" />
                  <div class="listing-box-title">
                    <span>{{$pro->title}} </span>
                      <!-- <h3><a href="#" title="">{{$pro->title}}</a></h3> -->
                  </div>
                </div>
                <div class="listing-rate-share">
                  <div class="rated-list">
                    	<a  target="_blank"  href="{{$pro->link}}">	<span>{{$pro->link}}</span></a>
                  </div>
                  <span></span>
                  <a target="_blank"  href="{{$pro->link}}" title=""><i class="la la-link"></i></a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="block gray remove-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="heading">
            <h2>CATEGORIES</h2>
            <span>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium <br />doloremque laudantium, totam rem aperiam.</span>
          </div>
          <div class="categories-sec">
            <div class="row">
              @foreach($categorys as $cat)
              <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="category-box">
                  <a href="#" title=""><img src="{{$cat->image}}" alt="" /></a>
                  <div class="category-box-detail">
                    <span><a href="#" title=""><i class="la la-eye"></i></a></span>
                    <h3><a href="#" title="">{{$cat->name}}</a></h3>
                    <!-- <p>8 listings</p> -->
                  </div>
                </div><!-- Category Box -->
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <div class="block gray remove-top">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="subscribe-sec">
            <i class="la la-envelope-o"></i>
            <p>Subscribe and be notified about new locations</p>
            <form>
              <input type="text" placeholder="Your Mail" />
              <button type="submit"><i class="la la-angle-right"></i></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
