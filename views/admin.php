<?php
require '../classes/telephone.class.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <title>Liste De Telephone</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0  align-items-left">
        <li class="nav-item ">
          <a class="nav-link" href="#">Admin</a>
        </li>
      </ul>

      <div class="d-flex align-items-center">
        <a href="../views/addViewPhone.php" style="margin-right:50px;"><i class="fa fa-plus" aria-hidden="true"></i>Ajouter Un Nouveau Telephone            </a>
        <a href="../views/loginAdmin.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Quitter</a>
        
        
      </div>
    </div>
  </div>
</nav>
<br/>
<br/>
<br/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Nom</th>
      <th>Description</th>
      <th>Prix</th>
      <th>Stock</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $phones = new telephone();
    $allPhones = $phones->getAllPhones();
    foreach ($allPhones as $phone) {
    ?>
    <tr>
      <td>
        <div class="d-flex align-items-center">
          <img
              src=<?php echo $phone['Photo'] ?>
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
            <p class="fw-bold mb-1"><?php echo $phone['Nom'] ?></p>
            <p class="text-muted mb-0">Couleur: <?php echo $phone['Couleur'] ?></p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1"><?php echo $phone['Description'] ?></p>
        <p class="text-muted mb-0">storage: <?php echo $phone['Storage'] ?>Gb</p>
      </td>
      <td>
        <span class="badge badge-success rounded-pill d-inline"><?php echo $phone['Prix'] ?>$</span>
        <!-- <span class="badge badge-primary rounded-pill d-inline" >Onboarding</span>
        <span class="badge badge-warning rounded-pill d-inline">Awaiting</span> -->
      </td>
      <td><?php echo $phone['Stock'] ?></td>
      <td>
        <a href="EditPhoneView.php?editId=<?php echo $phone['id_phone']?>" >                   
                        Edit</a>
        
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
</body>
</html>