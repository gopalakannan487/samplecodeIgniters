
<section class="py-5 mainsection">
<div class="container">
   <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body  shadow rounded">
                <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="./assets/images/logos/logo-light.svg" alt="">
                </a>
                    <h4 class="text-center">Login</h4>
                <form class="" id="signform" method="post" action="">
                  <div class="mb-3">
                    <label for="loginemail" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="loginemail" name="loginemail" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="loginpassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="loginpassword" name="loginpassword">
                  </div>
                  <input type="submit" id="signin" value="Sign In" class="btn btn-primary w-100 py-8 fs-4 mb-4">
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Create Account?</p>
                    <a class="text-primary fw-bold ms-2" href="<?php echo base_url('Welcome/caccount')?>"> Sign Up</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
</section>

<script type="text/javascript">
$(document).ready(function() {
    $(document).on('click', '#signin', function() {
        $("#signform").validate({
            rules: {
                loginemail: {
                    required: true,
                    email: true // Ensure valid email format
                },
                loginpassword: {
                    required: true
                }
            },
            messages: {
                loginemail: {
                    required: "Please Enter Your Registered Email ID",
                    email: "Your email address must be in the format of name@domain.com"
                },
                loginpassword: {
                    required: "Please Enter Your Password"
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: '<?php echo base_url('welcome/formsignin')?>',
                    type: 'post',
                    data: $(form).serialize(),
                    dataType: 'json', // Expect JSON response
                    success: function(response) {
                        console.log(response);
                        if (response.status === 'success') {
                            // Show success message and redirect
                            swal({
                                title: "Success!",
                                text: response.message,
                                icon: "success",
                            },  function(isConfirm){
                          if (isConfirm) {
                          window.location.href = '<?php echo base_url('welcome/dashboard'); ?>'; // Redirect to the dashboard
                          } else {
                         
                          }
                        });
                        } else {
                            // Show error message
                            swal("Error", response.message, "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle AJAX error with more details
                        console.error("AJAX Error: ", status, error);
                        swal("Error", "There was an issue with your request. Please try again.", "error");
                    }
                });
            }
        });
    });
});


</script>