<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @include('admin.admincss')
</head>

<body>
    <div class="container-scroller">

        @include('admin.navbar')
        <div class="container">
            <div class="row mt-5">
                <!-- Form -->
                <div class="col-lg-6">
                    <div class="container-scroller">
                        <form action="{{ url('/uploadchef') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    <h4>Name:</h4>
                                </label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name" required>
                            </div>

                            <div class="mb-3">
                                <label for="speciality" class="form-label">
                                    <h4>Speciality:</h4>
                                </label>
                                <input type="text" class="form-control" id="speciality" name="speciality"
                                    placeholder="Enter your speciality" required>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">
                                    <h4>Image:</h4>
                                </label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Table -->
                <div class="col-lg-6">
                    <div class="container-scroller">
                        <table class="table table-striped">
                            <!-- Table headers -->
                            <thead style="background-color: #02111D">
                                <tr>
                                    <th>Chef Name</th>
                                    <th>Speciality</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $chef)
                                    <tr>
                                        <td>{{ $chef->name }}</td>
                                        <td>{{ $chef->speciality }}</td>
                                        <td>
                                            <img src="{{ asset('chefimage/' . $chef->image) }}"
                                                alt="{{ $chef->name }}" style="max-width: 100px;">
                                        </td>
                                        <td>
                                            <!-- Add action buttons, e.g., Edit and Delete -->
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#deleteModal{{ $chef->id }}"><i
                                                    class="fas fa-trash"></i> Delete</button>
                                            <a href="{{ url('/updatechef/' . $chef->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i>
                                                Update</a>
                                        </td>
                                    </tr>

                                    <!-- Modal for delete confirmation -->
                                    <div class="modal fade" id="deleteModal{{ $chef->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="deleteModalLabel{{ $chef->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $chef->id }}">
                                                        Confirm Delete</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete {{ $chef->name }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                    <a href="{{ url('/deletechef/' . $chef->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('admin.adminscript')
</body>

</html>
