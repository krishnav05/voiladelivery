@extends('layout.master')

@section('content')
<body>
<header class="fixed-top">
  <ul class="nav nav-pills restro-master-menu" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-restro-menu-tab" data-toggle="pill" href="#pills-restro-menu" role="tab" aria-controls="pills-restro-menu" aria-selected="true"> 
        <svg id="ic-menu" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
          <g id="Group_212" data-name="Group 212" transform="translate(-611.127 -590.779)" opacity="0.7">
            <rect id="Rectangle_115" data-name="Rectangle 115" width="28" height="28" transform="translate(611.127 590.779)" fill="none"/>
            <g id="Group_207" data-name="Group 207">
              <g id="Group_203" data-name="Group 203" transform="translate(613.489 595.199)">
                <path id="Path_2766" data-name="Path 2766" d="M635.3,596.044h-21.03a1.167,1.167,0,0,1,0-2.333H635.3a1.167,1.167,0,0,1,0,2.333Z" transform="translate(-613.152 -593.711)"/>
              </g>
              <g id="Group_204" data-name="Group 204" transform="translate(613.15 603.289)">
                <path id="Path_2767" data-name="Path 2767" d="M635.867,604.022h-21.84a1.167,1.167,0,0,1,0-2.333h21.84a1.167,1.167,0,0,1,0,2.333Z" transform="translate(-612.861 -601.689)"/>
              </g>
              <g id="Group_205" data-name="Group 205" transform="translate(613.489 611.569)">
                <path id="Path_2768" data-name="Path 2768" d="M635.3,612.188h-21.03a1.168,1.168,0,0,1,0-2.333H635.3a1.167,1.167,0,0,1,0,2.333Z" transform="translate(-613.152 -609.855)"/>
              </g>
            </g>
          </g>
        </svg>
        <span class="d-block">Menu</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-all-cuisines-tab" data-toggle="pill" href="#pills-all-cuisines" role="tab" aria-controls="pills-all-cuisines" aria-selected="false">
        <svg id="ic-cuisine" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
          <g id="Group_211" data-name="Group 211" transform="translate(-212 -14)" opacity="0.7">
            <g id="Rectangle_113" data-name="Rectangle 113" transform="translate(212 14)" fill="#fff" stroke="#707070" stroke-width="1" opacity="0">
              <rect width="28" height="28" stroke="none"/>
              <rect x="0.5" y="0.5" width="27" height="27" fill="none"/>
            </g>
            <g id="Group_154" data-name="Group 154" transform="translate(112.827 -442.173)">
              <g id="Group_154-2" data-name="Group 154" transform="translate(101 458)">
                <g id="Rectangle_3_">
                  <path id="Path_2567" data-name="Path 2567" d="M24.346,24.346H0V0H24.346ZM1.178,23.168h21.99V1.178H1.178Z"/>
                </g>
                <g id="Oval_3_" transform="translate(5.907 5.907)">
                  <circle id="Ellipse_29" data-name="Ellipse 29" cx="6.265" cy="6.265" r="6.265" transform="translate(0 0)"/>
                </g>
              </g>
            </g>
          </g>
        </svg>
        <span class="d-block">Veg/Non</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-item-search-tab" data-toggle="pill" href="#pills-item-search" role="tab" aria-controls="pills-item-search" aria-selected="false">
        <svg id="ic-search" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
          <g id="Group_213" data-name="Group 213" transform="translate(-778.62 -576.813)" opacity="0.7">
            <path id="Path_2765" data-name="Path 2765" d="M802.333,598.934l-5.908-5.908a8.237,8.237,0,1,0-1.655,1.63l5.921,5.921a1.162,1.162,0,1,0,1.643-1.643ZM784.087,588.05a5.81,5.81,0,1,1,5.81,5.81A5.81,5.81,0,0,1,784.087,588.05Z" transform="translate(0.442 0.436)"/>
            <rect id="Rectangle_109" data-name="Rectangle 109" width="28" height="28" transform="translate(778.62 576.813)" fill="none"/>
          </g>
        </svg>
        <span class="d-block">Search</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-accessibility-tab" data-toggle="pill" href="#pills-accessibility" role="tab" aria-controls="pills-accessibility" aria-selected="false">
        <svg id="ic-accessibility" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
          <g id="Group_214" data-name="Group 214" transform="translate(-700.883 -861.883)" opacity="0.7">
            <g id="Rectangle_107" data-name="Rectangle 107" transform="translate(700.883 861.883)" fill="#fff" stroke="#707070" stroke-width="1" opacity="0">
              <rect width="28" height="28" stroke="none"/>
              <rect x="0.5" y="0.5" width="27" height="27" fill="none"/>
            </g>
            <g id="Group_174" data-name="Group 174" transform="translate(705.262 863.838)">
              <path id="Path_2573" data-name="Path 2573" d="M-931.084,1005.932a4.927,4.927,0,0,1-4.921-4.921,4.892,4.892,0,0,1,2.2-4.088l-.151-2.423a7.126,7.126,0,0,0-4.239,6.511,7.124,7.124,0,0,0,7.116,7.116,7.116,7.116,0,0,0,6.94-5.552h-2.3A4.93,4.93,0,0,1-931.084,1005.932Z" transform="translate(938.2 -984.154)"/>
              <path id="Path_2574" data-name="Path 2574" d="M-901.3,993.436l-1.767-7.949a2.2,2.2,0,0,0-1.893-1.691l-4.517-.454a.513.513,0,0,1-.479-.454l-.177-.984,4.34.076a.388.388,0,0,0,.379-.379v-.757a.357.357,0,0,0-.328-.353l-4.719-.555-.4-2.422a1.683,1.683,0,0,0-1.666-1.413h-1.085a1.7,1.7,0,0,0-1.691,1.792l.429,6.687a2.731,2.731,0,0,0,2.725,2.549h6.233a.545.545,0,0,1,.53.4l1.59,6.107a.834.834,0,0,0,.807.631h1.06A.684.684,0,0,0-901.3,993.436Z" transform="translate(921.086 -970.397)"/>
              <circle id="Ellipse_43" data-name="Ellipse 43" cx="2.498" cy="2.498" r="2.498" transform="translate(5.198 0)"/>
            </g>
          </g>
        </svg>
        <span class="d-block">Accessibility</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-choose-lang-tab" data-toggle="pill" href="#pills-choose-lang" role="tab" aria-controls="pills-choose-lang" aria-selected="false">
        <svg id="ic-lang" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
          <g id="Group_215" data-name="Group 215" transform="translate(-11 -11)" opacity="0.7">
            <g id="Rectangle_106" data-name="Rectangle 106" transform="translate(11 11)" fill="#fff" stroke="#707070" stroke-width="1" opacity="0">
              <rect width="28" height="28" stroke="none"/>
              <rect x="0.5" y="0.5" width="27" height="27" fill="none"/>
            </g>
            <g id="Group_187" data-name="Group 187" transform="translate(12.591 13.895)">
              <path id="Path_2764" data-name="Path 2764" d="M7.506-5.626H9.58l-.3-.887L5.807-16.238H3.748L.171-6.513l-.286.887H2.05L3.207-8.888H6.349Zm-3.833-4.6,1.112-3.593,1.052,3.593Z" transform="translate(0.115 16.238)"/>
              <path id="Path_2763" data-name="Path 2763" d="M6,0H4.3L0,12.3H1.684Z" transform="translate(7.772 5.305) rotate(-7)"/>
              <path id="Path_2762" data-name="Path 2762" d="M7.65-11.978l.242.026q.11.011.25.011a3.965,3.965,0,0,0,.928-.11,3.619,3.619,0,0,0,.767-.264v-4.565h3.516v1.651h-1.6v9.292H9.837v-4.741a1.592,1.592,0,0,1-.228.088q-.139.044-.3.081t-.341.059a2.724,2.724,0,0,1-.338.022q.037.183.059.33a2.3,2.3,0,0,1,.022.338,2.727,2.727,0,0,1-.25,1.185,2.582,2.582,0,0,1-.686.888,3.106,3.106,0,0,1-1.028.558,4.025,4.025,0,0,1-1.266.194,3.862,3.862,0,0,1-1.27-.2,3.971,3.971,0,0,1-1.042-.539,4.537,4.537,0,0,1-.848-.8,7.289,7.289,0,0,1-.683-.995,9.688,9.688,0,0,1-.543-1.108q-.239-.576-.429-1.141L2.3-12.382q.132.418.3.859a8.608,8.608,0,0,0,.374.855,6.4,6.4,0,0,0,.462.778,3.73,3.73,0,0,0,.558.639,2.484,2.484,0,0,0,.661.433,1.889,1.889,0,0,0,.774.158,1.268,1.268,0,0,0,.987-.374,1.435,1.435,0,0,0,.341-1.006,1.627,1.627,0,0,0-.125-.668,1.263,1.263,0,0,0-.345-.462,1.388,1.388,0,0,0-.521-.268,2.412,2.412,0,0,0-.653-.084q-.073,0-.176,0t-.213.011l-.22.015-.191.015V-13.13a1.229,1.229,0,0,0,.136.007h.136a4.07,4.07,0,0,0,.712-.059,1.7,1.7,0,0,0,.572-.2,1.048,1.048,0,0,0,.382-.385,1.191,1.191,0,0,0,.139-.6.948.948,0,0,0-.323-.8,1.393,1.393,0,0,0-.873-.25,2.912,2.912,0,0,0-.807.114,6.4,6.4,0,0,0-.771.275l-.44-1.6a4.965,4.965,0,0,1,1.083-.382,4.829,4.829,0,0,1,1.061-.125,3.607,3.607,0,0,1,1.222.2,2.936,2.936,0,0,1,.95.543,2.457,2.457,0,0,1,.617.811,2.316,2.316,0,0,1,.22,1A2.322,2.322,0,0,1,8-13.384a2.973,2.973,0,0,1-.972.972l.007.037a2.617,2.617,0,0,1,.323.183Q7.51-12.088,7.65-11.978Z" transform="translate(11.609 28.247)"/>
            </g>
          </g>
        </svg>
        <span class="d-block">Language</span>
      </a>
    </li>

  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-restro-menu" role="tabpanel" aria-labelledby="pills-restro-menu-tab">
      <nav>
       @foreach($category as $key)
       @if ($loop->first)
       <a href="#" class="active helpmakeactive {{str_replace(' ','',$key['category_name'])}}">{{$key['category_name']}}</a>
       @else
       <a href="#" class="helpmakeactive {{str_replace(' ','',$key['category_name'])}}"> {{$key['category_name']}} </a>
       @endif
       @endforeach
     </nav>
   </div>
   <div class="tab-pane fade" id="pills-all-cuisines" role="tabpanel" aria-labelledby="pills-all-cuisines-tab">
     <div class="row all-cuisines">
      <a href="#" id="all_veg_nveg" class="helpmakeactive active col"> <img src="{{asset('assets/img/ic-veg.svg')}}" class="d-inline"> <img src="{{asset('assets/img/ic-non-veg.svg')}}" class="d-inline mr-1"> All </a>
      <a href="#" id="veg_only" class="helpmakeactive col"> <img src="{{asset('assets/img/ic-veg.svg')}}" class="d-inline mr-1"> Veg. </a>
      <a href="#" id="non_veg_only" class="helpmakeactive col"> <img src="{{asset('assets/img/ic-non-veg.svg')}}" class="d-inline mr-1"> Non-Veg.  </a>
    </div>
  </div>
  <div class="tab-pane fade menu-item-search" id="pills-item-search" role="tabpanel" aria-labelledby="pills-item-search-tab">
   <input type="text" id="inputDatabaseName" class="form-control  col-sm-8 m-auto" placeholder="Search for a dish">
 </div>
 <div class="tab-pane fade p-2 accessibility-opt" id="pills-accessibility" role="tabpanel" aria-labelledby="pills-accessibility-tab">
  <div class="container m-2">
    <div class="row small">
      <div class="col pl-0 font-size-change">
        Text Size <br>
        <span class="small mr-1">AA</span> <input type="range" min="14" max="20" value="0" class="slider" id="text-range" step="1"> <span class="ml-1">AA</span>
      </div>
      <div class="col text-center">
        <span class="float-left color-theme-box"> Color </span> <br> <span class="theme-color-light d-inline active helpmakeactive" id="theme-color-light"></span> <span class="theme-color-dark d-inline ml-4 helpmakeactive" id="theme-color-dark"></span>
      </div>
    </div>
  </div>
