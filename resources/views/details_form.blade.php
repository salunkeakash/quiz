@extends('layout.app')

@section('content')
    <div class="pageBody">
        <section>
            <div class="container py-5">
                <p class="smallTxt mb-4">Enter your credentials to proceed</p>
                <form method="POST" id="userDeatilsForm" class="userDeatilsForm">
                    @csrf
                    <div class="form-field">
                        <label for="name">Name<span>*</span></label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" class="form-control"
                            required>
                    </div>
                    <div class="form-field">
                        <label for="email">Email ID<span>*</span></label>
                        <input type="email" id="email" name="email" placeholder="Enter your email"
                            class="form-control" required>
                    </div>
                    <div class="form-field">
                        <label for="phoneNum">Phone Number<span>*</span></label>
                        <input type="number" id="phoneNum" name="phoneNum" placeholder="Enter your phone number"
                            class="form-control" required>
                    </div>
                    <!-- <button class="blueBtn w-100 mt-4" type="submit">Proceed</button> -->
                    <div>
                        <div class="checkbox-groupwrap">
                            <label class="checkbox-group">I agree to the <a href="terms-and-conditions.html">Terms and
                                    Conditions</a> & the <a href="https://timespro.com/privacy-policy">Privacy Policy</a>.
                                <input type="checkbox" name="checkbox_terms" id="checkbox_terms">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkbox-groupwrap">
                            <label class="checkbox-group">Yes, I would like to receive updates via WhatsApp'
                                <input type="checkbox" name="checkbox_update" id ="checkbox_update">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <button class="blueBtn w-100 mt-4" type="submit">Proceed</button>
                </form>
                <div id="toast-error" class="error"></div>
            </div>
        </section>
        <section class="bottomGraphic"></section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

    <script>
        $("#userDeatilsForm").validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                },
                phoneNum: {
                    required: true,
                    minlength:10,
                    number: true
                },
                checkbox_terms: {
                    required: true,
                },
                checkbox_update: {
                    required: false,
                },
            },

            messages: {
                name: {
                    required: "This field is required.",
                },
                email: {
                    required: "This field is required.",
                },
                phoneNum: {
                    required: "This field is required.",
                },
                checkbox_terms: {
                    required: "This field is required.",
                },
            },

            submitHandler: function(form, e) {
                e.preventDefault();
                var form = $("#userDeatilsForm");
                var formData = new FormData();

                var name = $("#name").val();
                formData.append("name", name);

                var email = $("#email").val();
                formData.append("email", email);

                var phoneNum = $("#phoneNum").val();
                formData.append("mobile_no", phoneNum);

                var checkbox_terms = $("#checkbox_terms").prop("checked");
                formData.append("checkbox_terms", checkbox_terms);

                var checkbox_update = $("#checkbox_update").prop("checked");;
                formData.append("checkbox_update", checkbox_update);

                console.log(name);
                console.log(email);
                console.log(phoneNum);
                console.log(checkbox_terms);
                console.log(checkbox_update);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    type: "POST",
                    url: "/startquiz",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                }).done(function(data) {
                    console.log(data);
                    if (data.status == 201) {

                        // console.log(data)
                        // $('#toasterror').toast('show');
                        document.getElementById("toast-error").innerHTML = data.msg;
                         setTimeout(() => {
                            window.location = "/";
                        }, 3000);
                        // // document.getElementById("modalHead").innerHTML = 'Error';

                    } else {
                        window.location = '/quiz'
                        // $('#toastsuccess').toast('show');
                        // // document.getElementById("modalHead").innerHTML = 'Success';
                        // document.getElementById("toast-body").innerHTML = data.msg;
                        // setTimeout(() => {
                        //     window.location = "/home";
                        // }, 3000);

                    }
                });
            },
        });
    </script>
@endsection
