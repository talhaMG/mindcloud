<div class="breadcrumbSec">
	<div class="container">
		<div class="col-md-12 col-sm-12 col-xs-12 text-right">
			<ul>
				<li><a href="<?=l('dashboard')?>">Overview</a></li>
				<li><a class='<?=($this->router->fetch_class() == 'profile') ? 'active' : ''?>' href="<?=l('account/profile/edit')?>">Profile</a></li>
				<li><a href="<?=l('dashboard')?>">Leader Board</a></li>
				<li><a href="<?=l('dashboard')?>">My Groups</a></li>
				<li><a href="<?=l('dashboard')?>" class="<?=($this->router->fetch_class() == 'dashboard') ? 'active' : ''?>">Recent Result Summary</a></li>
			</ul>
		</div>
	</div>
</div>