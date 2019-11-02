<?php if(!class_exists('Rain\Tpl')){exit;}?>  <div class="content-wrapper">
    <div class="content full">
      <div class="container h-100">
        <div class="row align-items-center h-100">
          <div class="col text-center text-light" style="margin-top: -1rem">

            <h1>Bem-vindo, <?php if( $msgName != '' ){ ?><?php echo htmlspecialchars( $msgName, ENT_COMPAT, 'UTF-8', FALSE ); ?><?php } ?>!</h1>
            <p>Você está na E&Q Online, uma área dedicada ao gerenciamento operacional da Engenharia & Qualidade.</p>
            <p>Caso haja alguma dúvida, sugestão ou problema, envie uma mensagem no Whatsapp para o número (84) 99697-5363.</p>
            <a href="admin/log/register"><button type="button" class="btn btn-outline-light btn-lg" role="button">Comece Aqui</button></a>

          </div>
        </div>
      </div>
    </div>
  </div>