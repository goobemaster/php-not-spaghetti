function post(url, query) {
  xmlhttp = new XMLHttpRequest();
  xmlhttp.open("POST", url, true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send(query);
}

function publish(id, status) {
  if (status == true) {
    post('admin/api/publish', 'id=' + id);
  } else {
    post('admin/api/unpublish', 'id=' + id);
  }
}

function feature(id, status) {
  if (status == true) {
    post('admin/api/feature', 'id=' + id);
  } else {
    post('admin/api/unfeature', 'id=' + id);
  }
}

function remove_post(id) {
  if (confirm("Are you sure you want to delete the post?\n\nCaution! Deletion will be final and irreversible!") == true) {
    post('admin/api/delete', 'id=' + id);
    $("#post_" + id.toString()).detach();

    if ($("#post td").length == 0) {
      $("#post").detach();
      $(".admin").html("<p>There are no blog posts yet!</p>");
    }
  }
}