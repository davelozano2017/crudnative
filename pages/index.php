<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Crud Native</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/amaran/dist/css/amaran.min.css">
    <link rel="stylesheet" href="../assets/amaran/dist/css/animate.min.css">

  </head>
  <body>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Crud Native</a>
      </div>
    </div>
  </nav>

      <form method="post">
        <div class="col-md-12">
          <div class="form-group">
            <input type="hidden" id="id" name="id">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname">
          </div>

          <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname">
          </div>

          <div class="form-group">
            <label for="middlename">Middle Name</label>
            <input type="text" class="form-control" id="middlename" name="middlename">
          </div>

          <div class="form-group">
            <div id="notif" class="pull-right"></div>
            <button type="submit" id="addorupdate" name="btn-submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
      <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="panel panel-primary">
            <div class="panel-heading">Records</div>

              <div id="showdata"></div>
          </div>
        </div>
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/amaran/dist/js/jquery.amaran.min.js"></script>
    <script type="text/javascript" src="../functions/functions.js"></script>
  </body>
</html>
