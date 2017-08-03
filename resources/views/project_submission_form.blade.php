@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Project Submission</div>
                <div class="panel-body">
                    
                    @if (session('fail_status'))
                    <div class="alert alert-danger">
                        {{ session('fail_status') }}
                    </div>
                    @endif
                    
                    <!--project submission form--> 
                    
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('submit_project') }}" novalidate>
                        {{ csrf_field() }}
                        
                        <!--this hidden field for currently logged in user to get user-id to create project against current user-->
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        
                        <!--div for Project Name-->
                        <div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">
                            <label for="project_name" class="col-md-4 control-label">Project Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="project_name" value="{{ old('project_name') }}" placeholder="Enter project name" required autofocus autocomplete="off">

                                @if ($errors->has('project_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('project_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <!--end div for Project Name-->

                        <!-- div for project type -->
                        
                        <div class="form-group{{ $errors->has('project_type') ? ' has-error' : '' }}">
                            <label for="project_type" class="col-md-4 control-label">Project Type</label>

                            <div class="col-md-6">
                                <select class="form-control" name="project_type">
                                    <option value="Residential"  {{ old('project_type') == 'Residential' ? 'Selected':'' }}> Residential </option>
                                    <option value="Commercial" {{ old('project_type') == 'Commercial' ? 'Selected':''}}> Commercial </option>
                                    <option value="Other" {{ old('project_type') == 'Other' ? 'Selected':''}}> Other  </option>
                                </select>
                                @if ($errors->has('project_type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('project_type') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <!--end div for Project type-->
                        
                        <!--div for services-->
                        <div class="form-group{{ $errors->has('services') ? ' has-error' : '' }}">
                            <label for="services" class="col-md-4 control-label"> Services </label>
                              
                            <div class="col-md-6">
                              @foreach($services as $service)  
                              <input type="checkbox" name="services[]" value="{{$service}}"> {{ $service }} <br> 
                              @endforeach
                                @if ($errors->has('services'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('services') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <!--end div for services-->
                        
                        <!--div for comment-->

                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                            <label for="comment" class="col-md-4 control-label"> Comment </label>

                            <div class="col-md-6">
                                <textarea id="comment" class="form-control" name="comment" placeholder="Any additional comments?">{{ old('comment') }}</textarea>
                                @if ($errors->has('comment'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('comment') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <!--end div for comment-->
                        
                        <!--div Terms & Conditions--> 
                        
                        <div class="form-group{{ $errors->has('terms') ? ' has-error' : '' }}">
                            <label for="terms" class="col-md-4 control-label">Terms & Conditions</label>

                            <div class="col-md-6">
                                <input id="terms" type="checkbox" name="terms" required> I Agree with Terms & Conditions
                                
                                @if ($errors->has('terms'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('terms') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <!--end div Terms & Conditions--> 
                        <!--div Create Project button--> 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" >
                                    Create Project
                                </button>
                            </div>
                        </div>
                        
                        <!-- end div of Create Project button--> 
                    </form>  <!-- end form-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection