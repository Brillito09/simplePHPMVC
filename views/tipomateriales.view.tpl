<h2>Trabajar con Tipos de Materiales</h2>
<div class="col12 right clean">
  <a href="index.php?page=tipomaterial&acc=ins">Nuevo</a>
</div>
<div>
  <div class="rowhd">
    <div class="col2 hd">Código</div>
    <div class="col4 hd">Tipo de Material</div>
    <div class="col4 hd">Estado</div>
    <div class="col2 hd">Acciones</div>
  </div>
  {{foreach tipomateriales}}
  <div class="row">
    <div class="col2">{{tipoMatId}}</div>
    <div class="col4">{{tipoMatdsc}}</div>
    <div class="col4">{{tipoMatest}}</div>
    <div class="col2">
      <a href="index.php?page=tipomaterial&acc=upd&tipoMatId={{tipoMatId}}">Update</a> |
      <a href="index.php?page=tipomaterial&acc=dlt&tipoMatId={{tipoMatId}}">Delete</a>
    </div>
  </div>
  {{endfor tipomateriales}}
</div>