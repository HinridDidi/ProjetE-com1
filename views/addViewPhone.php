<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

</head>

<body>
  
<form method="POST" action="../controllers/addPhone.php" enctype="multipart/form-data" >
<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="../photos/add.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

             

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Store</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ajouter Un Nouveau Telephone</h5>

                  <div class="form-group">
    <label for="exampleInputEmail1">Nom </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="Nom" aria-describedby="emailHelp" placeholder="Enter Categories">
   
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="Description" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div><br/>
  <div class="form-group">
    <label for="exampleInputEmail1">Couleur </label>
    <input type="text" class="form-control"     name="Couleur" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Couleur">
  </div><br/> 
  <div class="form-group">
    <label for="exampleInputEmail1">Storage </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="Storage" aria-describedby="emailHelp" placeholder="Enter Categories">
   
  </div><br/>

    <div class="input-group mb-3">
  <div class="custom-file">
    <input type="file" class="custom-file-input" name="photo" id="inputGroupFile01">
  </div>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Prix </label>
    <input type="text" class="form-control" name="Prix" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Couleur">
  </div><br/>
  <div class="form-group">
    <label for="exampleInputEmail1">Stock </label>
    <input type="text" class="form-control" name="Stock"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Couleur">
  </div><br/>
  <button type="submit" class="btn btn-primary">Envoyer</button>
  <button  class="btn btn-primary"> <a href="./admin.php" style="color:yellow" >Annuler</a></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  
</form>
</body>
</html>