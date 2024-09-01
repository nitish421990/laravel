<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User List</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <!-- {{print_r($data)}} -->
        <h2>User List</h2>
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
       <form action="search" method="get" >
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="search" value={{@$search}} >
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <button button class="btn btn-default">Search</button>
                </div>
            </div>
        </div>
       </form>
        <a href="/add-user" class="btn btn-default pull-right">Add New User</a>
        <form method="post" action="multi-delete"> 
             @csrf 
            <button type="submit" class="btn btn-default pull-left">Delete Selected User</button>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Select</th>
                        <!-- <th>Id</th> -->
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $value)

                    <tr>
                        <td><input type="checkbox" name="ids[]" value="{{ $value->id }}"></td>
                        <!-- <td>{{ $loop->iteration}}</td> -->
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td> <a href="/edit-user/{{$value->id}}" class="btn btn-default">Edit</a> <a href="/delete-user/{{$value->id}}" class="btn btn-default">Delete</a></td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
            {{ $data->links('pagination::bootstrap-4') }}
        </form> 
    </div>

    <script src="" async defer></script>
</body>

</html>