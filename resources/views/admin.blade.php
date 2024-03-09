<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        /* Styles for the table */
        .quiz-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .quiz-table th,
        .quiz-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .quiz-table th {
            background-color: #f2f2f2;
        }

        .quiz-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .quiz-table tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <form method="POST" action="{{ url('/quizzes') }}">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Create Quiz</div>

                        <div class="card-body">



                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <!-- Your input fields here -->
                                </div>
                            </div>

                            <!-- Add more form fields as needed -->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Table for quiz data -->
                    <table class="quiz-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Question</th>
                                <th>Answer</th>
                            </tr>
                            <tr>
                                <td><input name ="title" type=text></td>
                                <td><input name ="question" type=text></td>
                                <td><input name ="answer" type=text></td>
                            </tr>
                            <tr>
                                <th>Option A</th>
                                <th>Option B</th>
                                <th>Option C</th>
                                <th>Option D</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- You can dynamically generate rows for each quiz entry here -->
                            <tr>

                            </tr>
                            <tr>
                                <td><input name ="option_a" type=text></td>
                                <td><input name ="option_b" type=text></td>
                                <td><input name ="option_c" type=text></td>
                                <td><input name ="option_d" type=text></td>
                            </tr>
                            <!-- Add more rows for additional quizzes -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
