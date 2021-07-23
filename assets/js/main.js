$(document).ready(function () {});
$("#sos-form").submit(function () {
  d = $(this).serializeArray();
  var sdata = new Array();
  $.each(d, function (i, field) {
    sdata[field.name] = field.value;
  });
  $.ajax({
      url: 'submit.php',
      type: 'post',
      data: {
          csrf: sdata["csrf-token"],
          name: sdata.name,
          contact: sdata.contact,
          content: sdata.content
      },
      headers: { 
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      success: function(res){
        mdui.snackbar(res, {
          position: 'right-top'
        });
        console.log('Success');
      },
  });

  return false;
});
