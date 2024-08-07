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
            <div class="row justify-content-center ">
                <div style="top: 20px" class="col-md-6">
                    <form id="foodForm" action="{{ url('/uploadfood') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">
                                <h4>Title:</h4>
                            </label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Enter title" style="background: #949399" required>
                        </div>
                        <div class="form-group">
                            <label for="price">
                                <h4>Price:</h4>
                            </label>
                            <input type="number" class="form-control" id="price" name="price"
                                placeholder="Enter price" style="background: #949399" required>
                        </div>
                        <div class="form-group">
                            <label for="image">
                                <h4>Image:</h4>
                            </label>
                            <input type="file" class="form-control-file" id="image" name="image" required>
                        </div>
                        <div class="form-group">
                            <label for="description">
                                <h4>Description:</h4>
                            </label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"
                                style="background: #949399" required></textarea>
                        </div>
                        <button type="submit" value="save" class="btn btn-primary">Submit</button>
                    </form>
                    <!-- Rest of your code... -->
                </div>
            </div>
        </div>

        <script>
            // JavaScript validation for the form
            document.getElementById("foodForm").addEventListener("submit", function(event) {
                const title = document.getElementById("title").value;
                const price = document.getElementById("price").value;
                const image = document.getElementById("image").value;
                const description = document.getElementById("description").value;

                if (!title || !price || !image || !description) {
                    event.preventDefault();
                    alert("Please fill in all the required fields.");
                }
            });
        </script>

        <div style="position:relative; top: 20px; right: 90px">
            <table class="table table-striped">
                <thead style="background-color: #02111D">
                    <tr>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                        <th>Action 2</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Table rows with data -->
                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->price }}</td>
                            <td>{{ $data->description }}</td>
                            <td><img src="/foodimage/{{ $data->image }}"></td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteModal{{ $data->id }}">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                            <td>
                                <a href="{{ url('/updateview', $data->id) }}" class="btn btn-primary">
                                    <i class="fas fa-pencil-alt"></i> Update
                                </a>
                            </td>
                        </tr>
                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="deleteModalLabel{{ $data->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $data->id }}">Confirm
                                            Deletion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this item?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <a href="{{ url('/deletemenu', $data->id) }}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Delete Confirmation Modal -->
                    @endforeach
                </tbody>
            </table>



        </div>
    </div>
    </div>

    </div>
    @include('admin.adminscript')
</body>

</html>
