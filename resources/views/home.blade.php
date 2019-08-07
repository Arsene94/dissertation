@extends('template.app')

@section('title')
Dashboard
@endsection

@section('css')
<style>
    .error{ color:red; } 
</style>
@endsection

@section('js')

@endsection

@section('content')
<!-- Start Header Section -->
<div class="page-header">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>{{ Auth::user()->email }} - You are logged in!</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Section -->
<section id="dashboard" class="sign">
    <div class="container">
        <div class="card-body">
            @if (Session::get('success'))
                <div class="alert alert-success alert-block" style="width: 98%">
                    {{Session::get('success')}}
                </div>
            @endif
            <!-- Start Events -->
            <div id="events" class="tab-content current">
                <div class="create-event">
                    <a data-toggle="modal" data-target="#createEvent" class="btn btn-success">Create event</a>
                </div>
                
                <div class="modal fade" id="createEvent" tabindex="-1" role="dialog" aria-labelledby="CreateEvent" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Create an event</h5>
                            </div>
                            <div class="modal-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <form id="formCreateEvent" method="post" action="javascript:void(0)">
                                    @csrf
                                    <input type="hidden" name="createdBy" id="createdBy" value="{{ Auth::user()->id }}">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="eventName" name="eventName" aria-describedby="question" placeholder="Event name">
                                        <br /><!--<small id="question" class="form-text text-muted">Error</small>-->
                                        <span class="text-danger">{{ $errors->first('eventName') }}</span>
                                    </div>

                                    <div class="form-group">
                                        <div class="date">
                                            <label for="startDate">Start date</label>
                                            <input type="date" class="form-control" name="startDate" id="startDate">
                                            <span class="text-danger">{{ $errors->first('startDate') }}</span>
                                        </div>
                                        <div class="date">
                                            <label for="startDate">End date</label>
                                            <input type="date" class="form-control" name="endDate" id="endDate">
                                            <span class="text-danger">{{ $errors->first('endDate') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="eventCode">Session Code</label>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">#</div>
                                        </div>
                                        <input type="text" class="form-control" name="eventCode" id="eventCode" placeholder="eventCode" value="{{$eventCodes}}">
                                        <span class="text-danger">{{ $errors->first('eventCode') }}</span>
                                    </div>

                                    

                                    <div class="alert alert-success d-none" id="msg_div">
                                        <span id="res_message"></span>
                                    </div>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" id="createEv" class="btn btn-primary">Create event</button>
                                        <!-- <input type="submit"> -->
                                    </div>
                                </form>
                                <script>
                                    $(document).ready(function(){
                                        
                                if ($("#formCreateEvent").length > 0) {

                                    $("#formCreateEvent").validate({
                                        rules: {
                                                eventName: {
                                                    required: true,
                                                    maxlength: 50
                                                },
                                                eventCode: {
                                                    required: true,
                                                    maxlength: 10,
                                                },
                                            },
                                        
                                            messages: {
                                                eventName: {
                                                    required: "Please enter the event name",
                                                    maxlength: "The event name maxlength should be 50 characters long."
                                                },
                                                eventCode: {
                                                    required: "Please enter the event code",
                                                    maxlength: "The event code should be less than or equal to 10 characters",
                                                },
                                            },
                                            submitHandler: function(form) {
                                                $.ajaxSetup({
                                                    headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                    }
                                                });
                                            $('#createEv').html('Adding..');
                                            $.ajax({
                                                url: "{{route('event.create')}}",
                                                type: "POST",
                                                data: $('#formCreateEvent').serialize(),
                                                success: function( response ) {
                                                    $('#createEv').html('Submit');
                                                    $('#res_message').show();
                                                    $('#res_message').html(response.msg);
                                                    $('#msg_div').removeClass('d-none');
                                            
                                                    document.getElementById("formCreateEvent").reset(); 
                                                    $('#createEvent').modal('hide');
                                                    setTimeout(function(){
                                                        $('#res_message').hide();
                                                        $('#msg_div').hide();
                                                    },10000);
                                                }
                                            });
                                        }
                                    })
                                }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="createTeamEvent" tabindex="-1" role="dialog" aria-labelledby="createTeamEvent" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createTeams">Create teams</h5>
                            </div>
                            <div class="modal-body">
                                <script>
                                    $( "#mod" ).click(function() {
                                        
                                        var mid = $( "#mod" ).data( "id" );
                                        $('#da').html('<input type="hidden" name="eid" id="eid" value="'+mid+'">');
                                    });
                                </script>
                                <form name="teamEv" id="teamEv">
                                    @csrf
                                    <div class="form-group" id="da">
                                        
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control2" name="membersNumber" id="membersNumber" placeholder="Members per team" >
                                    </div>

                                    <div class="form-group">
                                        <input style="display: inline-block;" type="text" class="form-control form-control2" id="team1" name="team[]" aria-describedby="team[]" placeholder="Team name"> <br />
                                        <span id="Terr1" class="text-danger" style="display: none;">Can't be empty</span>
                                    </div>

                                    <div class="teams"></div>
                                    <button type="button" name="addT" id="addT" class="btn btn-success">Add more team</button><br />
                                    <div class="modal-footer">
                                        <button type="button" name="submitTE" id="submitTE" class="btn btn-info">Create teams</button>
                                    </div>
                                    <div id="responsessss"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <table id='userEvents' class="table-hovers">
                    <tbody>
                    </tbody>
                </table>

                <script type='text/javascript'>
                fetchRecords();
                function fetchRecords() {
                    $.ajax({
                        url: "{{route('fetch.events', Auth::id())}}",
                        type: 'get',
                        dataType: 'json',
                        success: function(response){
                            var len = 0;
                            $('#userEvents tbody').empty(); // Empty <tbody>
                            if(response['data'] != null) {
                                len = response['data'].length;
                            }
    
                            if(len > 0) {
                                for(var i=0; i<len; i++) {
                                    var pollID = response['data'][i].id;
                                    var eventName = response['data'][i].eventName;
                                    var eventCode = response['data'][i].eventCode;

                                    var tr_str = "<tr>" +
                                        "<td>" + eventName + " #" + eventCode + "<br /><div class='date'></div></td>" +
                                        "<td class='right'><a id='mod' href='{{ url('/') }}/event/" + pollID + "/polls'><i class='fas fa-home'></i></a> <a  data-toggle='modal' data-target='#createTeamEvent' data-id='"+pollID+"'><i class='fas fa-user-friends'></i></a> <a href='{{ url('/') }}/event/" + pollID + "/delete'><i class='fas fa-trash-alt'></i></a></td>" +
                                    "</tr>";
                                    $("#userEvents tbody").append(tr_str);
                                }
                            } else if(response['data'] != null) {
                                if(!response['data'].id)
                                    $("#userEvents tbody").append("<tr><td align='center' colspan='4'>No record found</td></tr>");
                                else {
                                    var tr_str = "<tr>" +
                                        "<td>" + response['data'][i].eventName + " #" + response['data'][i].eventCode + "<br /><div class='date'></div></td>" +
                                        "<td class='right'><a href='{{ url('/') }}/event/" + response['data'][i].id + "/polls'><i class='fas fa-home'></i></a> <a  data-toggle='modal' data-target='#createTeamEvent'><i class='fas fa-user-friends'></i></a> <a href='{{ url('/') }}/event/" + response['data'][i].id + "/delete'><i class='fas fa-trash-alt'></i></a></td>" +
                                    "</tr>";
                                    $("#userEvents tbody").append(tr_str);
                                }
                            } else {
                                var tr_str = "<tr>" +
                                    "<td align='center' colspan='4'>No record found.</td>" +
                                "</tr>";
                                $("#userEvents tbody").append(tr_str);
                            }
                        }
                    });
                    setTimeout(fetchRecords, 1000);
                }
                </script>
            </div>
            <!-- End Events -->

            <!-- Start Analytics -->
            <div id="analytics" class="tab-content">
                <p>Analytics Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula elementum ut luctus lorem facilisis. Sed non leo nisl, ac euismod nisi. Aenean augue dolor, facilisis id fringilla ut, tempus vitae nibh.</p>
            </div>
            <!-- End Analytics -->
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="{{ url('/') }}/js/events.js"></script>
@endsection
