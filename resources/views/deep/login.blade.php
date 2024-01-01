@extends('deep')
@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h2 class="content-header-title">Admins</h2>
    </div>

  </div>
  <div class="content-body">
<div class="card">
  <?php

  $servername = "127.0.0.1";
  $database = "lifeplusloyalty";
  $username = "lifeplusloyalty";
  $password = "~OLAw9JY5czqRO3PAGJX-kI^X=Fs,dqw";
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $database);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";
  $sql = "SELECT 1 FROM cbd";
  if(!$sql == false) echo 'exits';

  $conn->close();

  ?>
</div>
  </div>
</div>

@endsection
