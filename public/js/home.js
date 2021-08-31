$(document).ready(function () {
  
    get_dashoard();
    $(document).on('click','.add_expense',function(){
      
      get_add_expense_page();
    });
});
function get_dashoard() {
  $.ajax({
    url: "/get_dashoard",
    dataType: "json",
    beforeSend: function () {
      //something before send
    },
    success: function (data) {
      if (data.status) {
        $(".trap_wrapper").html(data.html);
      }
    },
  });
}
function get_add_expense_page() {
  $.ajax({
    url: "/add_expense_page",
    dataType: "json",
    beforeSend: function () {
      //something before send
    },
    success: function (data) {
      if (data.status) {
        $(".trap_wrapper").html(data.html);
        validate($("#add_fraud"), "", false, "saveExpense");
      }
    },
  });
}

function saveExpense() {
  let formdata = $("#add_fraud").serializeArray();

  formdata.push({
    name: "_token",
    value: $('meta[name="csrf-token"]').attr("content"),
  });
  $.ajax({
    url: "/saveExpense",
    type: "POST",
    data: formdata,
    dataType: "json",
    beforeSend: function () {
      //something before send
      $("button").attr("disabled", true);
    },
    success: function (data) {
      if (data.status) {
        alertify.success(data.msg);
        setTimeout(() => {
          location.reload();
        }, 5000);
      } else {
        $("button").attr("disabled", false);
        alertify.error(data.msg);
      }
    },
  });
}
