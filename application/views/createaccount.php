
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
                    <h4 class="text-center">Register</h4>
                <form class="" id="myform" method="post" action="">
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="exampleInputtext1" name="registername" aria-describedby="textHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="registeremail" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="registerpassword">
                  </div>
                  <input type="submit" id="signup" value="Sign Up" class="btn btn-primary w-100 py-8 fs-4 mb-4">
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="<?php echo base_url('Welcome/login')?>"> Sign In</a>
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
$(document).ready(function()
{


   $(document).on('click', '#signup', function() {
    $("#myform").validate({
        rules: {
            registername: "required",
            registeremail: {
                required: true,
                email: true,
                 remote: {
                    url: "<?php echo base_url('welcome/check_email'); ?>", // URL to check email existence
                    type: "post"
                }
            },
            registerpassword: "required"
        },
        messages: {
            registername: "Please specify your name",
            registeremail: {
                required: "We need your email address to contact you",
                email: "Your email address must be in the format of name@domain.com",
                remote: "This email address is already registered."
            },
            registerpassword: "Please enter your password"
        },
        submitHandler: function(form) {
            $.ajax({
                url: '<?php echo base_url('welcome/formregister')?>',
                type: 'post',
                data: $(form).serialize(),
                success: function(data) {
                   // alert(data);
                    if(data == 1)
                    {
                    //  alert('successfully');
                        swal({
                          title: "Good job!",
                          text: "You are registered successfully!",
                          type: "success",
                         
                        },
                        function(isConfirm){
                          if (isConfirm) {
                          window.location.reload();
                          } else {
                         
                          }
                        });
                   }else
                   {
                     alert('error');

                   }

                },
               

            });
        }
    });
});


});

</script>