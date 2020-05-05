
<!-- End Navbar -->
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Tambah Admin</h5>
        </div>
        <div class="card-body">
            <form class="form-user">
          
            <div class="row">
              <div class="col-md-3 pr-1">
                <div class="form-group">
                  <label>Username</label>
                  <input id="username" type="text" class="form-control" name="username" placeholder="Username" >
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 pr-1">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" id="name" name="name" class="form-control" placeholder="Name" >
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Role</label>
                  <input type="text" id="role" class="form-control" placeholder="ADMIN || USER">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 pr-1">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" id="password" name="password" class="form-control" >
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password Confirmation</label>
                  <input type="password" id="password" name="passwordConfirmation" class="form-control" >
                </div>
              </div>
            </div>
            <button name=""class="btn btn-primary add-transaction">Tambah admin</button>
          </form>
        </div>
      </div>
    </div>
    
  </div>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title"> Simple Table</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead class=" text-primary">
            <th>
              Name
            </th>
            <th>
              Username
            </th>
            <th>
              Role
            </th>
            <th >
              Email
            </th>
            <th>
              Action
            </th>
          </thead>
          <tbody>
            <?php foreach ($admin as $key => $value) { ?>
              <tr>
                <td>
                  <?php echo $value['name']; ?>
                </td>
                <td>
                  <?php echo $value['username']; ?>
                </td>
                <td>
                  <?php echo $value['role']; ?>
                </td>
                <td>
                 <?php echo $value['email']; ?>
                </td>
                <td><a href="" class="btn btn-primary mr-2">Edit</a><a href="<?php echo BASE ."/admin/delete?id=". $value['id'] ?>" class="btn btn-danger">Delete</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(".add-transaction").click(function(){
    var data = $('.form-user').serialize();
    $.ajax({
      type: 'POST',
      url: '<?php echo BASE . '/admin/add_admin' ?>',
      data: data,
      success: function(e) {
        var json = JSON.parse(e)
        if(json.username == "" || json.name == "" || json.email == ""|| json.password == "") {
          alert("heh ini data dulu")
        }
        else{
          $('#hehe').modal('show')
        }

      }
    });
  });
</script>