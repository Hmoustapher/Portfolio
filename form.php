<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Registration</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include your custom CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <!-- Container for the registration form -->
    <div class="container">
        <!-- Row for the heading -->
        <div class="row">
            <!-- Column for spacing -->
            <div class="col-sm-2"></div>
            <!-- Column for the main heading -->
            <div class="col-sm-8" style="border: 2px solid black; padding: 5px; text-align: center;">
                <h1>Registration Form</h1>
            </div>
            <!-- Column for spacing -->
            <div class="col-sm-2"></div>
        </div>
        <!-- Row for the form elements -->
        <div class="row">
            <!-- Column for spacing -->
            <div class="col-sm-1"></div>
            <!-- Column for the form -->
            <div class="col-sm-10" style="padding: 80px;">
                <!-- Registration form -->
                <form action="form_action.php" method="POST" enctype="multipart/form-data">
                    <!-- Row for the form fields -->
                    <div class="row">
                        <!-- Left column for personal details -->
                        <div class="col-sm-6">
                            <!-- Full Name -->
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <label class="label">Full Name:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <!-- Surname -->
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <label class="label">Surname:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="fname" class="form-control" required>
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <label class="label">Address:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="address" class="form-control" required>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <label class="label">Email:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                            </div>
                            <!-- Mobile No -->
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <label class="label">Mobile No:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="mobile" class="form-control" required>
                                </div>
                            </div>
                            <!-- DOB -->
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <label class="label">DOB:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="date" name="dob" class="form-control" required>
                                </div>
                            </div>
                            <!-- Category -->
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <label class="label">Category:</label>
                                </div>
                                <div class="col-sm-8">
                                    <select name="category" class="form-control" required>
                                        <option value="">Select your category</option>
                                        <option value="SC">ST</option>
                                        <option value="ST">SC</option>
                                        <option value="General">General</option>
                                    </select> 
                                </div>
                            </div>
                            <!-- Gender -->
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <label class="label">Gender:</label>
                                </div>
                                <div class="col-sm-8">
                                    <select name="gender" class="form-control" required>
                                        <option value="">Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select> 
                                </div>
                            </div>
                            <!-- Select Course -->
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <label class="label">Select Course:</label>
                                </div>
                                <div class="col-sm-8">
                                    <select name="course" class="form-control" required>
                                        <option value="">Select Course</option>
                                        <option value="Graphics Design">Graphics Design</option>
                                        <option value="Introduction to ICT">Introduction to ICT</option>
                                        <option value="Web Design">Web Design</option>
                                    </select> 
                                </div>
                            </div>
                        </div>
                        <!-- Right column for photo and signature -->
                        <div class="col-sm-6">
                            <!-- Photo -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group" style="float:right;">
                                        <label class="label">Photo</label>
                                        <div style="border: 1px solid black; height: 150px; width: 150px; background: #FSFAFF;">
                                            <img id="output" width="150" height="150" style="display:none">
                                        </div>
                                        <input type="file" name="image" id="image" onchange="loadfile(event)" class="form-control" required accept="image/*" style="width:150px;" required>
                                        <script type="text/javascript">
                                            var loadfile = function(event) {
                                                var reader = new FileReader();
                                                reader.onload = function() {
                                                    var output = document.getElementById("output");
                                                    output.src = reader.result;
                                                };
                                                $('#output').show();
                                                reader.readAsDataURL(event.target.files[0]);
                                            };
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <!-- Signature -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group" style="float:right;">
                                        <label class="label">Signature</label>
                                        <div style="border: 1px solid black; height: 120px; width: 150px; background: #FSFAFF;">
                                            <img id="outputs" width="150" height="120" style="display:none">
                                        </div>
                                        <

