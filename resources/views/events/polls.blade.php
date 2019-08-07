@extends('template.app')

@section('title')
Polls
@endsection

@section('content')
    <!-- Start Header Section -->
    <div class="page-header">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>{{ Auth::user()->email }} - Event name: <strong>{{$eventName}}</strong></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Section -->
    <section id="event" class="sign">
        
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            .error {
                border-color: #dc3545;
            }
        </style>

        <div class="container">
            <div class="card-body">
                @if (Session::get('success'))
                    <div class="alert alert-success alert-block" style="width: 98%">
                        {{Session::get('success')}}
                    </div>
                @endif

                <!-- Start Modals -->
                <div id="polls" class="tab-content current">
                    <div class="create-event">
                        <a data-toggle="modal" data-target="#createPoll" class="btn btn-success">Create poll</a>
                    </div>
                    
                    <table id='userPolls' class="table-hovers">
                        <tbody>

                        </tbody>
                    </table>
                    {{ csrf_field() }}
                    
                    <script type='text/javascript'>
                        fetchRecords();
                        var pollID;
                        function fetchRecords(){
                          $.ajax({
                            url: "{{route('fetch.polls', $eventID)}}",
                            type: 'get',
                            dataType: 'json',
                            success: function(response){
                              var len = 0;
                              $('#userPolls tbody').empty(); // Empty <tbody>
                              if(response['data'] != null){
                                len = response['data'].length;
                              }
                   
                              if(len > 0){
                                for(var i=0; i<len; i++){
                                  pollID = response['data'][i].id;
                                  var pollQuestion = response['data'][i].pollQuestion;
                                  var pollType = response['data'][i].pollType;
                                  var eventID = response['data'][i].eventID;
                                  var startPoll = response['data'][i].startPoll;
                                  var liveAnswers = response['data'][i].liveAnswers;
                                  var polltyp;
                                  if(pollType == 1) {polltyp = 'Multiple Choice'; editLink = "";
                                  } else if(pollType == 2) { polltyp = 'Open Text'; editLink = "";
                                  } else if(pollType == 3) {polltyp = 'Word Cloud'; editLink = "";
                                  } else if(pollType == 4) {polltyp = 'Rating'; editLink = "";}

                                  if(startPoll == 0) var starPol = "<i class='fas fa-play-circle'></i>";
                                  else if(startPoll == 1) var starPol = "<i class='fas fa-stop-circle'></i>";

                                  if(liveAnswers == 0) var livAns = "<i class='fas fa-eye'></i>";
                                  else if(liveAnswers == 1) var livAns = "<i class='fas fa-eye-slash'></i>";

                                  var tr_str = "<tr>" +
                                      "<td>" + pollQuestion + "<br /><div class='date'>"+polltyp+"</div></td>" +
                                      "<td class='right'><a href='#'><i class='fas fa-home'></i></a> "+editLink+" <a href='/dissertation/public/event/"+eventID+"/polls/"+pollID+"/updateLiveAns'>"+livAns+"</a> <a href='/dissertation/public/event/"+eventID+"/polls/"+pollID+"/startPoll'>"+starPol+"</a> <a href='/dissertation/public/event/"+eventID+"/poll/"+pollID+"/delete'><i class='fas fa-trash-alt'></i></a></td>" +
                                  "</tr>";
                   
                                  $("#userPolls tbody").append(tr_str);
                                }
                              }else if(response['data'] != null){
                                if(response['data'].pollType == 1) polltyp = 'Multiple Choice';
                                  else if(response['data'].pollType == 2) polltyp = 'Open Text';
                                  else if(response['data'].pollType == 3) polltyp = 'Word Cloud';
                                  else if(response['data'].pollType == 4) {polltyp = 'Rating'; editLink = "";}

                                  if(response['data'].startPoll == 0) var starPol = "<i class='fas fa-play-circle'></i>";
                                  else if(response['data'].startPoll == 1) var starPol = "<i class='fas fa-stop-circle'></i>";

                                  if(response['data'].liveAnswers == 0) var livAns = "<i class='fas fa-eye'></i>";
                                  else if(response['data'].liveAnswers == 1) var livAns = "<i class='fas fa-eye-slash'></i>";

                                  if(!response['data'].id)
                                    $("#userPolls tbody").append("<tr><td align='center' colspan='4'>No record found</td></tr>");
                                    else {
                                 var tr_str = "<tr>" +
                                     "<td>" + response['data'].pollQuestion + "<br /><div class='date'>"+polltyp+"</div></td>" +
                                      "<td class='right'><a href='#'><i class='fas fa-home'></i></a> "+editLink+" <a href='/dissertation/public/event/"+response['data'].eventID+"/polls/"+response['data'].pollID+"/updateLiveAns'>"+livAns+"</a> <a =href='/dissertation/public/event/"+response['data'].eventID+"/polls/"+response['data'].pollID+"/startPoll'>"+starPol+"</a> <a href='{{route('poll.delete', ["+response['data'].eventID+", "+response['data'].id+"])}}'><i class='fas fa-trash-alt'></i></a></td>" +
                                  "</tr>";
                   
                                 $("#userPolls tbody").append(tr_str);
                                    }
                              }else{
                                 var tr_str = "<tr>" +
                                     "<td align='center' colspan='4'>No record found.</td>" +
                                 "</tr>";
                              
                                 $("#userPolls tbody").append(tr_str);
                              }
                            }
                          });
                          setTimeout(fetchRecords, 1000);
                        }
                        var _token = $('input[name="_token"]').val();
                       function onClick() {
                           alert('dada');
                           var getUrl = window.location;
                            var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
                                //url:baseUrl+"/public/event/polls/"+pollID+"/updateLiveAns",
                            $.ajax({
                                url:baseUrl+"/public/event/polls/updateLiveAns",
                                method:"POST",
                                data:{id:pollID, _token:_token},
                                success:function(data)
                                {
                                $('#message').html(data);

                                }
                            });
                        }

                        </script>

                    <div class="modal fade" id="createPoll" tabindex="-1" role="dialog" aria-labelledby="createPoll" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Create a poll</h5>
                                </div>

                                <div class="modal-body">
                                    <a data-toggle="modal" data-target="#multiplechoice" class="btn btn-primary"><i class="fas fa-align-left"></i> Multiple choice</a>
                                    <a data-toggle="modal" data-target="#opentext" class="btn btn-primary"><i class="fas fa-comment-alt"></i> Open text</a>
                                    <a data-toggle="modal" data-target="#wordcloud" class="btn btn-primary"><i class="fas fa-cloud"></i> Word cloud</a>
                                    <a data-toggle="modal" data-target="#rating" class="btn btn-primary"><i class="fas fa-star-half-alt"></i> Rating</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="multiplechoice" tabindex="-1" role="dialog" aria-labelledby="multiplechoice" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="multiChoice">Create a multiple choice poll</h5>
                            </div>
                            <div class="modal-body">
                                <form name="multichoices" id="multichoices">
                                    @csrf
                                    <input type="hidden" name="pollType" id="pollType" value="1">
                                    <input type="hidden" name="evID" id="evID" value="{{$eventID}}">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="MCquestion" name="MCquestion" aria-describedby="question" placeholder="What would you like to ask?" size="10">
                                        <span id="MCqerr" class="text-danger" style="display: none;">Can't be empty</span>
                                    </div>
                    
                                    <div class="form-group">
                                            <input style="display: inline-block;" type="text" class="form-control form-control2" id="answer1" name="answer[]" aria-describedby="answer[]" placeholder="Option"> <input type="checkbox" class="form-check-input cr" name="correct-answer[]" id="correct-answer" value="1">
                                            <label class="form-check-label" for="correct-answer"> Correct answer</label><br />
                                            <span id="aerr1" class="text-danger" style="display: none;">Can't be empty</span>
                                    </div>

                                    <div class="form-group">
                                        <input type="checkbox" class="form-check-input" name="competitionMC" id="competitionMC" value="1"> <label class="form-check-label lab" for="competitionMC">Set competition</label>
                                        <div id="setCompetitionMC">
                                            <div class="date">
                                                <input type="text" class="form-control" name="compTimeMC" id="compTimeMC" placeholder="Set competition time in seconds">
                                            </div>
                                            <div class="date">
                                                <input type="text" class="form-control" name="compPctsMC" id="compPctsMC" placeholder="Set points per answer">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="wrap"></div>
                                    <button type="button" name="add" id="add" class="btn btn-success">Add More</button><br />
                                    <div class="modal-footer">
                                        <button type="button" name="submitMC" id="submitMC" class="btn btn-info">Create</button>
                                    </div>
                                    <div id="response" style="display: hidden;"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="opentext" tabindex="-1" role="dialog" aria-labelledby="opentext" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="openText">Create an open text poll</h5>
                            </div>
                            <div class="modal-body">
                                <form name="opentexts" id="opentexts">
                                    @csrf
                                    <input type="hidden" name="pollType" id="pollType" value="2">
                                    <input type="hidden" name="evID" id="evID" value="{{$eventID}}">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="Tquestion" name="Tquestion" aria-describedby="question" placeholder="What would you like to ask?" size="10">
                                        <span id="Tqerr" class="text-danger" style="display: none;">Can't be empty</span>
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" class="form-check-input" name="competitionOT" id="competitionOT" value="1"> <label class="form-check-label lab" for="competitionOT">Set competition</label>
                                        <div id="setCompetitionOT">
                                            <div class="date">
                                                <input type="text" class="form-control" name="compTimeOT" id="compTimeOT" placeholder="Set competition time in seconds">
                                            </div>
                                            <div class="date">
                                                <input type="text" class="form-control" name="compPctsOT" id="compPctsOT" placeholder="Set points per answer">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" name="submitOT" id="submitOT" class="btn btn-info">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="wordcloud" tabindex="-1" role="dialog" aria-labelledby="wordcloud" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Create a word cloud poll</h5>
                            </div>
                            <div class="modal-body">
                                <form name="wordclouds" id="wordclouds">
                                    @csrf
                                    <input type="hidden" name="pollType" id="pollType" value="3">
                                    <input type="hidden" name="evID" id="evID" value="{{$eventID}}">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="WCquestion" name="WCquestion" aria-describedby="question" placeholder="What would you like to ask?" size="10">
                                        <span id="WCqerr" class="text-danger" style="display: none;">Can't be empty</span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="checkbox" class="form-check-input" name="competitionWC" id="competitionWC" value="1"> <label class="form-check-label lab" for="competitionWC">Set competition</label>
                                        <div id="setCompetitionWC">
                                            <div class="date">
                                                <input type="text" class="form-control" name="compTimeWC" id="compTimeWC" placeholder="Set competition time in seconds">
                                            </div>
                                            <div class="date">
                                                <input type="text" class="form-control" name="compPctsWC" id="compPctsWC" placeholder="Set points per answer">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" name="submitWC" id="submitWC" class="btn btn-info">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <div class="modal fade" id="rating" tabindex="-1" role="dialog" aria-labelledby="rating" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ratingPollTitle">Create a rating poll</h5>
                            </div>
                            <div class="modal-body">
                                <form name="ratings" id="ratings">
                                    @csrf
                                    <input type="hidden" name="pollType" id="pollType" value="4">
                                    <input type="hidden" name="evID" id="evID" value="{{$eventID}}">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="Rquestion" name="Rquestion" aria-describedby="question" placeholder="What would you like to ask?" size="10">
                                        <span id="Rqerr" class="text-danger" style="display: none;">Can't be empty</span>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" name="ratingType" id="ratingType">
                                            <option selected></option>
                                            <option value="1">Stars</option>
                                            <option value="2">Range</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <div id="range_demo">
                                            <label class="form-check-label">Demo</label>
                                            <div class="slidecontainer">
                                                <input type="range" min="0" max="100" value="50" class="slider" id="myRange">
                                                <p>Value: <span id="demo"></span></p>
                                            </div>
                                        </div>

                                        <div id="stars_demo">
                                            <label class="form-check-label">Demo</label>
                                            <div class="my-rating"></div>
                                            <span class="live-rating">0 stars</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="checkbox" class="form-check-input" name="competitionRT" id="competitionRT" value="1"> <label class="form-check-label lab" for="competitionRT">Set competition</label>
                                        <div id="setCompetitionRT">
                                            <div class="date">
                                                <input type="text" class="form-control" name="compTimeRT" id="compTimeRT" placeholder="Set competition time in seconds">
                                            </div>
                                            <div class="date">
                                                <input type="text" class="form-control" name="compPctsRT" id="compPctsRT" placeholder="Set points per answer">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" name="submitR" id="submitR" class="btn btn-info">Create</button>
                                    </div>
                                </form>
                                <script>
                                    var slider = document.getElementById("myRange");
                                    var output = document.getElementById("demo");
                                    output.innerHTML = slider.value;
                                    
                                    slider.oninput = function() {
                                        output.innerHTML = this.value;
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="poll_analytics" class="tab-content">
                    pool analytics
                </div>
            </div>
        </div>
    </section>
    <script>
            $(".my-rating").starRating({
            strokeColor: '#894A00',
            strokeWidth: 10,
            starSize: 25,
            onHover: function(currentIndex, currentRating, $el){
                $('.live-rating').text(currentIndex+" stars");
            },
            onLeave: function(currentIndex, currentRating, $el){
                $('.live-rating').text(currentRating+ " stars");
            }
        });
        </script>
@endsection

@section('scripts')
<script src="{{ url('/') }}/js/polls.js"></script>
@endsection