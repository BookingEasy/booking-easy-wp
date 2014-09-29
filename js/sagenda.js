jQuery(document).ready(function($) {    
    
    function padNum(num, padding) {
        num = '' + num;
        while (num.length < padding) {
            num = '0' + num;
        }
        return num;
    }
    
    function formatDate(date) {
        return padNum(date.getMonth() + 1, 2) + '-' +        
        padNum(date.getDate(), 2) + '-' +
        padNum(date.getFullYear(), 4) ;
    }
    
    
    //    //Date Pickers  
    //    var nowTemp = new Date();
    //    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    //    
    //    var checkin = $('#dpd1').datepicker({
    //        format: 'mm-dd-yyyy',
    //        onRender: function(date) {
    //            return date.valueOf() < now.valueOf() ? 'disabled' : '';
    //        }
    //    }).on('changeDate', function(ev) {
    //        $("#bookableitems option[value='0']").attr('selected', 'selected');
    //        if (ev.date.valueOf() > checkout.date.valueOf()) {
    //            var newDate = new Date(ev.date)
    //            newDate.setDate(newDate.getDate() + 1);
    //            checkout.setValue(newDate);
    //            $("#bookableitems option[value='0']").attr('selected', 'selected');            
    //        }
    //        checkin.hide();
    //        $('#dpd2')[0].focus();
    //    }).data('datepicker');
    //    var checkout = $('#dpd2').datepicker({
    //        format: 'mm-dd-yyyy',
    //        onRender: function(date) {
    //            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
    //        }
    //    }).on('changeDate', function(ev) {
    //        $("#bookableitems option[value='0']").attr('selected', 'selected');
    //        checkout.hide();
    //    }).data('datepicker');
    //    
    
    // New Code
    //  var startDate = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    //   var endDate = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    $('#dp4').datepicker({
        format: 'mm-dd-yyyy',
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    })
    .on('changeDate', function(ev){
        if (ev.date.valueOf() > endDate.valueOf()){            
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            endDate.setValue(newDate);
            $("#bookableitems option[value='0']").attr('selected', 'selected');  
            $('#alert').show().find('strong').text('The start date can not be greater then the end date');
        }
        else {         
            startDate = new Date(ev.date);
            endDate = new Date(ev.date);
            $('#alert').hide();
            $('#dpd1').val($('#dp4').data('date'));
        }
        $('#dp4').datepicker('hide');
        $('#dp5')[0].focus();
    });
    $('#dp5').datepicker({
        format: 'mm-dd-yyyy',
        onRender: function(date) {
            return date.valueOf() <= startDate.valueOf() ? 'disabled' : '';
        }
    })
    .on('changeDate', function(ev){
        
        if (ev.date.valueOf() < startDate.valueOf()){
            $('#alert').show().find('strong').text('The end date can not be less then the start date');
        } else {
            $("#bookableitems option[value='0']").attr('selected', 'selected');
            endDate = new Date(ev.date);
            $('#alert').hide();
            $('#dpd2').val($('#dp5').data('date'));
        }
        $('#dp5').datepicker('hide');
    });
    
    //Bookable Item Change
    
    $("#bookableitems").change(function() {
        
        if($('#dpd1').val().length == 0  || $('#dpd2').val().length == 0) {
            $("#alert-mesg").css("display","block");
            $("#alert-mesg").text("Please Select the Start and End date.");
        }
        else if(this.value == 0) {
            $("#alert-mesg").css("display","block");
            $("#alert-mesg").text("Please Select a Bookable Item to see the Events");          
        }       
        else {            
            $("#alert-mesg").css("display","none");
            jQuery.ajax({
                type: 'POST',    
                url: ajaxurl,
                dataType: 'html',
                data: {
                    action: 'getEventsList',
                    startDate: $('#dpd1').val(),
                    endDate:$('#dpd2').val(),
                    bookableItemId:$('#bookableitems :selected').val()
                },
                success: function(data) {
                    jQuery("#events-list").html('');
                    jQuery("#events-list").append(data);
                
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                
                }
            });
        
        }
    });
    
    
    //Save Button Click
    
    $("#bookableitemsss").change(function() {                   
       
    
    
        });
    
    
    $("#events-list").delegate("input[name='event-item']", "click", function() {
        
        var value = this.value;
        $("#EventIdentifier").val(this.id);
        $("#form-step1").hide();
        $("#booking-form").show();
    }); 
    

    $("#booking-form").delegate("#backtocalender", "click", function() {

        $("#booking-form").hide();
        $("#form-step1").show();
    });
    
    function validateStep1() {
        is_error = true;
        if($("#firstName").val().length == 0) {
            $("#firstName").css("background" , "#FFAAAA");        
            is_error = false;
        }
        else {
            $("#firstName").css("background" , "#FFFFFF");        
        }
        if($("#lastName").val().length == 0) {
            $("#lastName").css("background" , "#FFAAAA");        
            is_error = false;
        }
        if($("#phonenumber").val().length == 0) {
            $("#phonenumber").css("background" , "#FFAAAA");        
            is_error = false;
        }
        if($("#email").val().length == 0) {
            $("#email").css("background" , "#FFAAAA");        
            is_error = false;
        }
        
        if($("#description").val().length == 0) {
            $("#description").css("background" , "#FFAAAA");        
            is_error = false;
        }
        return is_error;
    }
    
    $("#booking-form").delegate("#submit-reservation", "click", function() {
        if(validateStep1()) {
            jQuery.ajax({
                type: 'POST',    
                url: ajaxurl,
                dataType: 'html',
                data: {
                    action: 'subscribeForEvent',
                    EventIdentifier: $('#EventIdentifier').val(),
                    endDate:$('#dpd2').val(),
                    BookableItemId: $('#bookableitems :selected').val(),
                    EventScheduleId: $("input:radio[name=event-item]:checked").val(),
                    Courtesy:$("input:radio[name=optionsRadios]:checked").val(),
                    FirstName:$('#firstName').val(),
                    LastName :$('#lastName').val(),
                    PhoneNumber:$('#phonenumber').val(),
                    Email:$('#email').val(),
                    Description:$('#description').val()
                },
                success: function(data) {
                    //$('#subscribe_event').trigger("reset");
                    $("#booking-form").hide();
                    $("#form-step1").show();
                    //jQuery("#events-list").html('');
                    $("input:radio[name=event-item]:checked").prop('checked', false);
                    $(".sagenda_alert").css("display","inline-block");
            
            
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        }
    });
});    