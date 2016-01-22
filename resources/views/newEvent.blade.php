@extends('app.layout')
@section('title', 'New Event')
@section('stylesheet_pages')
        @include('app.styles_pages')
@endsection
@section('main')
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://apis.google.com/js/client:platform.js" async defer></script>
<script src="https://apis.google.com/js/client.js?onload=OnLoadCallback"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function() {
    $( "#datepicker" ).datepicker();
    });
    $(function() {
    $( "#eventDateI" ).datepicker();
    });
    $(function() {
    $( "#eventDateF" ).datepicker();
    });
</script>  

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        New Event
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active">New Event</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Create Event</h3>
                                </div>
                                <div class="box-body">
                                    <!--action="createEvent"-->
                        <form id="nuevoEvento" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!-- Event Title -->
                                <div class="form-group">
                                    <label>Title</label>
                                    <div class="input-group">
                                         <div class="input-group-addon">
                                                <i class="fa fa-tasks"></i>
                                         </div>
                                         <input id="eventTittle" name="event_title" type="text" class="form-control" placeholder="Event Title" required>
                                    </div>
                                </div>
                                <!-- Event Description -->
                                <div class="form-group">
                                     <label>Description</label>
                                     <div class="input-group">
                                          <div class="input-group-addon">
                                               <i class="fa fa-align-justify"></i>
                                          </div>
                                          <textarea id="eventDescription" name="event_description" class="form-control" rows="3" placeholder="Description ..." required></textarea>
                                     </div>
                                </div>
                                <!--Location-->
                                <div class="form-group">
                                    <label>Location</label>                                    
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                                <i class="fa fa-search"></i>
                                         </div>
                                        <input id="autocomplete" class="form-control" placeholder="Enter your address" type="text" required></input>
                                    </div>                                   
                                </div>
                                <!--Groups by combo box-->
                                <div class="form-group">
                                    <label>Groups</label>
                                    <select name="combo" class="form-control">                                
                                        @if ( count( $grupos[ 0 ] )  == 0 && count( $grupos[ 1 ] ) == 0 )
                                            <option value="NG">No groups :-(</option>
                                        @endif
                                        @if ( count( $grupos[ 0 ] ) > 0 )
                                            <option value="CG">-Choose one group-</option>
                                            @foreach ( $grupos[ 0 ] as $grupo )
                                               <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                                            @endforeach
                                            
                                        @endif
                                        @if ( count( $grupos[ 1 ] ) > 0 )
                                            <option value="CG">-Choose one group-</option>
                                            @foreach ( $grupos[ 1 ] as $grupo )
                                               <option value="{{ $grupo->id }}">{{ $grupo->name }}</option>
                                            @endforeach
                                        @endif                                        
                                    </select>

                                </div>
                                <!-- Event Date -->
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <div class='input-group date' id='datetimepickerinicio'>
                                         <input data-format="dd-MM-yyyy hh:mm:ss" type='text' name="fechaInicio" id="fechaInicio" class="form-control" required/>
                                    <span class="input-group-addon">
                                          <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                    </div>
                                </div>
                                <!-- Event Date -->
                                <div class="form-group">
                                    <label>End Date</label>
                                    <div class='input-group date' id='datetimepickerfin'>
                                            <input data-format="dd-MM-yyyy hh:mm:ss" type='text' name="fechaFin" id="fechaFin" class="form-control" required/>
                                             <span class="input-group-addon">
                                                 <span class="glyphicon glyphicon-calendar"></span>
                                             </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="btnCreateEvents" class="btn btn-primary" >Create Events</button>
                                </div>
                        </form>
                                
                                <div class="form-group">
                                         <button type="button" id="authorize-button" style="visibility: hidden" class="btn btn-primary">Authorize</button>
                                </div>                                
                        {{--<button id="btnCreateEvents" class="btn btn-primary" onclick="makeApiCall();">
                                        Create Events</button>
                                    <button id="btnDeleteEvents" class="btn btn-primary" onclick="deleteEvent();">
                                        Delete Events</button>--}}
                                </div><!-- /.box-body -->
                            </div>
                        </div><!-- /.col -->
                        <!-- CALENDARIO RESPONSIVE -->
                        <div class="col-md-9">
                            <div class="box box-primary">
                                <div class="box-body no-padding">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /. box -->
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

@endsection

@section('scripts')
        @include('app.scripts_pages')              
        <script src="{{ asset('js/calendarNewEvent.js') }}" type="text/javascript"></script>
        <script src="https://apis.google.com/js/client.js?onload=handleClientLoad" type="text/javascript"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCJpcHQH2zFckykgY9BTaiaMZ9nJSKnzbI&amp;signed_in=true&amp;libraries=places&amp;callback=initAutocomplete"
        async defer></script>
        <script src="{{ asset('js/locationEvent.js') }}"></script>
@endsection