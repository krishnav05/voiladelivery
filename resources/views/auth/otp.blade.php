<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/menu-style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/menu-style.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Questrial&display=swap" rel="stylesheet">  
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/img/apple-touch-icon-ipad-retina-display.png')}}" /> 
    <title>Digital Menu</title>
  </head>
  <body class="kitchen-bg">
    
  
<div class="container">
    <div class="row pt-4">
            <div class="col-sm-6 text-left">
                <a onclick="window.history.back();" class="next-prev-menu-item"> 
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                  <g id="ic_left-carrot" transform="translate(67 1099) rotate(180)">
                    <g id="Rectangle_105" data-name="Rectangle 105" transform="translate(51 1083)" fill="#fff" stroke="#A8A596" stroke-width="1" opacity="0">
                      <rect width="16" height="16" stroke="none"></rect>
                      <rect x="0.5" y="0.5" width="15" height="15" fill="none"></rect>
                    </g>
                    <path id="Path_2760" data-name="Path 2760" d="M-836.148,11088.659l6.072,6.071-6.072,6.072" transform="translate(892.648 -10004.159)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                  </g>
                </svg>
                Back
              </a>
            </div>
          <div class="col-sm-6 text-right">
               
          </div>
          
       </div>
    <div class="row">
      <div class="col-sm-12 text-center mt-3">
           <h1>Verification Code</h1>
           <p> Please type the verification code sent to <br> +91 {{$number}}</p>
         </div>
    </div>
   
     <div class="row mt-2">
       <form action="verify-otp" method="POST" class="col sign-in-up-form pl-5 pr-5 mt-3">
        @csrf
                <div class="row">
                  <div class="col-sm-12 text-center">
                    <input type="hidden" id="phone" name="phone" value="{{$number}}">
                    <input type="number" minlength="1" maxlength="1" name="pin1" class="otp-in" maxlength="1"> <input type="number" minlength="1" maxlength="1" name="pin2" class="otp-in" maxlength="1"> <input type="number" minlength="1" maxlength="1" name="pin3" class="otp-in" maxlength="1"> <input type="number" minlength="1" maxlength="1" name="pin4" class="otp-in" maxlength="1">
                  </div>
                   @if (Session::has('message'))

   <div class="col-sm-12 text-center mt-3 alert alert-danger" role="alert">
  Wrong Pin!
</div>

@endif
                    <input type="submit" name="" value="VERIFY & PROCEED" class="btn btn-primary col mt-3">
                     
                    <div id="opt-timer" class="col-sm-12 text-center mt-3"></div>
                    <a href="#" id="resend" class="col-sm-12 small mt-3 pl-0 text-center">Resend OTP</a>
                </div>
        </form>
     </div>
   </div>



  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('assets/js/custom-menu.js')}}"></script>
    <script type="text/javascript">
      var timeLeft = 60;
      var elem = document.getElementById('opt-timer');
      var timerId = setInterval(countdown, 1000);

      function countdown() {
          if (timeLeft == -1) {
              clearTimeout(timerId);
              doSomething();
          } else {
              elem.innerHTML = timeLeft + ' seconds remaining';
              timeLeft--;
          }
      }

      $(document).ready(function(){
        $('input').keyup(function(event){
          if($(this).val().length==$(this).attr("maxlength") && event.keyCode !== 8){
            $(this).next().focus();
          }
        });
      $('input').keydown(function(event){
        if(event.keyCode == 8){
          event.preventDefault();
          if($(this).val().length==1){
            $(this).val('');
          }
          else{
            $(this).prev().focus().val('');
          }
        }
      });
      });

      $('#resend').on('click',function(){
        var phone = $('#phone').val();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          /* the route pointing to the post function */
          url: 'sendotptomobile',
          type: 'POST',
          /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN,phone:phone, action:'resend'},
          dataType: 'JSON',
          /* remind that 'data' is the response of the AjaxController */
          success: function (data) {
            window.timeLeft = 60;
            window.elem = document.getElementById('opt-timer');
            clearTimeout(window.timerId);
            window.timerId = setInterval(countdown, 1000);
          }
        });


      });

    </script>
  </body>
</html>