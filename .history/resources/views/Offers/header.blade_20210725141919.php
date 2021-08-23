



    <html>
    <head>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

  <body style="
     margin: 0 ;

  font-size: 0.9rem;
  font-weight: 400;
  line-height: 1.6;
  color: #212529;
  text-align: left;
  background-color: #278cdf;"

  >


<div>
  @yield('header');
</div>



    <div  style=" background-color:  #64aedf;      margin: 115px 470px 200px 500px ; padding: 50px 50px 50px 100px;">
    <div  style=" margin: 0px 0px 0px 10px ;">
        <div >
            <div >
                <div  ><h1 style="   text-align: center;">{{__(key:'messages.add offer')}} </h1></div>

                <div >

                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif

                    <br>
                    <form method="POST" action="{{route('offer-Post')}}" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" > {{__(key:'messages.Offer_name')}} &nbsp; </label>



                            <div class="col-md-6">
                                <input id="name" type="text"  name="name" placeholder="name"  style="padding: 5px 80px 00px 00px;" {{--required--}}>
                               @error('name')
                                <small class="form-text text-danger">{{$message}}</small>
                               @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" >{{__(key:'messages.Offer_price')}} &nbsp;&nbsp;</label>

                            <div class="col-md-6">
                                <input id="email" type="text"  name="price" placeholder="price"  style="padding: 5px 80px 00px 00px;" >
                                @error('price')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" >{{__(key:'messages.Offer_details')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="text"  name="details" placeholder="details" style="padding: 5px 80px 00px 00px;" >
                                @error('details')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>





                        <div >
                            <div >
                                <button type="Save offer" class="btn btn-primary"     style=" margin: 20px 00px 00px 110px ; padding: 5px 20px 5px 20px;  background-color:  #143df5;">
                                     {{__(key:'messages.Save')}}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
 </body>
</html>
