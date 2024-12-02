$(document).ready(function () {
  $.ajax({
    url: "api.php",
    method: "POST",
    data: {
      action: "getProvince",
    },
    success: function (response) {
      var jsonData = JSON.parse(response);
      // console.log(jsonData);
    },
  });
});
