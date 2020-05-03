//change active items
$('a.helpmakeactive').click(function(){
  $('a.helpmakeactive').removeClass('active');
  $(this).addClass('active');
});

$('span.helpmakeactive').click(function(){
    $('span.helpmakeactive').removeClass('active');
    $(this).addClass('active');
});

//sort items
// sort non veg dish
$('#non_veg_only').on('click',function(){
  event.preventDefault();
  $('.pure-veg-1').hide();
  $('.veg').hide();
  $('.nonveg').show();
});

// show veg dish only
$('#veg_only').on('click',function(){
  event.preventDefault();
  $('.pure-veg-1').show();
  $('.veg').show();
  $('.nonveg').hide();
});

// show all dishes
$('#all_veg_nveg').on('click',function(){
  event.preventDefault();
  $('.pure-veg-1').show();
  $('.veg').show();
  $('.nonveg').show();
});

$("#text-range").on("input",function () {
            $('.change-txt-size').css("font-size", $(this).val() + "px");
    });


$('.add-item-btn').on('click',function(){
  var id = '#'+this.id;
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: "add_item",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, item_id: this.id ,action: 'add'},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        if(data.status == 'success')
                        { 
                          $(id).hide('fast');
                          $(id).next('div').children('input').val(function(i, oldval) {
                            return ++oldval;
                          });
                          $(id).next('div').show('fast');
                          $("#kitchen_total").html(data.total_quantity); 
                        }
                        if(data.status == 'unauthorized')
                        {
                          // window.location = 'login';
                          console.log(data.id);
                          $(id).hide('fast');
                          $(id).next('div').children('input').val(function(i, oldval) {
                            return ++oldval;
                          });
                          $(id).next('div').show('fast');
                          $("#kitchen_total").html(data.total);

                        }
                    }
                });
});

$('.minus').on('click',function(){
  var id = '#'+this.id;
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: "add_item",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, item_id: this.id ,action: 'minus'},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        if(data.status == 'success')
                        { 
                          $(id).hide('fast');
                          $(id).next('div').children('input').val(function(i, oldval) {
                            return --oldval;
                          });
                          if($(id).next('div').children('input').val() == 0)
                          {
                            $(id).next('div').hide('fast');
                            $(id).show('fast');
                          }
                          $("#kitchen_total").html(data.total_quantity); 
                        }
                        if(data.status == 'unauthorized')
                        {
                          // window.location = 'login';
                          $(id).hide('fast');
                          $(id).next('div').children('input').val(function(i, oldval) {
                            return --oldval;
                          });
                          if($(id).next('div').children('input').val() == 0)
                          {
                            $(id).next('div').hide('fast');
                            $(id).show('fast');
                          }
                          $("#kitchen_total").html(data.total);
                        }
                    }
                });
});

$('.plus').on('click',function(){
  var id = '#'+this.id;
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: "add_item",
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, item_id: this.id ,action: 'plus'},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        if(data.status == 'success')
                        { 
                          $(id).hide('fast');
                          $(id).next('div').children('input').val(function(i, oldval) {
                            return ++oldval;
                          });
                          $(id).next('div').show('fast');
                          $("#kitchen_total").html(data.total_quantity);
                        }
                        if(data.status == 'unauthorized')
                        {
                          // window.location = 'login';
                          $(id).hide('fast');
                          $(id).next('div').children('input').val(function(i, oldval) {
                            return ++oldval;
                          });
                          $(id).next('div').show('fast');
                          $("#kitchen_total").html(data.total);
                        }
                    }
                });
});