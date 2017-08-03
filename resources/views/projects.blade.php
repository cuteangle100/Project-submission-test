@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Projects</div>
                @if (session('done_status'))
                <div class="alert alert-success">
                    {{ session('done_status') }}
                </div>
                @elseif(session('fail_status'))
                <div class="alert alert-danger">
                    {{ session('fail_status') }}
                </div> 
                @endif
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Sr# </th>
                                <th> Project Name </th>
                                <th> Project Type </th>
                                <th> Services </th>
                                <th> Comment </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 0)
                            @foreach($projects as $project)
                            <tr>
                                <td> @php($i++) {{$i}}</td>
                                <td> {{ $project->project_name }} </td>
                                <td> {{ $project->project_type }}</td>
                                <td> {{ $project->service }}</td>
                                <td> {{ $project->comment }}</td>
                                <td> <a href="javascript:void(0)" class="delete_confirm" title="Delete"> 
                                        <span class="glyphicon glyphicon-trash"></span> 
                                        <form action="{{ route('delete_project') }}" method="POST"> 
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{$project->id}}" name="id"> 
                                        </form>  
                                    </a> </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {

        $('.delete_confirm').click(function () {
            var form = $(this).find("form");
            bootbox.confirm("Are you sure want to delete?", function (result) {
                if (result) {
                    form.submit();
                }
            });
        });

    });
</script>

@endsection