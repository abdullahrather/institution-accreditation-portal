 <!-- jQuery -->
 <script src="{{ url('auth/assets/jquery/jquery.min.js') }}"></script>
 <!-- Page specific script -->
 <!-- Bootstrap 4 -->
 <script src="{{ url('auth/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- jquery-validation -->
 <script src="{{ url('auth/assets/jquery-validation/jquery.validate.min.js') }}"></script>
 <script src="{{ url('auth/assets/jquery-validation/additional-methods.min.js') }}"></script>
 <!-- Bootstrap 4 -->
 <script src="{{ url('auth/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- AdminLTE App -->
 <script src="{{ url('auth/assets/js/adminlte.min.js') }}"></script>
 <!-- Include Inputmask library -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>

 <script>
    $(function() {
        $('#quickForm').validate({
            rules: {
                // hei_name: {
                //     required: true,
                // },
                // rep_name: {
                //     required: true,
                // },
                // rep_designation: {
                //     required: true,
                // },
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                // username: {
                //     required: true,
                // },
                // rep_phone: {
                //     required: true,
                // },
                // rep_sec_phone: {
                //     required: true,
                // },
                password: {
                    required: true,
                    minlength: 5,
                },
                password_confirmation: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                captcha: {
                    required: true,
                },
                terms: {
                    required: true
                },
            },
            messages: {
                // hei_name: {
                //     required: "Please enter the Higher Education Institution Name",
                // },
                // rep_name: {
                //     required: "Please enter the Representative Name",
                // },
                // rep_designation: {
                //     required: "Please enter the Representative Designation",
                // },
                name: {
                    required: "Please enter your name",
                },
                email: {
                    required: "Please enter an email address",
                    email: "Please enter a valid email address"
                },
                // username: {
                //     required: "Please enter a user name",
                // },
                // rep_phone: {
                //     required: "Please enter the primary phone number",
                // },
                // rep_sec_phone: {
                //     required: "Please enter the secondary phone number",
                // },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                password_confirmation: {
                    required: "Please provide a password confirmation",
                    minlength: "Your password confirmation must be at least 5 characters long",
                    equalTo: "Password confirmation must match the password"
                },
                captcha: {
                    required: "Please enter the captcha",
                },
                terms: "Please accept our terms and conditions"
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.input-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });

        // validation for phone number fields
        // $('#quickForm input[name="rep_phone"]').on('input', function() {
        //     var value = $(this).val().replace(/\D/g, ''); // Remove non-digit characters
        //     if (value.length > 11) {
        //         value = value.slice(0, 11); // Limit to 11 digits
        //     }
        //     $(this).val(value);
        // });

        // $('#quickForm input[name="rep_sec_phone"]').on('input', function() {
        //     var value = $(this).val().replace(/\D/g, ''); // Remove non-digit characters
        //     if (value.length > 11) {
        //         value = value.slice(0, 11); // Limit to 11 digits
        //     }
        //     $(this).val(value);
        // });

    });
</script>

<script>
    $('#reload').click(function(){
        $.ajax({
            type:'GET',
            url:'{{ route('reload.captcha') }}',
            success:function(data){
                $(".captcha span").html(data.captcha)
            }
        });
    });
</script>

</body>

 </html>
