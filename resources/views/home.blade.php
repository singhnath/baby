@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-8">
                            <form action="" method="post">
                             <input type="text" name="url" placeholder="www.google.com">
                                @csrf
                                <input type="submit" value="submit">
                            </form>
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>URL</th>
                                <th>IP Address</th>
                            </tr>
                        </thead>
                        <tbody>

                           @foreach($websites as $website)
                            <tr>
                                <td>{{$website->id}}</td>
                                <td>{{$website->url}}</td>
                                <td>{{$website->ip}}</td>
                            </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>URL</th>
                                <th>IP Address</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endsection
