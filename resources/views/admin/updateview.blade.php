<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.admincss')
</head>

<body>
    <div class="container-scroller">

        @include('admin.navbar')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Increase the column width to fit the form properly -->
                    <form id="foodForm" action="{{ url('/update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <!-- Use form-row class to ensure proper alignment -->
                            <div class="form-group col-md-6">
                                <!-- Adjust column width to fit two elements per row on larger screens -->
                                <label for="title">
                                    <h4>Title</h4>
                                </label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $data->title }}" style="background: #949399" required>
                            </div>
                            <div class="form-group col-md-6">
                                <!-- Adjust column width to fit two elements per row on larger screens -->
                                <label for="price">
                                    <h4>Price</h4>
                                </label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ $data->price }}" style="background: #949399" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">
                                <h4>Description</h4>
                            </label>
                            <textarea class="form-control" id="description" name="description" rows="6" style="background: #949399" required>{{ $data->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">
                                <h4>Select New Image</h4>
                            </label>
                            <input type="file" class="form-control-file" id="image" name="image" required>
                        </div>
                        <div class="form-group">
                            <label for="image">
                                <h4>Old Image</h4>
                            </label>
                            <img src="/foodimage/{{ $data->image }}" alt="" style="max-width: 300px;">
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

    </div>
    @include('admin.adminscript')
</body>

</html>
