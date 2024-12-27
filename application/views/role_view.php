<section class="py-5 mainsection">
  <div class="container">
    <div class="d-flex align-items-center justify-content-center w-100">
      <div class="container mt-5">

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
                </tr>
              </thead>
              <tbody>
                <?php foreach ($roles as $role): ?>
                <tr>
                  <td><?php echo $role['id']; ?></td>
                  <td><?php echo $role['name']; ?></td>
                  <td><?php echo $role['role_type']; ?></td>
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
                </tr>
              </thead>
              <tbody>
                <?php foreach ($troles as $trole): ?>
        
                <tr>
                  <td><?php echo $trole['id']; ?></td>
                  <td><?php echo $trole['name']; ?></td>
                  <td><?php echo $trole['role_type']; ?></td>
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
                </tr>
              </thead>
              <tbody>
                <?php foreach ($nroles as $nrole): ?>
                <tr>
                  <td><?php echo $nrole['id']; ?></td>
                  <td><?php echo $nrole['name']; ?></td>
                  <td><?php echo $nrole['role_type']; ?></td>
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
