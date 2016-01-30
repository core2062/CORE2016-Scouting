$(document).ready(function () {
   $(".css-checkbox").click(function () {
       if ($(this).attr('id') == "one") {
           $('#a').show();
           $('#b').hide();
           $("#myForm").attr('action','one.php');
       } else {
           $('#a').hide();
           $('#b').show();
           $("#myForm").attr('action','two.php');
       }
   });
});