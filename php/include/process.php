<?php
require_once "../include/session.php";

//Handle New Work Order Ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'work_order'){
  $subject = $currentUser->test_input($_POST['subject']);
  $details = $currentUser->test_input($_POST['details']);

  $currentUser->create_new_work_order($cid, $subject, $details);
}

//Handle Display All Orders Of An User
if (isset($_POST['action']) && $_POST['action'] == 'display_orders'){
  $output = '';

  $orders = $currentUser->get_orders($cid);

  if($orders){
    $output .= '<table class="table table-striped text-center" id="work-order-table">
          <thead>
          <tr>
            <th>#</th>
            <th>Subject</th>
            <th>Details</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>';
    foreach ($orders as $row){
      $output .= '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['subject'].'</td>
            <td>'.substr($row['details'], 0, 75).'...</td>
            <td>
              <a href="#" id="'.$row['id'].'" title="View Details" class="text-success infoBtn" data-bs-toggle="modal" data-bs-target="#viewOrderModal" style="text-decoration: none;">
                <i class="fa-sharp fa-solid fa-circle-info fa-lg"></i>
              </a>&nbsp;
              <a href="#" id="'.$row['id'].'" title="Edit Work Order" class="text-primary editBtn" data-bs-toggle="modal" data-bs-target="#editOrderModal" style="text-decoration: none;">
                <i class="fa-sharp fa-solid fa-pen-to-square fa-lg"></i>
              </a>&nbsp;
              <a href="#" id="'.$row['id'].'" title="Delete Work Order" class="text-danger deleteBtn" style="text-decoration: none;">
                <i class="fa-sharp fa-solid fa-trash fa-lg"></i>
              </a>&nbsp;
            </td>
          </tr>';
    }
    $output .='</tbody></table>';
    echo $output;
  }
  else{
    echo '<h3 class="text-center text-secondary">:) You have not submitted any orders yet</h3>';
  }
}

//Handle Edit Order Of An User Ajax Request
if (isset($_POST['edit_id'])){
  $id = $_POST['edit_id'];

  $row = $currentUser->edit_order($id);
  echo json_encode($row);
}

//Handle Update Order Of An User Ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'update_order'){
  $id = $currentUser->test_input($_POST['editId']);
  $subject = $currentUser->test_input($_POST['subject']);
  $details = $currentUser->test_input($_POST['details']);
  $currentUser->update_order($id, $subject, $details);
}

//Handle Delete Order Of An User Ajax Request
if(isset($_POST['del_id'])){
  $id = $_POST['del_id'];

  $currentUser->delete_order($id);

}

//Handle Display Of An Order Of An User Ajax Request
if(isset($_POST['info_id'])) {
  $id = $_POST['info_id'];

  $row = $currentUser->edit_order($row);

  echo json_encode($row);
}
