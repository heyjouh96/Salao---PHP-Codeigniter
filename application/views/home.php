
    
    <h1 class="page-header">Agendamentos para
    <?php
      echo $data;
    ?></h1>


    <div class="table-responsive">
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>Nome</th>
                  <th>Dia</th>
                  <th>Horario</th>
                  <th>Serviço</th>
                  <th>Observação</th>
                  <th style="text-align: center">Confirmar</th>
                  <th style="text-align: center">Cancelar</th>
              </tr>
          </thead>
          <tbody>
              <?php foreach($agendamento as $agend) { ?>
              <tr>
                  <td><?= $agend->nome; ?></td>
                  <td><?= $agend->data; ?></td>
                  <td><?= $agend->hora; ?></td>
                  <td><?= $agend->servico; ?></td>
                  <td><?= $agend->obs; ?></td>
                  <?php if($agend->status == null) { ?>
                  <td style="text-align: center"><a class="btn btn-success glyphicon glyphicon-ok" id="c<?= $agend->id; ?>" data-toggle="modal" data-target="#myModalc<?= $agend->id; ?>"></a></td>
                  <td style="text-align: center"><a class="btn btn-danger glyphicon glyphicon-remove" id="e<?= $agend->id; ?>" data-toggle="modal" data-target="#myModale<?= $agend->id; ?>"></a></td>
                  <?php } else { ?>
                  <td colspan=2 style="text-align: center"> Atendimento Feito</td>
                  <?php } ?>
              </tr>
              
              <!-- Modal -->
              <div class="modal fade" id="myModalc<?= $agend->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Confirmar Atendimento</h4>
                    </div>
                    <form action="<?= base_url() ?>confirmar/<?= $agend->id; ?>" method="POST">
                      <div class="modal-body">
                        <p>Deseja confirmar o antedimento?</p>
                        <p><?= $agend->nome ?></p>
                        <p>Horario: <?= $agend->hora ?></p>
                        <p>Serviço: <?= $agend->servico ?></p>
                        <p>Obs: <?= $agend->obs ?></p>
                        <hr>
                        <label for="valor">Valor do Atendimento (R$)</label>  
                        <input type="number" id="valor" name="valor" class="form-control" placeholder="Ex: 50 ou 50,00" max_length="6" required>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Nope</button>
                        <button type="submit" class="btn btn-primary">Confirmar</a>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="modal fade" id="myModale<?= $agend->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Cancelar Agendamento</h4>
                    </div>
                    <div class="modal-body">
                      <p>Deseja mesmo cancelar este agendamento?</p>
                      <p><?= $agend->nome ?></p>
                      <p>Horario: <?= $agend->hora ?></p>
                      <p>Serviço: <?= $agend->servico ?></p>
                      <p>Obs: <?= $agend->obs ?></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Nope</button>
                      <a class="btn btn-primary" href="<?= base_url() ?>excluir/<?= $agend->id; ?>">Confirmar</a>
                    </div>
                  </div>
                </div>
              </div>
              
              <?php } ?>
          </tbody>
      </table>
    </div>
    
    <button id="json">json</button><br><br>
    <input type="text" id="nome" placeholder="pesquisar" class="form-control" autocomplete="off"><br>
    <button id="pesq">Pesquisar</button>
    <div id="resposta"></div>
  </div>
  
  <div class="col-lg-4 col-sm-4 col-xs-12">
    <br>
    <div class="calendar"></div>
  </div>
</div>