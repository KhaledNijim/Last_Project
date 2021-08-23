
 @extends('offers.header')



 @section('header')

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
  background-color: #278cdf;



  <?php

    if (App::isLocale('ar')) {

    ?>
     direction: rtl;
    <?php

}

?>
      "


  >



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
                    <form method="POST" action="" enctype="multipart/form-data" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" > {{__(key:'messages.Offer_name_ar')}} &nbsp; </label>
                                <div class="col-md-6">
                                <input id="name_ar" type="text"  name="name_ar" placeholder="name_ar"  style="padding: 5px 80px 00px 00px;" {{--required--}}>
                               @error('name_ar')
                                <small class="form-text text-danger">{{$message}}</small>
                               @enderror

                            </div>
                        </div>

                     <div class="form-group row">
                            <label for="name" > {{__(key:'messages.Offer_name_en')}} &nbsp; </label>
                        <div class="col-md-6">
                            <input id="name_en" type="text"  name="name_en" placeholder="name_en"  style="padding: 5px 80px 00px 00px;" {{--required--}}>
                           @error('name_en')
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
                            <label for="email" >{{__(key:'messages.Offer_details_ar')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="text"  name="details_ar" placeholder="details_ar" style="padding: 5px 80px 00px 00px;" >
                                @error('details_ar')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" >{{__(key:'messages.Offer_details_en')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="text"  name="details_en" placeholder="details_en" style="padding: 5px 80px 00px 00px;" >
                                @error('details_en')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" >{{__(key:'messages.choose_photo')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="file"  name="photo" placeholder="photo" style="padding: 5px 80px 00px 00px;" >
                                @error('photo')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>




                        <div >
                            <div >
                                <button id="save_offer" class="btn btn-primary"     style=" margin: 20px 00px 00px 110px ; padding: 5px 20px 5px 20px;  background-color:  #143df5;">
                                     {{__(key:'messages.Save')}}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
      </div>
      @stop
    </div>




        @section('sctipts')

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

                    <script>
                        $(document).on('click','#save_offer',function(e){
                            e.preventDefault();
                        $.ajax({
                            type: 'post',
                            url: "{{route('ajax-offers-store')}}",
                            data: {
                                    '_token' : "{{csrf_token()}}",
                                    'name_ar':$("input[name='name_ar']").val(),
                                    'name_en':$("input[name='name_en']")val(),
                                    'price':$("input[name='price']")val(),
                                    'details_ar':$("input[name='details_ar']")val(),
                                    'details_en':$("input[name='details_en']")val(),
                                // 'photo': $("input[name='photo']")val(),

                            },
                            success: function (data){

                            },
                            error: function (reject){

                            },
                        });
                    });

                    </script>

    @stop

 </body>

</html>





