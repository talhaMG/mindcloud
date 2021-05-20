

<style type="text/css">
  .main-slider {
    height: 100%;
    background: url(<?=$bimage?>) top right/cover no-repeat !important;
    display: flex;
    align-items: center;
    padding-top: 3em;
    max-height: 500px !important;
}
.goDown{
  display: none;
}
</style>
<div class="main-slider">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-sm-9">
            <?=$bcontent?>
          </div>
          <div class="goDown">
            <a href="#next" class="next"><span class="fa fa-angle-double-down"></span></a>
          </div>
        </div>
      </div>
    </div>