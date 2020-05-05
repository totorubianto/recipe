<div class="content">
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