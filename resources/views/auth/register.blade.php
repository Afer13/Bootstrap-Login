<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .error{
            display: none;
            color: red;
        }
    </style>
</head>

<body>
    <!-- Login 1 - Bootstrap Brain Component -->
    <div class="bg-light py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
                    <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center mb-5">
                                    <h2>Sign Up</h2>
                                    @if (Session::has('warning'))
                                        <div class="alert alert-danger">{{ Session::get('warning') }}</div>
                                    @endif
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <form action="/register/post" id="registrationForm" method="POST" autocomplete="off">
                            @csrf
                            <div class="row gy-3 gy-md-4 overflow-hidden">
                                <div class="col-12">
                                    <label for="name" class="form-label">Name <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">N</span>
                                        <input type="text" class="form-control" name="name" id="name"
                                            autocomplete="false">
                                    </div>
                                    <div class="error error-name"></div>
                                </div>
                                <div class="col-12">
                                    <label for="surname" class="form-label">Surname <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">S</span>
                                        <input type="text" class="form-control" name="surname" id="surname"
                                            autocomplete="false">
                                    </div>
                                    <div class="error error-surname"></div>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                            </svg>
                                        </span>
                                        <input type="email" class="form-control" name="email" id="email"
                                            autocomplete="false">
                                    </div>
                                    <div class="error error-email"></div>
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Password <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                                <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                            </svg>
                                        </span>
                                        <input type="password" class="form-control" name="password" id="password"
                                            value="" autocomplete="false">
                                    </div>
                                    <div class="error error-password"></div>
                                </div>
                                <div class="col-12">
                                    <label for="password_confirmation" class="form-label">Password Confirmation <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                                                <path
                                                    d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                                                <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                            </svg>
                                        </span>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" value="" autocomplete="false">
                                    </div>
                                    <div class="error error-password_confirmation"></div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-lg" type="submit">Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12">
                                <hr class="mt-5 mb-4 border-secondary-subtle">
                                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center">
                                    <a href="/login" class="link-secondary text-decoration-none">Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="otpModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">OTP verify</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger"></div>
                    <div>An OTP code has been sent to your email to complete the registration.</div>
                    
                    <div class="col-12">
                        <div class="input-group">
                            <input type="text" class="form-control" name="otp" id="otp" placeholder="OTP code">
                        </div>
                        <div class="error error-otp"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary confirmOtp">Confirm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#registrationForm').on('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting the traditional way
                $('#otpModal .alert').hide();
                $.ajax({
                    type: 'POST',
                    url: '/register/send-otp',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status == "success") {
                            $('#otp').empty();
                            $('#otpModal').modal('show');
                        } else if (response.status == "warning") {
                            
                        } else {
                            $.each(response.errors, function(key, value) {
                                html = "";
                                $.each(value, function(index, message) {
                                    html += message + " ";
                                });
                                $('.error.error-' + key).show();
                                $('.error.error-' + key).html(html);
                            });
                        }
                    }
                });
            });
            $('.confirmOtp').click(function(){
                $('#otpModal .alert').hide();
                var otpCode=$('#otp').val();
                var data=$('#registrationForm').serialize();
                data+="&otp="+otpCode;
                $.ajax({
                    url:'/register/post',
                    type:'POST',
                    data:data,
                    success:function(response){
                        if (response.status == "success") {
                            window.location=response.redirectUrl;
                        } else if (response.status == "warning") {
                            $('#otpModal .alert').html(response.message);
                            $('#otpModal .alert').show();
                        } else {
                            $.each(response.errors, function(key, value) {
                                html = "";
                                $.each(value, function(index, message) {
                                    html += message + " ";
                                });
                                $('.error.error-' + key).show();
                                $('.error.error-' + key).html(html);
                            });
                        }
                    }
                    
                })
            })
        });
    </script>
</body>

</html>
