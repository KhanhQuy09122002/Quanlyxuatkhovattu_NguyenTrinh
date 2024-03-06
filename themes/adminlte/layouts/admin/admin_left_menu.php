 <?php
 	use webvimark\modules\UserManagement\models\User;
 ?>
<ul class="sidebar-menu" data-widget="tree">
	<li class="header"><?= Yii::t('app', 'POSTS GROUP')?></li>

	<li class="treeview">
	  <a href="#">
		<i class="fa fa-dashboard"></i> <span><?= Yii::t('app', 'Vật tư')?></span>
		<span class="pull-right-container">
		  <i class="fa fa-angle-left pull-right"></i>
		</span>
	  </a>
		<ul class="treeview-menu">

		<li><a href="#"><i class="fa fa-circle-o"></i> Nhập vật tư </a></li> 
		<li><a href="#"><i class="fa fa-circle-o"></i> Loại vật tư </a></li> 
	   
	  </ul>
	</li>

	<li class="treeview">
	  <a href="#">
		<i class="fa fa-dashboard"></i> <span>LINKS</span>
		<span class="pull-right-container">
		  <i class="fa fa-angle-left pull-right"></i>
		</span>
	  </a>
		<ul class="treeview-menu">
			<li><a href="#"><i class="fa fa-circle-o"></i>fff</a></li>
		</ul>
	</li>


	  <li>
		  <a href="#">
		  
			<i class="fa fa-line-chart"></i> <span>dafas</span>
		  </a>
		</li>
		
	 

	 <li class="header"><?= Yii::t('app', 'ACCOUNT')?></li>
	<?php if(User::hasRole('Admin')) { ?> <li><a href="<?= Yii::getAlias('@web') ?>/user-management/user"><i class="fa fa-circle-o text-red"></i> <span><?= Yii::t('app', 'Manage Account')?></span></a></li> <?php } ?>
	<li><a href="<?= Yii::getAlias('@web') ?>/user-management/auth/change-own-password"><i class="fa fa-circle-o text-yellow"></i> <span><?= Yii::t('app', 'Change Password')?></span></a></li>
	<li><a href="<?= Yii::getAlias('@web') ?>/user-management/auth/logout"><i class="fa fa-circle-o text-aqua"></i> <span><?= Yii::t('app', 'Log out')?></span></a></li>
</ul>

