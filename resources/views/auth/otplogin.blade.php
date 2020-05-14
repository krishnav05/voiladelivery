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
           <h1>Enter Your Mobile Number</h1>
           <p>
             <!-- <img src="{{asset('assets/img/ic-enter-mobile.png')}}"> -->
           </p>
      </div>
    </div>
     <div class="row mt-2">
       <form method="POST" action="sendotptomobile" class="col sign-in-up-form pl-5 pr-5 ">
        @csrf
                <div class="row">
                  <div class="col-sm-12 pl-0 pr-0">
                    <h5 class="text-center mt-5">India +91 🇮🇳</h5>
                    <input type="text" pattern="\d*" name="phone" size="10" minlength="10" maxlength="10" class="col-sm-12 otp-in text-left mb-2" placeholder="Your Phone Number" style="width: 100%;"> 
                    <p class="small text-center">We will send you a One time SMS message Carrier rates may apply</p>
                  </div>
                    

                    <input type="submit" name="" value="Request OTP" class="btn btn-primary col mt-3">
                    
                </div>
        </form>
     </div>
   </div>
  
  



  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('assets/js/custom-menu.js')}}"></script>
    
  </body>
</html>