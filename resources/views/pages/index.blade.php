<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jabu Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</head>

<body>

    <div class="container">

        <div class="row p-5">
            <div class="col-md-6 mx-auto">
                <h2 class="mb-3">Periodic Task</h2>

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif


                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="taskName" class="form-label">Task Name</label>
                        <input type="text" class="form-control" name="name" id="taskName"
                            aria-describedby="taskhelp" required>
                        <div id="taskhelp" class="form-text">Give your task a name e.g Walk a dog</div>
                    </div>
                    <div class="mb-3">
                        <label for="taskName" class="form-label">Duration</label>
                        <select class="form-select" name="duration" aria-label="Default select example" required>
                            <option selected>Select duration</option>
                            <option value="everyday">Everyday</option>
                            <option value="mondays">Every Monday</option>
                            <option value="weeklyOnMondayWednesdayFriday">Every Monday, Wednesday and Friday</option>
                            <option value="fifthOfTheMonth">5th of each Month</option>
                            <option value="fifthOfMarchYearly">5th of March of each Year</option>
                        </select>
                        <div id="taskhelp" class="form-text">Set a recurring duration for the task</div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>



            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="table">
                    <h2 class="mt-3 mb-3">List Tasks</h2>
                            @if (count($data['tasks']) > 0)

                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Duration</th>
                                <th scope="col">Tasks</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>


                                @php
                                    $taskList = [];
                                @endphp

                                @foreach ($data['tasks'] as $key => $item)

                                    @for ($i = 0; $i < count($item); $i++)

                                        <tr>
                                            <td>{{ $item[$i]->durationName }}</td>
                                            <td>{{ $item[$i]->name }}</td>
                                            <td>{{ $item[$i]->status }}</td>
                                            <td>{{ date('d-m-Y', strtotime($item[$i]->created_at)).' | '.($item[$i]->updated_at !== NULL ? date('d-m-Y', strtotime($item[$i]->updated_at)) : '') }}</td>
                                        </tr>
                                    @endfor
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" align="center">No new tasks available</td>
                                </tr>



                        </tbody>
                    </table>
                            @endif

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
</body>

</html>
