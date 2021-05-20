<?

     $client= $this->model_client->find_all_active();
?>
<section class="clientSec hding-2 pad-sec">
    <div class="container">
    <div class="c1">
        <div class="clientHead">
            <h2>Our <strong>Corporate Clients</strong></h2>
        </div>
        <div class="space"><br><br></div>
        <ul class="client-logo">
            <?php foreach ($client as $key => $value): ?>
                <?php if ($value['client_type'] == '1'): ?> 
                    <li><a href="#"><img src="<?=get_image($value['client_image'],$value['client_image_path'])?>" alt=""></a></li> 
                <?php endif ?>
            <?php endforeach ?> 
        </ul>
    </div>

    <div class="c2">
        <div class="clientHead">
            <h2>Our <strong>Strategic Partners</strong></h2>
        </div>
        <div class="space"><br><br></div>
        <ul class="client-logo"> 
            <?php foreach ($client as $key => $value): ?>
                <?php if ($value['client_type'] == '2'): ?> 
                    <li><a href="#"><img src="<?=get_image($value['client_image'],$value['client_image_path'])?>" alt=""></a></li> 
                <?php endif ?>
            <?php endforeach ?> 
        </ul>
    </div>
    </div>
</section>