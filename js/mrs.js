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
    
    
    //Date Pickers  
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    
    var checkin = $('#dpd1').datepicker({
        format: 'mm-dd-yyyy',
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        $("#bookableitems option[value='0']").attr('selected', 'selected');
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
            $("#bookableitems option[value='0']").attr('selected', 'selected');            
        }
        checkin.hide();
        $('#dpd2')[0].focus();
    }).data('datepicker');
    var checkout = $('#dpd2').datepicker({
        format: 'mm-dd-yyyy',
        onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        $("#bookableitems option[value='0']").attr('selected', 'selected');
        checkout.hide();
    }).data('datepicker');
    
    //Bookable Item Change
    
    $("#bookableitems").change(function() {
        if(this.value == 0) {
            alert("Please Select a Bookable Item to see the Events");            
        }       
        else {
            
            jQuery.ajax({
                type: 'POST',    
                url: ajaxurl,
                dataType: 'html',
                data: {
                    action: 'getEventsList',
                    startDate: formatDate(checkin.date),
                    endDate:formatDate(checkout.date)
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
    
    
    $("input[name='event-item']").live("click", function() { 
        
        var value = this.value;
        $("#form-step1").hide();
        $("#booking-form").show();
    }); 
    
    $("#backtocalender").live("click", function() {
        $("#booking-form").hide();
        $("#form-step1").show();
    });
    
    $("#subscribe_event").submit(function(){
        alert($('#description').val());
        alert($("#email").val());        
        jQuery.ajax({
            type: 'POST',    
            url: ajaxurl,
            dataType: 'html',
            data: {
                action: 'getEventsList',
                startDate: formatDate(checkin.date),
                endDate:formatDate(checkout.date),
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
                jQuery("#events-list").html('');
                jQuery("#events-list").append(data);
            
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
            
            }
        });
        return false;
    });
});    