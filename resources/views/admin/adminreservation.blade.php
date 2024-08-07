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
        <div class="container mt-5">
            <table class="table table-bordered">

                <thead style="background-color: #02111D">
                    <tr>
                        <th>Name</th>
                        <th>Email ID</th>
                        <th>Phone</th>
                        <th>Guests</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Message</th>
                        <th>Action</th> <!-- Add a new column for the delete button -->
                    </tr>
                </thead>
                <!-- Table headers -->
                <tbody>
                    @foreach ($data as $reservation)
                        <tr>
                            <!-- Reservation data cells -->
                            <td>{{ $reservation->name }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>{{ $reservation->phone }}</td>
                            <td>{{ $reservation->guest }}</td>
                            <td>{{ $reservation->date }}</td>
                            <td>{{ $reservation->time }}</td>
                            <td>{{ $reservation->message }}</td>
                            <td>
                                <!-- Add the delete button with a Bootstrap icon -->
                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#deleteModal{{ $reservation->id }}">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>

                        <!-- Modal for delete confirmation -->
                        <div class="modal fade" id="deleteModal{{ $reservation->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="deleteModalLabel{{ $reservation->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $reservation->id }}">Confirm
                                            Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this reservation?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <!-- Use a form to submit the delete request -->
                                        <form action="{{ url('/deleteReservation/' . $reservation->id) }}"
                                            method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>


        </div>

    </div>
    @include('admin.adminscript')
</body>

</html>
