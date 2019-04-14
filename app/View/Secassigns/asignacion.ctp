<?php echo $this->Session->flash();?>
<?php
echo $this->Html->script('jquery.min.js');?>
  <script type="text/javascript">
  var secassigns=<?php echo json_encode($secassigns);?>; 
  $(document).ready(function() {
    var value = $("#SecorganizationId").val();
    for (var i = 0; i < secassigns.length; i++) {
      if(value == secassigns[i]['Secproject']['secorganization_id']){
        $('#SecassignSecprojectId').append($('<option>', {value:secassigns[i]['Secproject']['id'], text:secassigns[i]['Secproject']['name']})); 
        $('#SecassignSecroleId').append($('<option>', {value:secassigns[i]['Secrole']['id'], text:secassigns[i]['Secrole']['name']}));                
      } 
    }
    $('#SecorganizationId').change(function(){
      var valor = $("#SecorganizationId option:selected").text();
      var value = $("#SecorganizationId").val();
      $('#SecassignSecprojectId').trigger('contentChanged');
      $('#SecassignSecprojectId').empty().html('');
      $('#SecassignSecroleId').trigger('contentChanged');
      $('#SecassignSecroleId').empty().html(' ');  
      for (var i = 0; i < secassigns.length; i++) {
        if(value == secassigns[i]['Secproject']['secorganization_id']){
          $('#SecassignSecprojectId').append($('<option>', {value:secassigns[i]['Secproject']['id'], text:secassigns[i]['Secproject']['name']})); 
          $('#SecassignSecroleId').append($('<option>', {value:secassigns[i]['Secrole']['id'], text:secassigns[i]['Secrole']['name']}));            
        }   
      }
      $('#SecassignSecprojectId').material_select();
      $('#SecassignSecroleId').material_select();    
    });
  });
  </script>

  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
	  <?php echo $this->Form->create('Secassign', array('url' => array('controller' => 'secassigns', 'action' =>'login'),'id' => 'SecassignSecassign' ,'class'=>'login-form')); ?>
		<?php echo $this->Form->hidden('Secperson.username'); ?>
		<?php echo $this->Form->hidden('Secperson.password'); ?>
        <div class="row">
          <div class="input-field col s12 center">
            <?php echo $this->Html->image('DCA.jpg',array('class'=>'circle responsive-img valign profile-image-login')); ?>
            <p class="center login-form-text">Asignación</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
  				<?php echo $this->Form->select('Secorganization.id',array($secorganizations),array('class'=>'ui compact selection dropdown','style' => 'width: 300px','label'=>false,'escape'=>false,'empty'=>false));?>
            <label for="SecorganizationId" class="center-align">Facultad</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
	  			<select name="data[Secassign][secproject_id]" id='SecassignSecprojectId' 
	  				style='width:300px;'>
	  			</select>
            <label for="SecassignSecprojectId">Escuela Profesional</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
	  			<select name="data[Secassign][secrole_id]" id='SecassignSecroleId'>
	  			</select>
            <label for="SecassignSecroleId">Rol</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <?php echo $this->Form->submit(__('Aceptar',true),array('class'=>'btn waves-effect waves-light col s12')); ?>
          </div>
        </div>
  		<?php echo $this->Form->end(); ?>
    </div>
  </div>
<?php echo $this->Js->writeBuffer(); ?>