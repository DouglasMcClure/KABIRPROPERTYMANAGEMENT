//Send Work Order
document.addEventListener('DOMContentLoaded', () => {
  let orderBtn = document.getElementById('sendWorkOrderBtn');
  const newOrder = $("#new-work-order-form");
  orderBtn.addEventListener('click', (e) => {
    if (newOrder[0].checkValidity()) {
      e.preventDefault();
      $("#sendWorkOrderBtn").val('Please Wait...');
      $.ajax({
        url: '../include/process.php',
        method: 'post',
        data: $("#new-work-order-form").serialize() + '&action=work_order',
        success: function (response) {
          $("#sendWorkOrderBtn").val('Created Order');
          $('body').removeClass('modal-open');
          Swal.fire({
            title: 'Order Sent Successfully!',
            type: 'success'
          }).then(r => {
            $("#new-work-order-form")[0].reset();
            $("#newOrderModal").modal().hide();
            $('.modal-backdrop').remove();
            location.reload();
            displayAllOrder();
          });
        }
      })
    }
  })
});

//Edit Order Of An User Ajax Request
$("body").on( "click", ".editBtn",function(e) {
  e.preventDefault();

  let edit_id = $(this).attr('id');

  $.ajax({
    url: '../include/process.php',
    method: 'post',
    data: { edit_id: edit_id },
    success:function (response){
      let data = JSON.parse(response);
      let id = data.id;
      let subject = data.subject;
      let details = data.details;
      $("#editId").val(id);
      $("#editSubject").val(subject);
      $("#editDetails").val(details);
    }
  })
})

//Update Order Of An User Ajax Request
$("#editWorkOrderBtn").on("click", function (e){
  if($("#edit-work-order-form")[0].checkValidity()){
    e.preventDefault();

    $.ajax({
      url: '../include/process.php',
      method: 'post',
      data: $("#edit-work-order-form").serialize()+"&action=update_order",
      success:function (response){
        console.log(response);
        Swal.fire({
          title: 'Order updated successfully!',
          type: 'success'
        }).then(r => {
          $("#edit-work-order-form")[0].reset();
          $("#editOrderModal").modal('hide');
          $('.modal-backdrop').remove();
          location.reload();
          displayAllOrder();
        });
      }
    })
  }
})

//Delete Order Of An User Ajax Request
$("body").on( "click", ".deleteBtn",function(e) {
  e.preventDefault();

  let del_id = $(this).attr('id');

  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: '../include/process.php',
        method: 'post',
        data: { del_id: del_id },
        success:function (response){
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          ).then((r)=>{
            location.reload();
            displayAllOrder();
          })
        }
      })
    }
  })
})

//Display Order Of An User In Details Ajax Request
$("body").on( "click",".infoBtn", function(e) {
  e.preventDefault();

  let info_id = $(this).attr('id');

  $.ajax({
    url: '../include/process.php',
    method: 'post',
    data: { info_id: info_id },
    success:function (response){
      let data = JSON.parse(response);
      Swal.fire({
        title: '<strong>Work Order : ID('+data.id+')</strong>',
        type: 'info',
        html: '<b>Subject : </b>'+data.subject+'<br><br><b>details : </b>'+data.details+'<br><br><b>Written On : </b>'+data.created_at+'<br><br><b>Updated On : </b>'+data.update_at,
        showCloseButton: true,
      }).then((r)=> {
        location.reload();
      })
    }
  })
})

displayAllOrder();
//Display all work orders of User
function displayAllOrder(){
  $.ajax({
    url: '../include/process.php',
    method: 'post',
    data: { action: 'display_orders' },
    success:function(response){
      $("#showOrder").html(response);
      $("#work-order-table").DataTable({
        order: [0, 'desc']
      });
    }
  })
}
