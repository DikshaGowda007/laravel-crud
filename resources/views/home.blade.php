<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel CRUD</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    @if(session('success'))
    <div class="alert alert-success bg-success mx-5 my-3">
        {{ session('success') }}
    </div> 
    @endif
<body>
    @if(session('error'))
    <div class="alert alert-error bg-danger mx-5 my-3">
        {{ session('error') }}
    </div> 
    @endif
    <div class="container-fluid mt-4 p-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->city }}</td>
                    <td>
                        <button type="button" class="btn btn-primary edit-button" data-toggle="modal"
                            data-target="#exampleModal{{ $user->user_id }}"
                            data-id="{{ $user->user_id }}"
                            data-name="{{ $user->name }}"
                            data-email="{{ $user->email }}"
                            data-age="{{ $user->age }}"
                            data-phone="{{ $user->phone }}"
                            data-city="{{ $user->city }}">
                            Edit
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $user->user_id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('update', $user->user_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name{{ $user->user_id }}" name="name" value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email{{ $user->user_id }}" name="email" value="{{ $user->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="age">Age:</label>
                                        <input type="number" class="form-control" id="age{{ $user->user_id }}" name="age" value="{{ $user->age }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="text" class="form-control" id="phone{{ $user->user_id }}" name="phone" value="{{ $user->phone }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="city">City:</label>
                                        <input type="text" class="form-control" id="city{{ $user->user_id }}" name="city" value="{{ $user->city }}">
                                    </div>

                                    <div class="modal-footer">

                                        <!-- <button type="button" class="btnbtn-secondary" data-dismiss="modal">Close</button> -->

                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
