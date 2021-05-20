<style type="text/css">
	body {
  margin: 0;
  padding: 0;
  background:#F93;
  
  font-family: sans-serif;
}

.progress {
  position: fixed;/*absolute;*/
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  z-index: 9999;
  background-color: rgba(0, 0, 0, 0.65) !important;
}

.progress-container {
  transform: translateY(-50%);
  top: 50%;
  position: absolute;
  width: calc(100% - 200px);
  color: #FFF;
  padding: 0 100px;
  text-align: center;
  margin-left: 5%;
}

.progress-container label {
  font-size: 20px;
  opacity: 0;
  display:inline-block;
}

@keyframes anim {
  0% {
    opacity: 0;
    transform: translateX(-300px);
  }
  33% {
    opacity: 1;
    transform: translateX(0px);
  }
  66% {
    opacity: 1;
    transform: translateX(0px);
  }
  100% {
    opacity: 0;
    transform: translateX(300px);
  }
}

@-webkit-keyframes anim {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-300px);
  }
  33% {
    opacity: 1;
    -webkit-transform: translateX(0px);
  }
  66% {
    opacity: 1;
    -webkit-transform: translateX(0px);
  }
  100% {
    opacity: 0;
    -webkit-transform: translateX(300px);
  }
}

</style>


<div class="progress" id='preloader2'>
  <div class="progress-container">
    <label>	L</label>
    <label>	O</label>
    <label>	A</label>
    <label>	D</label>
    <label>	I</label>
    <label>	N</label>
    <label>	G</label>
    <label>	.</label>
    <label>	.</label>
    <label>	.</label>
  </div>
</div>


<script type="text/javascript">
	$(document).ready(function() {
	var inputs = $(".progress-container").find($("label") );
	
	for(var i =0 ; i< inputs.length; i ++)
	{ 
	     var index = i +1;
		 var time = ((inputs.length)-i ) * 100;
		$(".progress-container label:nth-child("+ index+")").css( "-webkit-animation", "anim 3s "+time+"ms infinite ease-in-out" );
		$(".progress-container label:nth-child("+index+")").css( "-animation", "anim 3s "+time+"ms infinite ease-in-out" );
	}

})
</script>