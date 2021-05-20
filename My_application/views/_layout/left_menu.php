<?php
  $left_menu = array(
          array('url'=>'','name'=>'Dashboard','action'=>'home','icon-class'=>'ico1 ico'),
          array('url'=>'factory','name'=>'Factory Details','action'=>'factory','icon-class'=>'ico2 ico'),
          array('url'=>'suppliers','name'=>'Suppliers','action'=>'suppliers','icon-class'=>'ico3 ico'),
          array('url'=>'factory_user','name'=>'Factory Users','action'=>'factory_user','icon-class'=>'ico4 ico'),
          array('url'=>'work_permits','name'=>'Work Permit','action'=>'work_permits','icon-class'=>'ico5 ico'),
          array('url'=>'jobs','name'=>'Job Quote','action'=>'jobs','icon-class'=>'ico6 ico'),
          array('url'=>'timesheet','name'=>'Time Sheet','action'=>'timesheet','icon-class'=>'ico7 ico'),
          array('url'=>'training_center','name'=>'Training Center','action'=>'training_center','icon-class'=>'ico8 ico'),
          array('url'=>'setting','name'=>'Setting','action'=>'setting','icon-class'=>'ico9 ico'),
          array('url'=>'help_center','name'=>'Help Center','action'=>'help_center','icon-class'=>'ico10 ico'),
        );


  $left_menu[8]['child'] = array(
          array('url'=>'factory_sites','name'=>'Manage Sites','action'=>'factory_sites','icon-class'=>'fa fa-cog'),
          array('url'=>'department','name'=>'Manage Building','action'=>'department','icon-class'=>'fa fa-cog'),
          array('url'=>'systems','name'=>'Manage Systems','action'=>'systems','icon-class'=>'fa fa-cog'),
          array('url'=>'component','name'=>'Manage Components','action'=>'component','icon-class'=>'fa fa-cog'),
          array('url'=>'industry','name'=>'Manage Industries','action'=>'industry','icon-class'=>'fa fa-cog'),
          array('url'=>'work','name'=>'Manage Work','action'=>'work','icon-class'=>'fa fa-cog'),
          array('url'=>'configuration','name'=>'Configuration','action'=>'configuration','icon-class'=>'fa fa-cog'),
        );
?>

<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php
        if(isset($left_menu) AND array_filled($left_menu))
        {
          foreach($left_menu as $value)
          {
            if(isset($value['child']) AND array_filled($value['child']))
            {
              switch ($this->class_name) {
                case 'department':
                  $c = 'open';
                  break;
                case 'component':
                  $c = 'open';
                  break;
                case 'systems':
                  $c = 'open';
                  break; 
                case 'industry':
                  $c = 'open';
                  break;
                case 'work':
                  $c = 'open';
                  break;
                case 'configuration':
                  $c = 'open';
                  break;
                case 'factory_sites':
                  $c = 'open';
                  break;
                default:
                  $c = '';
                  break;
              }
            ?>

       
              <li class="dropdown menu_dd <?=$c?>">
                <a href="javascipt:void(0);" class="dropdown-toggle" data-toggle="dropdown" class="ico1">
                  <i class="<?=$value['icon-class']?>"></i>
                  <?=$value['name']?>
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <?php
                  foreach($value['child'] as $val)
                  {
                    $active = ($this->router->fetch_class() == $val['action']) ? 'active' : '';
                  ?>
                    <li class="<?=$active?>"><a class="" href="<?=l($val['url'])?>">
                      <i class="<?=$val['icon-class']?>"></i> <?=$val['name']?></a></li>
                  <?php
                  }
                  ?>
                </ul>
              </li>
            <?php
            }
            else
            {
              $active = ($this->router->fetch_class() == $value['action']) ? 'active' : '';
              echo "<li class=\"".$active."\"> <a href=\"".l($value['url'])."\"> <i class=\"".$value['icon-class']."\"></i>".$value['name']."</a></li>";
            }              
          }
        }
        ?>

      </ul>
    </div>
  </div>
</nav>