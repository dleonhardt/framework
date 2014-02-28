<?php

require_once __DIR__.'/../application/start.php';

use Application\Classes\UserExample;

$user_example = new UserExample;

if($_SERVER['REQUEST_METHOD'] == "POST"):
	$user_data = array("username" => $_POST['username'], "password" => $_POST['password']);
	
	$user_example->createUser($user_data);
endif;

$users = $user_example->getUsers();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>User Example</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<div class="container">
  <div class="page-header">
    <h1>User Example</h1>
  </div>
  <form role="form" method="post">
    <div class="form-group">
      <label>Username</label>
      <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-default">Create User</button>
  </form>
  <?php if(isset($users) && !empty($users)): ?>
  <hr />
  <div class="table-responsive">
    <table class="table">
    	<thead>
      	<tr>
        	<th>ID</th>
          <th>Username</th>
          <th>Password</th>
        </tr>
      </thead>
      <tbody>
      	<?php if(isset($users) && is_array($users)): ?>
				<?php foreach($users as $user): ?>
      	<tr>
        	<td><?php echo $user['id']; ?></td>
        	<td><?php echo $user['username']; ?></td>
        	<td><?php echo $user['password']; ?></td>
        </tr>
				<?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  <?php endif; ?>
</div>
</body>
</html>