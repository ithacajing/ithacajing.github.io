
$(document).ready(function(){
    //check the form
    /*function validate() {
        if(document.getElementByName("crop").checked = true){
           alert( "Please choose a certain crop!" );
           document.myForm.crop.focus() ;
           return false;
        }
        if( document.myForm.othercrop.value == "" ) {
           alert( "Please enter the other crop name!" );
           document.myForm.othercrop.focus() ;
           return false;
        }
        /*if( document.myForm.EMail.value == "" ) {
           alert( "Please provide your Email!" );
           document.myForm.EMail.focus() ;
           return false;
        }
        if( document.myForm.Zip.value == "" || isNaN( document.myForm.Zip.value ) ||
           document.myForm.Zip.value.length != 5 ) {
           
           alert( "Please provide a zip in the format #####." );
           document.myForm.Zip.focus() ;
           return false;
        }
        if( document.myForm.Country.value == "-1" ) {
           alert( "Please provide your country!" );
           return false;
        }
        return( true );
     }
     */


    //checked and unchecked the radio button             
    //if clicked the historical data, set the date sent by vendor to N/A
    $('#otherC').hide();
    $('#otherI').hide();

     $('input[type=radio]').click(function(){
        if (this.previous) {
            this.checked = false;
        }
        this.previous = this.checked;
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

});
