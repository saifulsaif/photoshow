<footer>
  <div class="block remove-bottom">
    <div data-velocity="-.1" style="background: url({{ asset('images/footer.jpg') }}) repeat scroll 50% 422.28px transparent;" class="parallax no-parallax scrolly-invisible"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-4 column">
          <div class="widget">
            <h3 class="footer-title">Free Download Images</h3>
            <div class="about-widget">
              <p>{{$settings->description}}</p>
              <ul>
                <li><a href="{{$settings->facebook}}" title=""><i class="la la-twitter"></i></a></li>
                <li><a href="{{$settings->youtube}}" title=""><i class="la la-instagram"></i></a></li>
                <li><a href="#" title=""><i class="la la-pinterest"></i></a></li>
                <li><a href="{{$settings->twitter}}" title=""><i class="la la-google-plus"></i></a></li>
                <li><a href="#" title=""><i class="la la-tumblr "></i></a></li>
              </ul>
            </div>
          </div><!-- Widget -->
        </div>
        <div class="col-md-4 column">
          <div class="widget">
            <h3 class="footer-title">Images CATEGORIES</h3>
            <div class="link-widget">
              <ul>
                <li><a href="{{route('terms')}}" title="">Terms And Conditions</a></li>
                <li><a href="{{route('policy')}}" title="">Privacy And Policy</a></li>
                <li><a href="#" title="">Money & Finance</a></li>
                <li><a href="#" title="">Movies & Cinemas</a></li>
                <li><a href="#" title="">Sports</a></li>
                <li><a href="#" title="">Music</a></li>
                <li><a href="#" title="">Parties</a></li>
                <li><a href="#" title="">People & Health</a></li>
                <li><a href="#" title="">Seminars</a></li>
                <li><a href="#" title="">Theatres</a></li>
              </ul>
            </div>
          </div><!-- Widget -->
        </div>
        <div class="col-md-4 column">
            @php
       	 $prom = App\Promotion::orderBy('id', 'DESC')->first();
       	 @endphp
          @if($prom)
          <div class="fix-div">
          <a target="_blank" href="{{$prom->link}}">  <img style="height:100%;width:100%;" src="{{asset('/'.$prom->photo)}}" alt=""></a>

          </div>
          @endif
          <div class="widget">
            <h3 class="footer-title">CONTACT INFORMATION</h3>
            <div class="contact-widget">
              <ul>
                <li>
                  <i class="la la-map"></i>
                  <span>Address</span>
                  <span>{{$settings->address}}</span>
                </li>
                <li>
                  <i class="la la-mobile"></i>
                  <span>Cell Phone</span>
                  <span>{{$settings->phone}}</span>
                </li>
                <li>
                  <i class="la la-envelope"></i>
                  <span>E-mail Address</span>
                  <span><a href="mailto:info@prolist.com">{{$settings->gmail}}</a>, <a href="mailto:support@prolist.gmail">{{$settings->gmail}}</a></span>
                </li>
              </ul>
            </div>
          </div><!-- Widget -->
        </div>
      </div>
    </div>
    <div class="bottom-line">
      <span>{{$settings->footer}}</span>
    </div>
  </div>
</footer>
