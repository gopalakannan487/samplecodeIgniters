
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
                <form class="" id="myform" method="post" action="<?php echo base_url('welcome/formregister')?>">
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
                  <button type="submit" id="signup" class="btn btn-primary w-100 py-8 fs-4 mb-4">Sign Up</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="./authentication-login.html">Sign In</a>
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


    $(document).on('click','#signup',function()
    {
	  $("#myform").validate({
    rules: {
    registername: "required",
    registeremail: {
      required: true,
      email: true
    },
      registerpassword: "required",
  },
  messages: {
    name: "Please specify your name",
    email: {
      required: "We need your email address to contact you",
      email: "Your email address must be in the format of name@domain.com"
    },
          registerpassword: "Please Enter Your Password",
    }
  // submitHandler: function(form) {
  //   // do other things for a valid form
  //   form.submit();
  // }
});
	  });





$('#myform').submit(function () {
        if($(this).valid()) {
 

swal("Good job!", "Your Register!", "successfully");

  	}else
  	{
  		  swal("Cancelled", "Please Enter the Fields)", "error");
  		  swal({
  title: "Error!",
  text: "Here's my error message!",
  type: "error",
  confirmButtonText: "Cool"
});
  	}

    });




});

</script>