/*********************** js code for api setting form page ******************************/
jQuery(document).ready(function(){
    
/****************** Validate form ******************/    
    jQuery("#reputation_bug_form").validate({
            rules:{
                key:
                {
                    required:true,
                    minlength:32,
                    maxlength:32
                },
                scroll_limit:
                {
                    required:true,
                    digits:true,
                    maxlength:2
                },
                reviews:
                {
                    required:true,
                    digits:true,
                    maxlength:2
                },
                thershold:
                {
                    required:true,
                    digits:true,
                    maxlength:1
                }
            },
            messages:{
                key: {
                    required:"API key required",
                    minlength: "Please enter valid API",
                    maxlength: "Please enter valid API"
                },
                scroll_limit: {
                    required:"Please enter widget scroll limit",
                    digits:"Please enter numbers only",
                    maxlength:"Please enter valid limit lenght"
                },
                reviews: {
                    required:"Please enter number of reviews per page limit",
                    digits:"Please enter numbers only",
                    maxlength:"Please enter valid limit lenght"
                },
                thershold:{
                    required:"Please enter threshold value",
                    digits:"Please enter numbers only",
                    maxlength:"Please enter valid threshold value"
                }       
            }
        });
});