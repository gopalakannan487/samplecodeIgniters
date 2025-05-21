

<section class="py-5 mainsection">
  <div class="container">
    <div class="d-flex align-items-center justify-content-center w-100">
      <div class="container mt-5">
 <?php //echo "<pre>";print_r($_SESSION);exit;?>


 <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Teaching</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Non-Teaching</button>
  </li>
</ul>
 
 
        <div class="tab-content" id="pills-tabContent">
          <!-- All Roles -->
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Role</th>
                              <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($roles as $role): ?>
                <tr>
                  <td><?php echo $role['id']; ?></td>
                  <td><input type="text" id="trolename_<?php echo $role['id']; ?>" name="name" value="<?php echo $role['name']; ?>" /></td>
                  <td>
               
                    <?php
                    $select1 = "";
                    $select2 = "";
                      if ($role['role_type'] == 1) {
                    $select1 = "selected";
                      }else
                      {
                    $select2 = "selected";
                  }

                    ?>
                    <select class="" id="troletype_<?php echo $role['id']; ?>">
                      <option <?php echo $select1;?> value="1">Teaching</option>
                      <option <?php echo $select2;?> value="2">Non-Teaching</option>
                    </select>
 </td>
                  <td>
                    <div class="d-flex ">
                      <button class="btn btn-primary btn-sm update_role" id="update_role_<?php echo $role['id']; ?>" attr="<?php echo $role['id']; ?>" >Update</button>
                      &#x00A0;
                      <button class="btn btn-danger btn-sm delete_role" id="delete_role_<?php echo $role['id']; ?>" attr="<?php echo $role['id']; ?>">Delete</button>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- Teaching Roles -->
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($troles as $trole): ?>
        
                <tr>
                  <td><?php echo $trole['id']; ?></td>
                  <td><?php echo $trole['name']; ?></td>
                  <td><?php echo $trole['role_type']; ?></td>
                  <td>
                    <div class="d-flex ">
                      <button class="btn btn-primary btn-sm">Update</button>
                      &#x00A0;
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </div>
                  </td>
                </tr>
            
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- Non-Teaching Roles -->
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Role</th>
            <th>Action</th>
                            </tr>
              </thead>
              <tbody>
                <?php foreach ($nroles as $nrole): ?>
                <tr>
                  <td><?php echo $nrole['id']; ?></td>
                  <td><?php echo $nrole['name']; ?></td>
                  <td><?php echo $nrole['role_type']; ?></td>
                  <td>
                    <div class="d-flex ">
                      <button class="btn btn-primary btn-sm">Update</button>
                      &#x00A0;
                      <button class="btn btn-danger btn-sm">Delete</button>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>



      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  $(document).ready(
function()
{
  $(document).on('click','.update_role',function()
  {
    var attrvalue = $(this).attr('attr');
    var tname = $('#trolename_'+attrvalue).val();
    var ttype = $('#troletype_'+attrvalue).val();

    console.log(ttype);
      $.ajax({
                    url: '<?php echo base_url('welcome/updaterole')?>',
                    type: 'post',
                    data: {id:attrvalue,tname:tname,ttype:ttype},
                     success: function(data) {

                     }
                  });

  });

}
    );
</script>
