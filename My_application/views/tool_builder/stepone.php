<style type="text/css">
strong {
    padding: 10px 0;
    line-height: 10px;
    /* border: 1px solid #00D; */
    margin-bottom: 12px;
    display: inline-block;
}  

</style>
<section class="main-getstrtpg">
  <div class="container">
    <div class="ctgry-bg">
    <div class="row">
      <div class="col-md-3 col-xs-12 col-sm-3">
        <div class="getstrtpg-lst">
          <ul>
            <li class="active"><a href="<?=l('calculator_steps/stepone1').'?query-id='.$queryid.'&key='.$key?>">Getting Started</a></li>
            <li><a href="JavaScript:void(0)">Getting to Know You</a></li>
            <li><a href="JavaScript:void(0)">Assets</a></li>
            <li><a href="JavaScript:void(0)">Income</a></li>
            <li><a href="JavaScript:void(0)">Real Estate</a></li>
            <li><a href="JavaScript:void(0)">Declarations</a></li>
            <li><a href="JavaScript:void(0)">Demographic Info</a></li>
            <li><a href="JavaScript:void(0)">Additional Questions</a></li>
          </ul>
        </div>
        <div class="trm-ustxt">
          <a href="javascript:void(0)">Terms of Use</a>
          <span>|</span>
          <a href="javascript:void(0)">Privacy Policy</a>
        </div>
      </div>


      <div class="col-md-9 col-xs-12 col-sm-9">
        <div class="gt-frmone">
          <h2>Getting Started</h2>
        </div>
        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            <div class="few-prvd stp-6">
              <span>Are you currently working with someone at Wintrust Mortgage, a division of Barrington Bank & Trust, N.A. regarding your loan?</span>
            </div>
            <div class="strt-frmone stp-7">
              <div class="crnt-inpt">
                <p>Working with some one</p>
                  <form id="form-send_us" action="<?=l('contact_us/ajax_formsend')?>">
                  <input type="hidden"  name="loan[loan_user_id]" value="<?=($this->userid)?>"> 

       <div class="onoffswitch">
        <input type="hidden" name="loan[loan_work_some]" id="sometxt" value="<?=$loan['loan_work_some']?>">

    <input type="checkbox" name="loan[loan_work]" class="onoffswitch-checkbox"  id="myonoffswitch" value="<?=$loan['loan_work']?>">


    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div> 

         


              </div>
        <?   
        $loan = $this->model_loan->find_by_pk($queryid);

       //debug($loan);
        ?> 
              <div class="strt-frmone" id="all">
              <label>Officer Name </label>
              <input type="text" name="loan[loan_officername]" id="tags" value="<?=$loan['loan_officername']?>"></div>
              <button type="Submit" class="cntnu" id="forms-contact_send-btn">Continue</button>
         <!--      <a href="" class="cntnu" id="forms-contact_send-btn" type="submit">Continue</a>  -->
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  $(document).ready(function(){
     $("#all").hide(); 
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#all").show(); 
             $("#sometxt").val('Yes');

            }
            else if($(this).prop("checked") == false){
                $("#all").hide();
                 $("#sometxt").val('No');

            }
        });
    });

 function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = [ "Elizabeth Heitmann",
"Lynette Hale-Lee",
"James Harris",
"Constance Heidi Modell",
"Heith A Reade",
"Vartan Hovsepyan",
"Dorothy H Gilbert",
"James Robert Huffer",
"Joshua Paul Hudkins",
"Scott C Havlik",
"Humma Anila Hussain",
"Howard Thomas Fiedler",
"Kelley Ann Hauser",
"Kristine L Hill",
"Justin Haley",
"Nick Haley",
"Reid Hansen",
"Brian Haggerty",
"Heather Maoz",
"Thomas Hartline",
"Jody Hippen",
"I can't find them in this list Continue"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("tags"), countries);

</script>

