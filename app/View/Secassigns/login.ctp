<?php echo $this->Session->flash();?>

  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <?php echo $this->Form->create('Secperson', array('url' => array('controller' => 'Secassigns', 'action' =>'asignacion'),'id' => 'SecpersonLoginForm' ,'class'=>'login-form')); ?>
        <div class="row">
          <div class="input-field col s12 center">
            <?php echo $this->Html->image('LOGO_OBAS_SOLO.png',array('class'=>'circle responsive-img valign profile-image-login')); ?>
            <p class="center login-form-text">Sistema De Arbitrios Publicos</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <?php echo $this->Form->text('username',array('placeholder'=>'Username')); ?>
            <label for="SecpersonUsername" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <?php echo $this->Form->text('password',array('type'=>'password')); ?>
            <label for="SecpersonPassword">Password</label>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Remember me</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <?php echo $this->Form->submit(__('Login',true),array('class'=>'btn waves-effect waves-light col s12')); ?>
          </div>
        </div>
      <?php echo $this->Form->end(); ?>
    </div>
  </div>
  