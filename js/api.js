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

