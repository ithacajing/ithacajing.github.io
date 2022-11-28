
$(document).ready(function(){
    
    
    //checked and unchecked the radio button             
    //if clicked the historical data, set the date sent by vendor to N/A
    $('#otherC').hide();
    $('#otherI').hide();
/*
     $('input[type=radio]').click(function(){
        if (this.previous) {
            this.checked = false;
        }
        this.previous = this.checked;
    }); 
  */


$('input[type="radio"]').click(function(){
    var $radio = $(this);

    // if this was previously checked
    if ($radio.data('waschecked') == true)
    {
        $radio.prop('checked', false);
        $radio.data('waschecked', false);
    }
    else
        $radio.data('waschecked', true);

    // remove was checked from other radios
    $radio.siblings('input[type="radio"]').data('waschecked', false);
});

    $(function() {
        $('input[name="crop"]').on('click', function() {
            if ($(this).val() == 'otherCrop') {
                $('#otherC').show();
            }
            else {
                $('#otherC').hide();
            }
        });
    });
    $(function() {
        $('input[name="institution"]').on('click', function() {
            if ($(this).val() == 'otherInstitution') {
                $('#otherI').show();
            }
            else {
                $('#otherI').hide();
            }
        });
    });

    $("#datasetstatus2").on("click", function(){
        $('input[name=datevendor]').val('N/A');
    });

    $("#datasetstatus1").on("click", function(){
        $('input[name=datevendor]').val('');
    });

    /*
    $('#result').click(function(){
        if (! validateform()) {
            $("#error").html("Please choose the crop!");
            $('#myModal').modal("show");
            return false;
        }
        return true;
    })
*/


});

