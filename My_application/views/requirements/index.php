    <!-- Begin: Crousel -->
    <div class="ban">
      <h2>Continuing Education State Requirements</h2>
    </div>
    <div class="requirementFilter">
      <form action="<?=l('requirements/search')?>" class="filterForm" >
          <?php if (isset($profession) && array_filled($profession)): ?>
        <select name="profession">
            <?php foreach ($profession as $key => $value): ?>
          <option value="<?=$value['profession_id']?>" <?=($search_profession == $value['profession_id']) ? 'selected' : ''?>><?=$value['profession_name']?></option>
            <?php endforeach ?>
        </select>
          <?php endif ?>
        <select name="states">
          <?php if (isset($states) && array_filled($states)): ?>
            <?php foreach ($states as $key => $value): ?>
              <option value="<?=$value['states_id']?>" <?=($search_state == $value['states_id']) ? 'selected' : ''?>><?=$value['states_name']?></option>
            <?php endforeach ?>
          <?php endif ?>
        </select>
        
        <button class="btnStyle" type="submit">Search Course</button>
          
      </form>
    </div>
    <!-- END: Crousel -->
<section class="courseDetail">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
            <div class="requirement">
            <?php if (!array_filled($require)){ ?>
              <p>Related record is not found</p>
            <? }else{?>

              <div class="title">
                <h4><?=$require['states_name']?> Continuing Education Requirements</h4>
              </div>
              <div class="contactInfoss">
                <h3><?=$require['states_name']?> Board of Nursing Contact Information</h3>
              <?php if (!empty($require['requirements_phone'])): ?>
                <p ><i class="fa fa-phone"></i> Phone: <a href="tel:<?=$require['requirements_phone']?>"><?=$require['requirements_phone']?></a></p>
              <?php endif ?>

      <?php if (!empty($require['requirements_fax'])): ?>
                <p><i class="fa fa-fax"></i> Fax: <a href="fax:<?=$require['requirements_fax']?>"><?=$require['requirements_fax']?></a></p>
      <?php endif ?>
                
                <?php if (!empty($require['requirements_website'])): ?>
                <p><i class="fa fa-globe"></i> Website: <a href="<?=$require['requirements_website']?>" target="_blank"></a></p>
                <?php endif ?>
                <?php if (!empty($require['requirements_address'])): ?>
                <p><i class="fa fa-map-marker"></i> Address: <a href="#" target="_blank"><?=$require['requirements_address']?></a></p>
                <?php endif ?>

              </div>
              <?php if (!empty($require['requirements_update_data'])): ?>
              <p><em>Last Updated:  <?=$require['requirements_update_data']?> </em></p>
              <?php endif ?>
              <p><strong>Profession:</strong> <?=$require['profession_name']?></p>
              <p><strong>Requirements:</strong></p>
                <?=html_entity_decode($require['requirements_desc'])?>
              <!-- <a href="#" class="btnStyle">Report an issue</a> -->
            <?}?>

            </div>
          </div>
        </div>
      </div>
    </section>