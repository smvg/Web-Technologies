var content_ids = ['dashboard', 'accounts', 'rooms', 'location'];

/*
function hide(value) {
    var content = document.getElementById(value);

    content.style.visibility = 'hidden';
};

function make_content_visible(id) {

    console.log("Entro en la funcion");

    var content = document.getElementById(id);

    content_ids.forEach(hide);

    content.style.visibility = 'visible';
    
};*/

function change_view(view) {
    $.redirect("admin.php", { page : view});
}


function swap_on_save(id) {
    var email = document.getElementById('email-' + id);
    var password = document.getElementById('password-' + id);
    var button = document.getElementById('button-' + id);

    email.innerHTML = "mark@email.com"
    password.innerHTML = "********"
    button.innerHTML = "<a href='#' class='btn btn-secondary' onclick='swap_on_edit(" + id + ")'>Edit</a>"

    alert('Account has been succesfully updated!');
};

function swap_on_edit(id) {
    
    var email = document.getElementById('email-' + id);
    var password = document.getElementById('password-' + id);
    var button = document.getElementById('button-' + id);

    email.innerHTML = "<input type='email'>"
    password.innerHTML = "<input type='password'>"
    button.innerHTML = "<a href='#' class='btn btn-success' onclick='swap_on_save(" + id + ")'>Save</a>"
};