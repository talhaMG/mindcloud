<form action="<?=l('home/search')?>" class="row formStyle">
          <div class="col-md-3 col-xs-12 col-sm-3">
            <input type="text" placeholder="Course Keyword" class="form-control" name="keyword" value="<?=$keyword?>">
          </div>
          <div class="col-md-3 col-xs-12 col-sm-3">
            <select class="form-control" name="category">
              <option value="">All Category</option>
              <?php if (isset($professions) && array_filled($professions)): ?>
                <?php foreach ($professions as $key => $value): ?>
                   <option value="<?=$value['profession_id']?>" <?=($profession == $value['profession_id'] ) ? 'selected' : '' ?>><?=$value['profession_name']?></option>
                 <?php endforeach ?> 
              <?php endif ?>
            </select>
          </div>
          <div class="col-md-3 col-xs-12 col-sm-3">
            <select class="form-control" name="state">
              <option value="">Select State</option>
              <?php if (isset($states) && array_filled($states)): ?>
                <?php foreach ($states as $key => $value): ?>
                   <option value="<?=$value['states_id']?>" <?=($state == $value['states_id'] ) ? 'selected' : '' ?>><?=$value['states_name']?></option>
                 <?php endforeach ?> 
              <?php endif ?>
            </select>
          </div>
          <div class="col-md-3 col-xs-12 col-sm-3">
            <button class="btnStyle" type="submit">Search Course</button>
          </div>
        </form>