@extends('layout')
@section('scripts')
        <script>

            $(document).ready(function() {
                var utc = new Date().toJSON().slice(0,10);
                var startTime,endTime;
                var start = true;

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title'
                    },
                    timezone: 'local',
                    dayClick: function(date, jsEvent, view) {
                        if(start){
                            startTime = date._d.toLocaleTimeString();
                            start=false;
                        }
                        else{
                            endTime = date._d.toLocaleTimeString();
                            start = true;
                        }
                        $('#register').modal();

                    },
                    defaultView: 'agendaWeek',
                    editable: true,
                    events: []

                });
                var modal = $('#register');
                $(modal).on('show.bs.modal', function (event) {
                    var modal = $(this);
                    modal.find('#start').val(startTime);
                    if(endTime!=undefined){
                        modal.find('#code').prop('required',true);
                        modal.find('#end').parent().show();
                        if(Date.parse('01/01/2011 '+startTime) > Date.parse('01/01/2011 '+endTime)){
                            modal.find('#end').parent().addClass('has-error');
                            $('span.error-time').show();
                        }
                        else{
                            modal.find('#end').parent().removeClass('has-error');
                            $('span.error-time').hide();
                        }
                        modal.find('#end').val(endTime);
                        endTime=undefined;
                        modal.find('button.submit').text('Confirm Details');
                    }
                    else{
                        modal.find('#end').parent().hide();
                        modal.find('button.submit').text('Choose end time');
                    }
                });
                $(modal).on('click','button.cancel', function () {
                    start=!start;
                });
                $(modal).on('click','button.submit', function () {
                    if($(this).text()=='Confirm Details'){
                        if(modal.find('#code').val()!=''){
                            $.ajax({
                                url: '/addCourse',//Make a route a type it here
                                data: {
                                    start: startTime,
                                    end: modal.find('#end').val(),
                                    course:modal.find('#code').val()
                                },
                                success: function(data) {
                                    //I'll work here
                                },
                                type: 'POST'
                            });
                            modal.modal('hide');
                        }
                    }
                    else{
                        modal.modal('hide');
                    }
                });

            });

        </script>
@endsection
@section('content')

    <div id="calendar"></div>
    <div class="modal fade" role="dialog" id="register">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Course Details</h4>
                </div>
                <form action="#!">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="code">Course Code</label>
                        <input type="text" class="form-control" id="code" placeholder="ABC123">
                    </div>
                    <div class="form-group">
                        <label for="start">Start Timings (Click to edit)</label>
                        <input type="text" class="form-control" id="start" placeholder="">
                    </div>
                    <div class="form-group" hidden>
                        <label for="end">End Timings (Click to edit)</label>
                        <input type="text" class="form-control" id="end" placeholder="">
                        <span class="error-time" hidden>Please correct the error</span>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger cancel" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary submit">Save changes</button>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection