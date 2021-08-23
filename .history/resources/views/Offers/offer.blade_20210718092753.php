<html>

  <body style="
     margin: 0 ;

  font-size: 0.9rem;
  font-weight: 400;
  line-height: 1.6;
  color: #212529;
  text-align: left;
  background-color: #278cdf;"

  >
    <div class="container" style=" background-color:  #64aedf;      margin: 115px 470px 200px 500px ; padding: 50px 50px 50px 100px;">
    <div class="row justify-content-center" style=" margin: 0px 0px 0px 10px ;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" ><h1> Add your Offer </h1></div>

                <div class="card-body">

                    <form method="POST" action="{{route('offer-Post')}}" >
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Offer name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" placeholder="name"  style="padding: 5px 80px 00px 80px;" required>
                        {{--}       @error(name)
                               <small class="form-text text-danger"> </small>
                               @enderror--}}

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Offer price</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="price" placeholder="price"  style="padding: 5px 80px 00px 80px;" >
                                @error(price)
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Offer details</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="details" placeholder="details" style="padding: 5px 80px 00px 80px;" >
                                @error(details)
                                <small class="form-text text-danger"> </small>
                                @enderror
                            </div>
                        </div>





                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="Save offer" class="btn btn-primary"     style=" margin: 20px 00px 00px 110px ; padding: 5px 20px 5px 20px;  background-color:  #38c172;">
                                     Save offer
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
