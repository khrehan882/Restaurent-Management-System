<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users Section</title>
</head>

<body>
    <x-app-layout>

    </x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        @include('admin.admincss')
    </head>

    <body>
        <div class="container-scroller">

            @include('admin.navbar')
            <div style="position:relative; top: 60px; right: -100px">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($data))
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->id !== 1)
                                            <button class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal{{ $item->id }}">
                                                <i class="fas fa-trash"></i> Delete</button>
                                        @else
                                            <button class="btn btn-danger" disabled><i class="fas fa-trash"></i>Delete</button>
                                        @endif
                                    </td>
                                </tr>
                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deleteModalLabel{{ $item->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Confirm
                                                    Deletion</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this user?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                @if ($item->id !== 1)
                                                    <a href="{{ url('/deleteuser', $item->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Delete Confirmation Modal -->
                            @endforeach
                        @endif
                    </tbody>

                </table>
            </div>


        </div>


        @include('admin.adminscript')
    </body>

    </html>

</body>

</html>
