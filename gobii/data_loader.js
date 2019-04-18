//alert("hello");
//checked and unchecked the radio button             
//if clicked the historical data, set the date sent by vendor to N/A
$(document).ready(function(){
    
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
