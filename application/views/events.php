<section class="py-5 mainsection">
  <div class="container">
   
      <h4 class="text-center mb-2">Dashboard</h4>
      <form class="eventform" id="eventformid" method="post">
        <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Event Title:</label>
            <div class="col-sm-10">
            <input type="text" name="event_title" id="event_title" class="form-control">
          </div>
        </div>
        <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Event Date:</label>
            <div class="col-sm-10">
            <input type="text" name="event_date" id="event_date" class="form-control">
          </div>
        </div>
        <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Event Description:</label>
            <div class="col-sm-10">
            <textarea name="event_description" id="event_description" class="form-control"></textarea>
          </div>
        </div>
        <div class="row mb-2">
            <label class="col-sm-2 col-form-label">Event Image Upload:</label>
            <div class="col-sm-10">
              <input type="file" name="event_image" id="event_imageid">
               <small class="text-muted">Allowed: JPG, PNG | Max Size: 2MB</small>
          </div>
        </div>

          <div class="col-md-12 mb-2">
            <div class="text-center">
          <button type="submit" class="btn btn-primary">Save Event</button>
          </div>
          </div>
      </form>
 
  </div>
</section>

<!-- Include CKEditor Script -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
        $("#event_date").datepicker({
            dateFormat: "yy-mm-dd", // Format YYYY-MM-DD
            changeMonth: true,
            changeYear: true,
            yearRange: "2000:2030"
        });

  CKEDITOR.replace('event_description');

 $("#eventformid").on("submit", function (e) {
      e.preventDefault();

        var eventTitle = $("#event_title").val().trim();
        var eventDate = $("#event_date").val();
        
        var eventDescription = CKEDITOR.instances.event_description.getData().trim();
         var eventImage = $("#event_imageid")[0].files[0];


        if (eventTitle === "" || eventDescription === "") {
            swal("Error", "Both Event Title and Description are required!", "error");
            return;
        }

      // Image validation
      if (eventImage) {
          var allowedTypes = ["image/jpeg", "image/png"];
          var maxSize = 2 * 1024 * 1024; // 2MB

          if (!allowedTypes.includes(eventImage.type)) {
              swal("Error", "Only JPG and PNG images are allowed!", "error");
              return;
          }
          if (eventImage.size > maxSize) {
              swal("Error", "Image size must be less than 2MB!", "error");
              return;
          }
      }

       var formData = new FormData();
      formData.append("event_title", eventTitle);
      formData.append("event_date", eventDate);
      formData.append("event_description", eventDescription);
      if (eventImage) {
          formData.append("event_image", eventImage);
      }

      $.ajax({
        type: "POST",
        url: "<?= base_url('Welcome/save_event'); ?>",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (response) {

        if (response.status === 'success') {
                            // Show success message and redirect
                            swal({
                                title: "Success!",
                                text: response.message,
                                icon: "success",
                            },  function(isConfirm){
                          if (isConfirm) {
                        $("#eventformid")[0].reset();
            CKEDITOR.instances.event_description.setData('');
                          } else {
                         
                          }
                        });
                        } else {
                            // Show error message
                            swal("Error", response.message, "error");
                        }
                      }

      });
    });

</script>
