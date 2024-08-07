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

        <div class="container mt-4 mx-4">
            <form style="max-width: 400px;" class="mx-auto my-4" action="{{url('/search')}}" method="GET" class="mb-4">
                @csrf
              <div class="input-group">
                <input style="color: white; opacity: 1;" type="text" class="form-control" name="search" placeholder="Search by Name or Foodname">
                <div class="input-group-append">
                  <button class="btn btn-primary" value="search" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                </div>
              </div>
            </form>

            <table class="table table-bordered">
              <thead style="background-color: #02111D">
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Foodname</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($data as $data)
                <tr>
                  <td>{{$data->name}}</td>
                  <td>{{$data->phone}}</td>
                  <td>{{$data->address}}</td>
                  <td>{{$data->foodname}}</td>
                  <td>Rs.{{$data->price}}</td>
                  <td>{{$data->quantity}}</td>
                  <td> Rs.{{$data->price * $data->quantity}}</td>

                  <td>
                    <a href="{{ url('/deleteorders', $data->id) }}" type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#deleteModal{{ $data->id }}">
                        <i class="fas fa-trash"></i> Delete
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
                <p>Are you sure you want to delete this Entry?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Cancel</button>
                <a href="{{ url('/deleteorders', $data->id) }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- End Delete Confirmation Modal -->

                <!-- Add more rows as needed -->
                @endforeach
              </tbody>
            </table>
          </div>

    </div>
    @include('admin.adminscript')
</body>

</html>
