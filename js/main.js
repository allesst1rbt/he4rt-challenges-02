$(document).ready(function () {
  var check = localStorage.getItem('check')
  
  if (check == 'yes' || check == null) {
    $('.hidden').toggle();
    $('.hidden').addClass('yes');
    localStorage.setItem('check','yes')
  }
 
    $('.inserir').on('click',function () { 
        $('#ModalPrincipal').modal('toggle');
        $('.modal-title').html('Modal Inserir')
        $('.modal-body').html('  <form enctype="multipart/form-data" action="Action.php?acao=register" method="post">'
                              + ' <div class="form-group">'
                                +'<label for="Feature">Feature</label>'
                               +' <input type="text" class="form-control" id="Feature" name="feature" >'
                           +' </div>'
                           +' <div class="form-group">'
                            +'<label for="devHours">Tempo de desenvolvimento</label>'
                            +'<input type="number " class="form-control" id="devHours hours"  name="devHours">'
                          +'</div>'
                           +' <div class="form-group">'
                           +' <label for="testHours">Tempo de Teste</label>'
                           +' <input type="number" class="form-control hours" id="testHours"  name="testHours">'
                           +'</div>'
                           +'<button type="button" class="btn btn-secondary mr-4" data-dismiss="modal">Close</button>'
                           +'<button type="submit" class="btn btn-primary">Salvar</button>'
                                +'</form>'
                                )
     });
     $('.upload').on('click',function () { 
      $('#ModalPrincipal').modal('toggle');
      $('.modal-title').html('Modal upload')
      $('.modal-body').html('<form enctype="multipart/form-data" action="Action.php?acao=Upload" method="POST">'
                         +' <div class="form-group">'
                         +' <label>coloque aqui seu arquivo json</label>'
                         +' <input name="json" type="file" />'
                         +'</div>'
                         +'<button type="button" class="btn btn-secondary mr-4" data-dismiss="modal">Close</button>'
                         +'<button type="submit" class="btn btn-primary">Salvar</button>'
                              +'</form>'
                              )
                              

   });
     $('.apagar').on('click',function () { 
      $('.hidden').toggle();
      if($('.hidden').hasClass('yes')){
        $('.hidden').removeClass('yes');
        $('.hidden').addClass('no');
        localStorage.setItem('check','no')
        console.log(localStorage);
      }else{
        $('.hidden').removeClass('no');
        $('.hidden').addClass('yes');
        localStorage.setItem('check','yes')
        console.log(localStorage);
      }
     
     })
     $('.download').on('click',function () {
        location.href = 'Action.php?acao=Download'
     })
     $('.fa-github-square').on('click',function () {
      location.href = 'https://github.com/allesst1rbt'
   })
    $('.fa-linkedin').on('click',function () {
      location.href = 'https://www.linkedin.com/in/carlos-dias-85a1a31a8/'
  })
  $('.fa-twitter').on('click',function () {
    location.href = 'https://twitter.com/All3sStirbt'
  })

    
     
});
function remover(id){
  location.href = 'Action.php?acao=Delete&id='+id
}
/* <tr>
                    <th scope="row"> <?= $Feature['id'] ?> </th>
                    <td> <?= $Feature->Feature ?></td>
                    <td> <?= $Feature->DevHours ?></td>
                    <td> <?= $Feature->TestHours ?></td>
                </tr> */