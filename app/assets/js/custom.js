/*
 * Custom JS/jQuery file
 */

$(function(){
    
    //media_news_new JS
    $("#index_page_edit, #index_page_new").submit(function(event){
       
       //event.preventDefault();
       // alert("eeee");
       var heading1             = $(".red-title").html();
       var body1                = $("#body1").html();
       var heading2             = $(".red-title2").html();
       var body2                = $("#body2").html();
       
       $(this).find('input[name="heading1"]').val(heading1); 
       $(this).find('input[name="body1"]').val(body1); 
       $(this).find('input[name="heading2"]').val(heading2); 
       $(this).find('input[name="body2"]').val(body2);
       //
    });
    $('#save_page_content_form').click(function(event){
        $("#index_page_edit").submit();
    });
    
    $("#montages_edit_form").submit(function(event){
       var body  = $("#mon_body_edit").html();
       $(this).find('input[name="mon_body"]').val(body); 
    });
    $("#job_vac_edit_form").submit(function(event){
       var job_responsibilities  = $("#job_responsibilities").html();
       $(this).find('input[name="job_responsibilities"]').val(job_responsibilities);
       var job_requirements  = $("#job_requirements").html();
       $(this).find('input[name="job_requirements"]').val(job_requirements);
       var job_footer_content  = $("#job_footer_content").html();
       $(this).find('input[name="job_footer_content"]').val(job_footer_content);
    });
     $("#job_vac_add_form").submit(function(event){
       var job_responsibilities  = $("#job_responsibilities").html();
       $(this).find('input[name="job_responsibilities"]').val(job_responsibilities);
       var job_requirements  = $("#job_requirements").html();
       $(this).find('input[name="job_requirements"]').val(job_requirements);
       var job_footer_content  = $("#job_footer_content").html();
       $(this).find('input[name="job_footer_content"]').val(job_footer_content);
    });
      $("#montages_add_form").submit(function(event){
       var montage_banner_text  = $("#montage_banner_text").html();
       $(this).find('input[name="montage_banner_text"]').val(montage_banner_text);
       
    });
    //media_news Delete Multiple JS
    
    $(".deleteMultiple, .deleteAll").click(function(event)
    {
        if($(this).hasClass('deleteAll') == true){
            $('.deleteHidden').val('all')
        }else{
            $('.deleteHidden').val('')
        }
        
        //Submit media_news_list
        $(".selectionForm").submit();
        
    });
    
    $('input[name="selectionAll"]').change(function(){
        
        if($(this).is(':checked') == true){
            $('.selectionCheck').prop('checked', true);
        }else{
            $('.selectionCheck').prop('checked', false);
        }
        
    });
    
    $('.selectionCheck').change(function(){
        
        if($('.selectionCheck:checked').length == $('.selectionCheck').length){
            $('input[name="selectionAll"]').prop('checked', true);
        }else{
            $('input[name="selectionAll"]').prop('checked', false);
        }
        
    });
    
    $('.recordsPerPage').change(function(){

        var currentUrl = window.location.href;
        var regex = /limit=(\d+)/g;
        
        if(regex.test(currentUrl)){
            var newUrl = currentUrl.replace(regex, 'limit=' + $(this).val());
            window.location.href = newUrl;
        }else{
            var regexQues = /\?/g;
            if(regexQues.test(currentUrl)){
                
                if(/page=(\d+)/g.test(currentUrl)){
                    newUrl = currentUrl.replace(/page=(\d+)/g, 'limit=' + $(this).val());
                }
                
                window.location.href = newUrl;
                
            }else{
                var newUrl = currentUrl + '?limit=' + $(this).val();
                window.location.href = newUrl;
            }
            
        }
        //console.log(newUrl);
        
    });
    
    $('.newUrl').keyup(function(){
        
        if($(this).val().trim() == ''){
            $(this).closest('.form-group').addClass('has-error');
            $(this).closest('.form-group').find('.popover-validator').show();
        }else{
            $(this).closest('.form-group').removeClass('has-error');
            $(this).closest('.form-group').find('.popover-validator').hide();
        }
    });
    
    $('.web_scrapping_new_form').submit(function(event){
        
        var httpCHeckValue = httpcheckvalue2($('.newUrl').val());
        
        if( !checkURL2(httpCHeckValue) ){
            alert('Invalid URL entered');
            event.preventDefault();
        }
    });
    
    
    //selectNewsYear
    $('.selectNewsYear').change(function(){
        window.location.href = window.location.protocol 
                                    + "//" + window.location.host 
                                    + window.location.pathname 
                                    + '?year='+$(this).val();
    });
    
    //Publish Selected News
    $('.publishSelected').click(function(event){
        
        event.preventDefault();
        
        if($('.selectionCheck:checked').length > 0){
            var valueArray = $('.selectionCheck:checked').map(function(){
                return this.value;
            }).get();
            
            valueArray.join(',')
            window.location.href = window.location.protocol 
                                    + "//" + window.location.host 
                                    + '/admin/publishNews' 
                                    + '?publish='+valueArray;
        }
        
    });
    
});


function checkURL2(value) {
    //var urlregex = new RegExp("^(http|https|ftp)\://([a-zA-Z0-9\.\-]+(\:[a-zA-Z0-9\.&amp;%\$\-]+)*@)*((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|([a-zA-Z0-9\-]+\.)*[a-zA-Z0-9\-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\?\'\\\+&amp;%\$#\=~_\-]+))*$");
    var urlregex = /^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i;
    if (urlregex.test(value)) {
        return true;
    }
    return false;
}


function httpcheckvalue2(value) {

    if (/(^|\s)((https?:\/\/)+\.?(:\d+)?(\/\S*)?)/gi.test(value)) {
        return value;
    } else {
        return 'http://' + value;
    }
}