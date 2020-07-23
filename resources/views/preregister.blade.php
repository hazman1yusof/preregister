<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pre Register</title>
        <!-- Styles -->
        <style>
        </style>
    </head>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#select").change(function(){
                if($(this).val() == 'ic'){
                    $("#icnumdiv").show();
                    $("#hpdiv").hide();
                }else{
                    $("#hpdiv").show();
                    $("#icnumdiv").hide();
                }
            });

        });

    </script>
    <body>
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-5 col-xs-12">
            <div class="card border-primary mt-5">
              <div class="card-header"><h5>Pre-Registration</h5></div>
              <div class="card-body text-primary">
                    <div class="col-12" style="text-align: center">
                        <a class="navbar-brand" style="padding-top: 0">
                            <img src="img/logo.JPG" alt="logo" height="150px" width="auto">
                        </a>
                        <p>No 5-1-1, Jalan Medan PB1A, Seksyen 9, 43650<br>Bandar Baru Bangi, Selangor, Malaysia.<br>URL : medicsoft.com.my</p>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                      <div class="alert alert-success">
                        {{ Session::get('success') }}
                      </div>
                    @endif
                    <form method="post" action="/prereg">
                        @csrf
                        <div class="form-group" >
                            <small for="select">Register Using: </small>
                            <select class="form-control form-control" id="select" name="select">
                              <option value="ic" selected="">I/C Number</option>
                              <option value="hp">Handphone</option>
                            </select>
                        </div>
                        <div class="form-group" id="icnumdiv">
                            <small for="ic">I/C Number</small>
                            <input type="text" class="@error('ic') is-invalid @enderror form-control" id="ic" name="ic" placeholder="e.g. 890128014381">
                        </div>
                        <div class="form-group" id="hpdiv" style="display: none">
                            <small for="hp">Handphone</small>
                            <input type="text" class="@error('hp') is-invalid @enderror form-control" id="hp" name="hp" placeholder="e.g. 01123456789">
                        </div>
                        <button type="submit" class="form-control btn btn-outline-primary">Pre-Register</button>
                    </form>
              </div>
            </div>
            </div>
            </div>
        </div>

    </body>
</html>