</div>
<div class="tab-pane fade choose-lang" id="pills-choose-lang" role="tabpanel" aria-labelledby="pills-choose-lang-tab">
  <div class="container">
    <div class="row text-center">
      <a href="{{ url('locale/en') }}" class="col active" id="lang-en"> English </a>
      <a href="{{ url('locale/hi') }}" class="col" id="lang-hi"> हिन्दी </a>
    </div>
  </div>
</div>
</div>
</header>

@foreach($category as $cdata)
<div class="container-fluid header-1 pure-veg-{{$cdata['is_pure_veg']}}" id="{{str_replace(' ','',$cdata['category_name'])}}">
  @if($loop->first)
  <!-- offers badge start here -->
  <!-- <div class="container">
    <div class="">
      <ul class="offers-top-badge">
        <li class="ml-0"> <img src="{{asset('assets/img/ic-discount-badge.svg')}}"> 10% OFF on all items </li>
        <li class="ml-0"> <a href="offers" class="float-right mr-0">All OFFERS</a> </li>
      </ul>
    </div>
  </div>  -->
  <!-- offers badge end here -->
  @endif 
  <div class="container">
    <h1 class="pt-5"> {{$cdata['category_name']}}  </h1>  
  </div>
</div>
<main class="container">
 @foreach($category_items as $idata)
 @if($cdata['category_id'] == $idata['category_id'])
 <div class="row pt-5 pb-2 {{$idata['item_vegetarian']}}">

   <a class="col ml-4 no-pic" href="">
     <img src="{{asset('assets/img/fooditems/'.$idata['image'].'')}}" class="menu-item-img img-fluid" >
     <img src="{{asset('assets/img/ic-food-more.svg')}}" class="ic-food-more">

   </a>
   <div class="col">
     <h2 class="change-txt-size"><img src="{{asset('assets/img/ic-'.$idata['item_vegetarian'].'.svg')}}" class="veg-badge mr-1 d-inline"> <a> {{$idata['item_name']}}</a><span class="item-price change-txt-size float-right"> ₹ {{$idata['item_price']}} </span></h2>
     <p class="menu-item-short-desc change-txt-size mb-1"> {{$idata['item_description']}} </p>
     <p class="item-contains change-txt-size">


     </p>
     @if($idata['item_quantity'] != '')
     <div class="row">
      <div class="col">
        <button type="button" id="{{$idata['item_id']}}" class="btn btn-outline-primary add-item-btn btn-sm w-auto" style="display: none;"> <img src="{{asset('assets/img/ic-plus.svg')}}" class="d-inline"> ADD</button>
        <div class="input-group" style="display: block;">

          <button class="btn btn-light btn-sm float-left minus" id="{{$idata['item_id']}}"><img src="{{asset('assets/img/ic-minus.svg')}}" class="d-inline"></button>

          <input type="number" id="qty_input{{$idata['item_id']}}" class="add-plus-min float-left" value="{{$idata['item_quantity']}}" min="0" disabled>

          <button class="btn btn-light btn-sm float-left plus" id="{{$idata['item_id']}}"><img src="{{asset('assets/img/ic-plus.svg')}}" class="d-inline"></button>

        </div>
      </div>
      <div class="col">
        <span class="d-inline item-discount-inline change-txt-size">  <img src="{{asset('assets/img/ic-discount.svg')}}" class="mr-1"> {{$idata['discount']}}% off </span>
      </div>            
    </div>
    @else
    <div class="row">
      <div class="col">
        <button type="button" id="{{$idata['item_id']}}" class="btn btn-outline-primary add-item-btn btn-sm w-auto"> <img src="{{asset('assets/img/ic-plus.svg')}}" class="d-inline"> ADD</button>
        <div class="input-group">

          <button class="btn btn-light btn-sm float-left minus" id="{{$idata['item_id']}}"><img src="{{asset('assets/img/ic-minus.svg')}}" class="d-inline"></button>

          <input type="number" id="qty_input{{$idata['item_id']}}" class="add-plus-min float-left" value="0" min="0" disabled>

          <button class="btn btn-light btn-sm float-left plus" id="{{$idata['item_id']}}"><img src="{{asset('assets/img/ic-plus.svg')}}" class="d-inline"></button>

        </div>
      </div>
      <!-- <div class="col">
        <span class="d-inline item-discount-inline change-txt-size">  <img src="{{asset('assets/img/ic-discount.svg')}}" class="mr-1"> {{$idata['discount']}}% off </span>
      </div>  -->           
    </div>
    @endif


  </div>  