function validateform(){
    var goodForm = true; //default is form is fine
    //check radio crop

    var radio_crop = document.getElementsByName('crop');
    console.log(radio_crop);
    if(!(radio_crop[0].checked
        || radio_crop[1].checked 
        || radio_crop[2].checked
        || radio_crop[3].checked
        || radio_crop[4].checked 
        || radio_crop[5].checked
        || radio_crop[6].checked
        || radio_crop[7].checked
        || radio_crop[8].checked
        || radio_crop[9].checked
    )){
        //if not, add the .error class/style
        //radio_crop[0].previousElementSibling.classList.add("error");
        //goodForm = false;
        alert("Please choose the crop!");
        //$("#error").html("Please choose the crop!");
        //$('#myModal').modal("show");
        return false;
    } else {
        //remove the class if it is ok, need this if user submits again
        //radio_crop[0].previousElementSibling.classList.remove("error");
       //}
        if (radio_crop[9].checked) {
            var othercrop = document.myform.othercrop.value; 
            if (othercrop==null || othercrop==""){  
                alert("Please enter other crop name!");  
            return false; 
            }
        //alert user on error, and return form validation status
        //if(!goodForm) alert("Please check the options highlighted in red")
        //return goodForm;
        } 
    }
    //check the institution
    var radio_institution = document.getElementsByName('institution');
    if(!(radio_institution[0].checked
        || radio_institution[1].checked 
        || radio_institution[2].checked
        || radio_institution[3].checked    
    )){
        alert("Please choose the institution!");
        return false;
    }else {
        if (radio_institution[3].checked) {
            var otherinstitution = document.myform.otherinstitution.value; 
            if (otherinstitution==null || otherinstitution==""){  
                alert("Please enter other institution name!");  
                return false; 
            }
        }
    }
    //check the environment
    var radio_environment = document.getElementsByName('environment');
    if(!(radio_environment[0].checked
        || radio_environment[1].checked 
        || radio_environment[2].checked
        || radio_environment[3].checked    
    )){
        alert("Please choose the environment!");
        return false;
    }             

    //check the release version
    var version = document.myform.version.value; 
    if (version==null || version==""){  
        alert("Please enter the release version!");  
        return false; 
    } 
    //check the project name
    var projectN = document.myform.projectN.value; 
    if (projectN==null || projectN==""){  
        alert("Please enter the project name!");  
        return false;
    } 
    //check the experiment name
    var experimentN = document.myform.experimentN.value; 
    if (experimentN==null || experimentN==""){  
        alert("Please enter the experiment name!");  
        return false;
    } 
    //check the dataset name
    var datasetN = document.myform.datasetN.value; 
    if (datasetN==null || datasetN==""){  
        alert("Please enter the dataset name!");  
        return false;
    } 
    //check the dataset status
    var radio_datasetstatus = document.getElementsByName('datasetstatus');
    if(!(radio_datasetstatus[0].checked
        || radio_datasetstatus[1].checked    
    )){
        alert("Please choose the dataset status!");
        return false;
    } 
    //check the number samples
    var numS = document.myform.Nsamples.value;
    if (numS == null || numS == ""){  
        alert("Please enter the number of the samples!"); 
        return false; 
    } else if(isNaN(numS)){
        alert("Number samples: enter numeric value only");
        return false;
        }
    //check the number markers                   
    var numM = document.myform.Nmarkers.value;
    if (numM == null || numM == ""){  
        alert("Please enter the number of the markers!");
        return false;  
    } else if(isNaN(numM)){
        alert("Number markers: enter numeric value only");
        return false;
        } 
    //check the dataset matrix loaded  
    var radio_dml = document.getElementsByName('dml');
    if(!(radio_dml[0].checked
        || radio_dml[1].checked   
        )){
            alert("Please choose yes or no!");
            return false;
        }  
    //check the matrix size
    var matrixsize = document.myform.matrixsize.value;
    if (matrixsize == null || matrixsize == ""){  
        alert("Please enter the matrix size!");
        return false;  
    } else if(isNaN(matrixsize)){
        alert("Matrix size: enter numeric value only");
        return false;
        }    
     
        // check datevendor date

    var datevendor = document.myform.datevendor.value;
    m_datevendor = moment(datevendor);
    if (radio_datasetstatus[0].checked && ! m_datevendor.isValid()){
        alert("Date of dataset matrix returned from vendor: please enter a valid date format (mm/dd/yyyy)"); 
        return false;
    }
    
    if ( moment().isBefore(datevendor) ) {
        alert("Date of dataset matrix returned from vendor can not be later than current date."); 
        return false;
    }

    /*datematrixl*/
    var datematrixl = document.myform.datematrixl.value;
    m_datematrixl = moment(datematrixl);
    if (! m_datematrixl.isValid()){
        alert("Date of dataset matrix loaded: please enter a valid date format (mm/dd/yyyy)"); 
        return false;
    }

    if ( moment().isBefore(datematrixl) ) {
        alert("Date of dataset matrix loaded can not be later than current date."); 
        return false;
    }

    //check the first name
    var fname = document.myform.fname.value; 
    if (fname==null || fname==""){  
        alert("Please enter your first name!");  
        return false;
    } 
     //check the last name
     var lname = document.myform.lname.value; 
    if (lname==null || lname==""){  
        alert("Please enter your last name!");  
        return false;
    }    

      // datesubmitted
    var datesubmitted = document.myform.datesubmitted.value;
    m_datesubmitted = moment(datesubmitted);
    if (! m_datesubmitted.isValid()){
        alert("Date submitted: please enter a valid date format (mm/dd/yyyy)"); 
        return false;
    }

    if ( moment().isBefore(datesubmitted) ) {
        alert("Date submitted can not be later than current date."); 
        return false;
    }
           //m_datevendor = moment(datevendor); 
           //m_datematrixl -- date loaded
           //console.log("test="+m_datesubmitted);
    //Date Loaded can not be earlier than Date Return Vendor
    if (m_datematrixl.isBefore(datevendor)){
        alert("Date of dataset matrix loaded can not be earlier than date of dataset matrix returned from vendor"); 
        return false;
    }

    if (m_datesubmitted.isBefore(datematrixl)){
        alert("Date of dataset matrix loaded can not be later than the date submitted");
        return false;
    }
    
    if (m_datesubmitted.isBefore(datevendor)){
        alert("Date of dataset matrix returned from vendor can not be later than the date submitted");
        return false;
    }
    
   
   
}        

