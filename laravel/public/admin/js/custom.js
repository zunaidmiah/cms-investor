/*
 * Custom JS/jQuery file
 */

$(function(){
    
    //All items with class displaynone should hide
    $('.displaynone').hide();
    
    //media_news_new JS
    $("#media_news_new, #media_news_edit").submit(function(event){
       
       //event.preventDefault();
       
       var redTitle             = $(".red-title").html();
       var headlineEditor       = $(".headlineEditor").html();
       var footerEditor         = $(".footerEditor").html();
       var contentEditor        = $(".contentEditor").html();
       
       $(this).find('input[name="title"]').val(redTitle); 
       $(this).find('input[name="heading"]').val(headlineEditor); 
       $(this).find('input[name="footer"]').val(footerEditor); 
       $(this).find('input[name="content"]').val(contentEditor);
       
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
            $('.alert.alert-danger.alert-dismissable.displaynone').hide();
        }else{
            $('.selectionCheck').prop('checked', false);
        }
        
    });
    
    $('.selectionCheck').change(function(){
        
        if($('.selectionCheck:checked').length == $('.selectionCheck').length){
            $('input[name="selectionAll"]').prop('checked', true);
            $('.alert.alert-danger.alert-dismissable.displaynone').hide();
        }else{
            $('input[name="selectionAll"]').prop('checked', false);
            $('.alert.alert-danger.alert-dismissable.displaynone').hide();
        }
        
    });
    
    $('.recordsPerPage').change(function(){

        var currentUrl = window.location.href;
        var regex = /limit=(\d+)/g;
        
        if(regex.test(currentUrl)){
            
            var regexQues = /\?/g;
            if(regexQues.test(currentUrl)){
                
                if(/page=(\d+)/g.test(currentUrl)){
                    currentUrl = currentUrl.replace(/page=(\d+)&/g, '');
                }
                newUrl = currentUrl.replace(regex, 'limit=' + $(this).val());
                window.location.href = newUrl;
                
            }else{
                var newUrl = currentUrl.replace(regex, 'limit=' + $(this).val());
                window.location.href = newUrl;
            }
            
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
    
    
    $('.mediaPagi ul li:not(.active) a').click(function(event){
        
       // event.preventDefault();
        
        var currentUrl = window.location.href;
        var regex = /limit=(\d+)/g;
        
        if(regex.test(currentUrl)){
            var newUrl = $(this).attr('href')+'&'+currentUrl.match(regex)[0];
            window.location.href = newUrl;
        }
        
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
    
    //Validation for Multiple select delete news
    $('#deleteMultipleTriger').click(function(event){
        if($('.selectionCheck:checked').length == 0){
            $('.alert.alert-danger.alert-dismissable.displaynone').show();
            $('.alert.alert-danger.alert-dismissable.displaynone p').html('Please select at least one item to delete.');
            event.preventDefault();
            event.stopPropagation();
        }else{
            $('.alert.alert-danger.alert-dismissable.displaynone').hide();
        }
    });
    
    $('.alert.alert-danger.alert-dismissable.displaynone .close').click(function(event){
        $(this).closest('.displaynone').hide();
        event.preventDefault();
        event.stopPropagation();
    });
    
    $('.tools .fa.fa-refresh').click(function(event){
        window.location.reload();
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

$(document).ready(function () {
    
    $('.add_new_email').on('click',function(e){
        e.preventDefault();
        var html = '<div class="form-group"><label class="col-md-3 control-label">Email Address</label><div class="col-md-6"><input type="text" class="form-control email_news_select"></div></div>';
        $('.more-email-container').append(html)

    });
    
    //validate email
    $('.email_news_select').on('blur',function(){
        if(!isValidEmailAddress($(this).val())){
            alert('Please fill valid email address');
        }
    });

    function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    };

    $(document).on('click', '.check_selected_news', function(e){
        e.preventDefault();
        var var_news_ids = $('.selectionCheck:checked').map( function() { return this.value; }).get().join(",");
        if(var_news_ids == ''){
            alert('Please select the news.');
        }else{
            $('#modal-select-email').modal();
        }
    })

    $(document).on('click','.send_news_email_btn' ,function (e) {
        
        e.preventDefault();
       

        var var_email_ids = $('.email_news_select').map( function() { return this.value; }).get().join(",");
        var var_news_ids = $('.selectionCheck:checked').map( function() { return this.value; }).get().join(",");
        if(var_email_ids =='' | var_news_ids ==''){
            alert('Please fill email address');
            return false;
        }
      
        // $("#maindiv").after(spinner.el);
          $.blockUI({
    theme: true,
    baseZ: 2000,
    message : '<h4>Just a moment...</h4>'
})
        $.post( "media_news_send_emails",{ email_ids: var_email_ids, news_ids: var_news_ids }, function( result ) {
            if(result){
                $.unblockUI();
            
              window.location.reload();
            }else{
                  $.unblockUI();
                alert('Please try again.');
            }
            
        });
        
    })

});