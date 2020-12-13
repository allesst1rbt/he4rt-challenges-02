<?php 
    $acao='read';
    require 'Action.php';
  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css" />
    <script src="https://kit.fontawesome.com/f0e0b624aa.js" crossorigin="anonymous"></script>

    <title>HeartChallenge-02</title>
  </head>
  <body>
    <?php if (isset($_GET['erro'])) {
    if ($_GET['erro']=4) {
      echo '<div class="alert alert-danger" role="alert">Envie um arquivo valido!</div>';
    }
  }
    ?>
    <div >
        <div class=" purple-top">
        <nav class="navbar navbar-expand-lg navbar-light  ">
          <img src="logo.png" class="navbar-brand" width="25%" height="10%">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse align-left" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link inserir" >Inserir <span ></span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link apagar">Apagar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link download">Download</a>
              </li>
              <li class="nav-item">
                <a class="nav-link upload " >Upload</a>
              </li>
            </ul>
          </div>
         
        </nav>
        </div>
        <div class="container principal">
          <div class="row">
          <table class="table col-6">
              <thead>
                <tr>
                  
                  <th scope="col">Feature</th>
                  <th scope="col">Horas de desenvolvimento</th>
                  <th scope="col">Horas de teste</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($Features as $key => $value) {?>
                <tr>
                  <td><?=$value->Feature?></td>
                  <td><?=$value->DevHours?></td>
                  <td><?=$value->DevHours?></td>   
                  <td class="hidden "><i class="fas fa-trash-alt fa-lg text-danger" onclick="remover('<?= $value->Id?>')"></i></td>   
                </tr>
              <?php } ?>
             
               
                
              </tbody>
         </table>
         <div class="col-4 right-card">
          <div class="card  mb-3" style="max-width: 18rem;">
            <div class="card-header">
                <div class="form-group">
                <label for="devHours">Valor da hora:</label>
                <input type="number " class="form-control" id="price" >
                </div>
            </div>
            <div class="card-body">
                <div class="content">
                </div>
                <div class="contentpreco">
                </div>
            </div>
          </div>
          </div>
            
        </div>
        </div>
        <div class="container fixed-bottom">
          <div class=" purple-bottom">
            <i class="fa fa-github-square fa-lg" aria-hidden="true" ><a>All3sSt1rbt</a></i>
            <i class="pl-3 fab fa-twitter">All3sSt1rbt</i>
            <i class="pl-3 fa fa-linkedin" aria-hidden="true"> Carlos dias</i>
          </div>
        </div>
        <div class="modal fade" id="ModalPrincipal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"></h5>
              </div>
              <div class="modal-body">

              </div>
              <div class="modal-footer">
                
              </div>
            </div>
          </div>
        </div>
        

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
    <script>
    $(document).ready(function () {
      var json = <?= json_encode($Features)?>;
      var total =0
      var totalHoras =0 
      var totalHorasTeste=0 
      json.forEach(element => {
          total++
          totalHoras+= parseInt(element.DevHours)
          totalHorasTeste+= parseInt(element.TestHours)
      });
      $('.content').html('<p>Total de funcionalidades:'+total+'<p>'+'<p>Total Horas dev:'+totalHoras+'<p>'+'<p>Total Horas teste:'+totalHorasTeste+'<p>')
      $('#price').mask('00000000000000')
      $('#price').keyup(function () {

        valorTotal = parseInt($('#price').val()) * ( totalHoras + totalHorasTeste)
      
        if (parseInt($('#price').val())) {
          $('.contentpreco').html('<p>valor total:'+valorTotal+'<p>')
        }
        
      })
    });
    
    
         
    </script>
  </body>
</html>
