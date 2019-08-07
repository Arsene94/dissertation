$(document).ready(function() {
    // Add teams

    var i=1;
    $('#addT').click(function(){
        i++;
        $('.teams').append('<div class="form-group" id="fg'+i+'"><input style="display:inline-block;" type="text" name="team[]" placeholder="Team name" class="form-control form-control2" id="team'+i+'" /> <a name="remove" id="'+i+'" class="btn_remove" style="margin-top:-5px; cursor: pointer;"><i class="fas fa-trash-alt"></i></a><br /><span id="aerr'+i+'" class="text-danger" style="display: none;">Cant be empty</span></div>');
        
    });
    
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#fg'+button_id+'').remove();
    });

    $('#submitTE').click(function(){
        if(!$('#team1').val()) {
            $('#team1').addClass('error');
            $('#Terr1').show();
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
            
            url:baseUrl+"/public/event/createTeam",
            method:"POST",
            data:$('#teamEv').serialize(),
            success:function(data)
            {
                //alert(data.success);
                $('#teamEv')[0].reset();
                $('#createTeamEvent').modal('hide');
                //window.location.replace({{route('poll.home', $eventID)}});
            },
            error:function(data)
            {
                var errors = '';
                for(datos in data.responseJSON){
                    errors += data.responseJSON[datos] + '<br>';
                }
                
                $('#responsessss').show().html(errors); //this is my div with messages
            }
        });
    });
});