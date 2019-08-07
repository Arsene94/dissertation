$(document).ready(function() {
    // Add multiple choice
    $('#setCompetitionMC').hide();
    $('#competitionMC').click(function(){
        
        $("#setCompetitionMC").toggle();
    });
    var i=1;
    $('#add').click(function(){
        i++;
        $('.wrap').append('<div class="form-group" id="fg'+i+'"><input style="display:inline-block;" type="text" name="answer[]" placeholder="Option" class="form-control form-control2" id="answer'+i+'" />  <input type="checkbox" class="form-check-input cr" name="correct-answer[]" id="correct-answer'+i+'" value="'+i+'"><label class="form-check-label" for="correct-answer'+i+'"> Correct answer</label> <a name="remove" id="'+i+'" class="btn_remove" style="margin-top:-5px; cursor: pointer;"><i class="fas fa-trash-alt"></i></a><br /><span id="aerr'+i+'" class="text-danger" style="display: none;">Cant be empty</span></div>');
        
    });
    
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#fg'+button_id+'').remove();
    });
    
    $('#submitMC').click(function(){
        if(!$('#MCquestion').val()) {
            $('#MCquestion').addClass('error');
            $('#MCqerr').show();
        }

        /*
        for(var j=1;j<=i;j++) {
            if(!$('answer'+j).val()) {
                $('#answer'+j).addClass('error');
                $('#aerr'+j).show();
            }
        }*/
        
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        $.ajax({
            
            url:baseUrl+"/public/event/"+$('#evID').val()+"/polls/1",
            method:"POST",
            data:$('#multichoices').serialize(),
            success:function(data)
            {
                //alert(data.success);
                $('#multichoices')[0].reset();
                $('#rating').modal('hide');
                $('#multiplechoice').modal('hide');
                $('#createPoll').modal('hide');
                //window.location.replace({{route('poll.home', $eventID)}});
            },
            error:function(data)
            {
                var errors = '';
                for(datos in data.responseJSON){
                    errors += data.responseJSON[datos] + '<br>';
                }
                
                $('#response').show().html(errors); //this is my div with messages
            }
        });
    });

    // add open text
    $('#setCompetitionOT').hide();
    $('#competitionOT').click(function(){
        
        $("#setCompetitionOT").toggle();
    });

    var i=1

    $('#submitOT').click(function() {
        if(!$('#Tquestion').val()) {
            $('#Tquestion').addClass('error');
            $('#Tqerr').show();
        }
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        $.ajax({
            url:baseUrl+"/public/event/"+$('#evID').val()+"/polls/2",
            method:"POST",
            data:$('#opentexts').serialize(),
            success:function(data)
            {
                //alert(data.success);
                $('#opentexts')[0].reset();
                $('#rating').modal('hide');
                $('#opentext').modal('hide');
                $('#createPoll').modal('hide');
                //window.location.replace({{route('poll.home', $eventID)}});
            },
            error:function(data)
            {
                var errors = '';
                for(datos in data.responseJSON) {
                    errors += data.responseJSON[datos] + '<br>';
                }
                //$('#response').show().html(errors); //this is my div with messages
            }
        });
    });

    // add word cloud
    $('#setCompetitionWC').hide();
    $('#competitionWC').click(function(){
        
        $("#setCompetitionWC").toggle();
    });
    var i=1
    $('#submitWC').click(function() {
        if(!$('#WCquestion').val()) {
            $('#WCquestion').addClass('error');
            $('#WCqerr').show();
        }

        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        $.ajax({
            url:baseUrl+"/public/event/"+$('#evID').val()+"/polls/3",
            method:"POST",
            data:$('#wordclouds').serialize(),
            success:function(data)
            {
                //alert(data.success);
                $('#wordclouds')[0].reset();
                $('#rating').modal('hide');
                $('#wordcloud').modal('hide');
                $('#createPoll').modal('hide');
                //window.location.replace({{route('poll.home', $eventID)}});
            },
            error:function(data)
            {
                var errors = '';
                for(datos in data.responseJSON) {
                    errors += data.responseJSON[datos] + '<br>';
                }
                //$('#response').show().html(errors); //this is my div with messages
            }
        });
    });

    // add rating
    $(function() {
        $('#range_demo').hide(); 
        $('#stars_demo').hide();
        $('#ratingType').change(function(){
            if($('#ratingType').val() == '1') {
                $('#stars_demo').show();
                $('#range_demo').hide();
            } else if($('#ratingType').val() == '2') {
                $('#range_demo').show();
                $('#stars_demo').hide();
            } else {
                $('#range_demo').hide();
                $('#stars_demo').hide();
            }
        });
    });

    $('#setCompetitionRT').hide();
    $('#competitionRT').click(function(){
        
        $("#setCompetitionRT").toggle();
    });
    var i=1
    $('#submitR').click(function() {
        if(!$('#Rquestion').val()) {
            $('#Rquestion').addClass('error');
            $('#Rqerr').show();
        }

        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        $.ajax({
            url:baseUrl+"/public/event/"+$('#evID').val()+"/polls/4",
            method:"POST",
            data:$('#ratings').serialize(),
            success:function(data)
            {
                //alert(data.success);
                $('#ratings')[0].reset();
                //window.location.replace({{route('poll.home', $eventID)}});
                //location.reload();
                $('#rating').modal('hide');
                $('#createPoll').modal('hide');
            },
            error:function(data)
            {
                var errors = '';
                for(datos in data.responseJSON) {
                    errors += data.responseJSON[datos] + '<br>';
                }
                $('#response').show().html(errors); //this is my div with messages
            }
        });
    });

    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
        if (e < onStar) {
            $(this).addClass('hover');
        } else {
            $(this).removeClass('hover');
        }
    });
    
    }).on('mouseout', function(){
        $(this).parent().children('li.star').each(function(e){
            $(this).removeClass('hover');
        });
    });

    /* 2. Action to perform on click */
    $('#stars li').on('click', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');
    
        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }
    
        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }

        // JUST RESPONSE (Not needed)
        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        var msg = "";
        if (ratingValue > 1) {
            msg = "Thanks! You rated this " + ratingValue + " stars.";
        } else {
            msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
        }
        responseMessage(msg);
    });
});

function responseMessage(msg) {
    $('.success-box').fadeIn(200);  
    $('.success-box div.text-message').html("<span>" + msg + "</span>");
}