@extends('layout.master')

@section('content')
<body>
 <div class="container">
       <div class="row pt-4">
            <div class="col-sm-6 text-left">
                <a href="../" class="next-prev-menu-item"> 
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                  <g id="ic_left-carrot" transform="translate(67 1099) rotate(180)">
                    <g id="Rectangle_105" data-name="Rectangle 105" transform="translate(51 1083)" fill="#fff" stroke="#A8A596" stroke-width="1" opacity="0">
                      <rect width="16" height="16" stroke="none"/>
                      <rect x="0.5" y="0.5" width="15" height="15" fill="none"/>
                    </g>
                    <path id="Path_2760" data-name="Path 2760" d="M-836.148,11088.659l6.072,6.071-6.072,6.072" transform="translate(892.648 -10004.159)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  </g>
                </svg>
                Menu
              </a>
            </div>
          <div class="col-sm-6 text-right">
               
          </div>
          
       </div>
       <div class="row mt-5">
         <div class="col-sm-12 text-center">
           <img src="assets/img/ic-discount.svg" width="40" height="40">
         </div>
         <div class="col-sm-12 text-center mt-3 mb-5">
           <h1>Offers & Discounts</h1>
         </div>
       </div>
       
       <div class="container mt-5 offers-discount-pg">
         <div class="row pl-5 ml-5">
           <a href="" class="col-sm-12 mb-5">
             <img src="assets/img/ic-offers.svg" > <br>
             1+1 on drinks offer
           </a>
          
           <a href="" class="col-sm-12 mb-5">
             <img src="assets/img/ic-discount-badge.svg" > <br>
             1+1 on drinks offer
           </a>
           
           <a href="" class="col-sm-12 mb-5">
             <img src="assets/img/ic-special-ofer.svg" > <br>
             1+1 on drinks offer
           </a>
         </div>
       </div>
        


   </div>

@endsection