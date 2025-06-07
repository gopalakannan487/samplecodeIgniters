  <style>
    .dropdown-menu {
      max-height: 200px;
      overflow-y: auto;
    }
    .hide
    {display: none !important;}
  </style>
  

<section class="py-5 mainsection">
  <div class="container">
   
      <h4 class="text-center mb-2">Dashboard</h4>
      <form class="departform mb-3" >
        <div class="row">
          <div class="col-md-4">
            <label class="form-label">Department Name</label>
            <input type="text" name="dept_name" id="depname" class="form-control">
          </div>
          <div class="col-md-4">
            <label>&#x00A0;</label>
            <div>
               
                    <button class="btn btn-primary" id="depsave" >Save</button>
                    <input type="hidden" id="dep_id" name="dept_id" value="">
          <button class="btn btn-primary hide" id="depupdate">update</button>
                
          </div>
        </div>
        </div>
      </form>

      <table class="table table-striped table-bordered" id="myTable">
        <thead>
          <tr>
            <th>S.no</th>
            <th>Department Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>

    <div class="container mt-4" style="display: none;">
  <h3>Select a Tutorial</h3>
  <form action="<?= base_url('Welcome/ulselect') ?>" method="POST">
    <div class="dropdown mb-3">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        Select Tutorial
      </button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <li><a class="dropdown-item" href="#" data-value="HTML">HTML</a></li>
  <li><a class="dropdown-item" href="#" data-value="CSS">CSS</a></li>
  <li><a class="dropdown-item" href="#" data-value="JavaScript">JavaScript</a></li>
  <li><a class="dropdown-item" href="#" data-value="PHP">PHP</a></li>
  <li><a class="dropdown-item" href="#" data-value="MySQL">MySQL</a></li>
  <li><a class="dropdown-item" href="#" data-value="React">React</a></li>
  <li><a class="dropdown-item" href="#" data-value="Node.js">Node.js</a></li>
  <li><a class="dropdown-item" href="#" data-value="Express.js">Express.js</a></li>
  <li><a class="dropdown-item" href="#" data-value="MongoDB">MongoDB</a></li>
  <li><a class="dropdown-item" href="#" data-value="Python">Python</a></li>
  <li><a class="dropdown-item" href="#" data-value="Django">Django</a></li>
  <li><a class="dropdown-item" href="#" data-value="Flask">Flask</a></li>
  <li><a class="dropdown-item" href="#" data-value="C">C</a></li>
  <li><a class="dropdown-item" href="#" data-value="C++">C++</a></li>
  <li><a class="dropdown-item" href="#" data-value="Java">Java</a></li>
  <li><a class="dropdown-item" href="#" data-value="Kotlin">Kotlin</a></li>
  <li><a class="dropdown-item" href="#" data-value="Swift">Swift</a></li>
  <li><a class="dropdown-item" href="#" data-value="Android Development">Android Development</a></li>
  <li><a class="dropdown-item" href="#" data-value="iOS Development">iOS Development</a></li>
  <li><a class="dropdown-item" href="#" data-value="About Us">About Us</a></li>
</ul>

      <input type="hidden" name="selected_tutorial" id="selected_tutorial">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>

  </div>
</section>


<script type="text/javascript">
$(document).ready(function() {
    $(document).on('click', '#depsave', function() {

        $(".departform").validate({
            rules: {
                dept_name: {
                    required: true
                }
           
            },
            messages: {
                dept_name: {
                    required: "Please Enter Your Department Name"
                }
            },
            submitHandler: function(form) {
          $.ajax({
                    url: '<?php echo base_url('welcome/formdep')?>',
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

 
    $('#myTable').DataTable({
      "processing": true,
    "serverSide": true,
    "ajax": {
      "url": "<?php echo base_url('welcome/fetch_departments'); ?>",
      "type": "POST"
    },
    "columns": [
      { "data": "dept_id", render: function (data, type, row) {
        return '<span class="depid" depid='+data+'>'+data+'</span>';

      } },
      { "data": "dn", render: function (data, type, row) {
        return '<span class="attrid" attrid='+data+'>'+data+'</span>';

      } },
      { "data": "action", bSortable:false, render: function (data, type, row) {
         return '<ul class="d-flex gap-2"><li class="depedit" style="cursor:pointer;"><i class="fa fa-edit"></i></li><li class="depdelete" style="cursor:pointer;"><i class="fa fa-trash-o"></i></li></ul>';
      }
       }
    ]
    });

 

    $(document).on('click', '.depedit', function () {
      var attrid = $(this).closest('tr').find('.attrid').attr('attrid');
      var deptmid = $(this).closest('tr').find('.depid').attr('depid');
      $('#depname').val(attrid);
      $('#dep_id').val(deptmid);
      $('#depsave').addClass('hide');
      $('#depupdate').removeClass('hide');
});

$(document).on('click', '#depupdate', function () {
  var depnam = $('#depname').val();
  var depnamid = $('#dep_id').val();
      $('#depsave').removeClass('hide');
      $('#depupdate').addClass('hide');

$.ajax({
           url:'<?php echo site_url('welcome/depupdates');?>',
           type:'post',
           data:{depnamid:depnamid, depnam:depnam},
           success:function(data){
           }
         });

});



$(document).on('click', '.depdelete', function () {
    var row = $(this).closest('tr');
    var dept_id = row.find('.depid').attr('depid');

    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this department!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel",
        closeOnConfirm: false
    },
    function () {
        $.ajax({
            url: '<?php echo site_url('welcome/delete_dept'); ?>',
            type: "POST",
            data: { dept_id: dept_id },
            success: function (response) {
                if (response == 1) {
                    row.remove();
                    swal("Deleted!", "Department has been deleted.", "success");
                } else {
                    swal("Failed!", "This department is in use and cannot be deleted.", "error");
                }
            },
            error: function () {
                swal("Error!", "AJAX error occurred.", "error");
            }
        });
    });
});





        });



  //   $('.dropdown-item').click(function(e) {
  //   e.preventDefault();
  //   var text = $(this).text();
  //   var value = $(this).data('value');
  //   $('#dropdownMenuButton').text(text);
  //   $('#selected_tutorial').val(value);
  // });
    
  // $('form').submit(function(e) {
  //   if (!$('#selected_tutorial').val()) {
  //     e.preventDefault();
  //     swal({
  //       title: "Please select a tutorial first",
  //       icon: "warning",
  //       button: "OK"
  //     });
  //   }
  // });
</script>