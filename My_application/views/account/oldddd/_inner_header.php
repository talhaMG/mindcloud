<section class="innhead">
    <div class="container">
    <h2></h2>
	<div class="userprofile">
		<img src="<?=get_image($user_data['ui_profile_image'],$user_data['ui_profile_image_path'])?>" class="img-rounded" style='width:123px;height: 120px'>
		<h5>
			<!-- <img src="<?=i('')?>flag.png" alt="img"> -->
			<img src="" class="flag flag-<?=$this->layout_data['country']?>" alt="" />

			&nbsp;<?=ucfirst($user_data['user_firstname'].' ' .$user_data['user_lastname'])?></h5>
		<h6><?=$user_data['user_points']?> Points</h6>
	</div>
	<ul class="listing">
		<li><a href="<?=l('account/profile/edit')?>"><i class="fa fa-search" aria-hidden="true"></i></a></li>
		<li><a href="<?=l('account/profile/edit')?>"><i class="fa fa-user" aria-hidden="true"></i></a></li>
		<li><a href="<?=l('account/profile/edit')?>"><i class="fa fa-cog" aria-hidden="true"></i></a></li>
	</ul>
	<a href="<?=l('account/profile/edit')?>" class="editlink">Edit Profile</a>
    </div>

</section>