</div>
@endif
@endforeach
</main>
@endforeach
<a href="kitchen" class="kitchen-cart">
  <span class="item-count-badge" id="kitchen_total"> {{$total_quantity}} </span>
  <img src="{{asset('assets/img/ic-kitchen-cart.svg')}}" width="46" height="55">
</a>


@endsection

@section('footer')

<script type="text/javascript">
  @foreach($category as $data)
  document.querySelector('.{{str_replace(' ','',$data['category_name'])}}').addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('#{{str_replace(' ','',$data['category_name'])}}').scrollIntoView({ behavior: 'smooth' });
  });
  @endforeach

    var allitems = [
  @foreach($category_items as $idata)
  "{{$idata['item_name']}}",
       @endforeach];

  var allitemsimages = [
  @foreach($category_items as $idata)
  "{{$idata['image']}}",
       @endforeach
  ];

  function autocomplete(inp, arr , arrimage) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = $("#inputDatabaseName").val();
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        // var balue = $("#inputDatabaseName").val();
      // console.log(balue);
        /*check if the item starts with the same letters as the text field value:*/
        // if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          if (arr[i].toUpperCase().includes(val.toUpperCase())) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              $(window).scrollTop($("a:contains('" + inp.value + "'):last").parent('h2').parent('div').offset().top-130);
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
} 

autocomplete(document.getElementById("inputDatabaseName"), allitems , allitemsimages);

// change theme to dark
$('#theme-color-dark').click(function () {
    $('head').append('<link rel="stylesheet" href="{{ asset("assets/css/menu-dark-style.css") }}" type="text/css" id="menu-dark" />');
});

// change theme to light
$('#theme-color-light').click(function () {
    $('head').find('link#menu-dark').remove();
});
</script>

@endsection