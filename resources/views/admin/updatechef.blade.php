<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <base href="/public">
    @include('admin.admincss')
</head>

<body>
    <div class="container-scroller">

        @include('admin.navbar')
        <div class="container">
            <div class="row justify-content-center">
                <div style="top: 20px" class="col-md-8">

                    <form action="{{ url('/updatechef/' . $data->id) }}" method="post" enctype="multipart/form-data"
                        class="custom-form">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                <h4>Chef Name:</h4>
                            </label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $data->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="speciality" class="form-label">
                                <h4>Speciality:</h4>
                            </label>
                            <input type="text" class="form-control" id="speciality" name="speciality"
                                value="{{ $data->speciality }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="old_image" class="form-label">
                                <h4>Old Image:</h4>
                            </label>
                            <img src="{{ asset('chefimage/' . $data->image) }}" alt=""
                                style="max-width: 300px;">
                        </div>

                        <div class="mb-3">
                            <label for="new_image" class="form-label">
                                <h4>New Image:</h4>
                            </label>
                            <input type="file" class="form-control" id="new_image" name="new_image">
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Update
                            Chef</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
    @include('admin.adminscript')
</body>

</html>
