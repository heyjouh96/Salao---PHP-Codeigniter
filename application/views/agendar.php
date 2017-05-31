<h1 class="page-header">Agendar</h1>

<form name="cadastrar" method="post" enctype="multipart/form-data" action="<?= base_url()?>cadastrar">
    
    <div class="form-group">
        <label for="nome">Nome </label>
        <input type="text" name="nome" maxlength="255" placeholder="Nome do(a) Cliente" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="data">Data </label>
        <input type="date" name="data" maxlength="10" minlength="10" placeholder="DD/MM/AAAA" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="hora">Hora </label>
        <input type="text" name="hora" maxlength="5" minlength="5" placeholder="HH:MM" class="form-control hora" required>
    </div>
    
    <div class="form-group">
        <label for="servico">Serviço </label>
        <select name="servico" class="form-control" required>
            <option value="corte">Corte</option>
            <option value="manicure">Manicure</option>
            <option value="pedicure">Pedicure</option>
            <option value="hidratação">Hidratação</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="obs">Observação <small>(opcional)</small> </label>
        <textarea name="obs" maxlength="500" placeholder="escreva uma observação..." class="form-control"></textarea>
    </div>
    
    <div class="form-group">
        <input type="submit" value="Agendar" class="btn btn-primary">
    </div>
    
</form>

