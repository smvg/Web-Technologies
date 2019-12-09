var content_ids = ['dashboard', 'accounts', 'rooms', 'location'];

function change_view(view) {
    $.redirect("admin.php", { page : view});
}
$(document).ready(function() {
    $('#add-account').click(function() {
        console.log("entro");
        var email = document.getElementById('add-email').value;
        var password = document.getElementById('add-psswd').value;

        $.redirect("admin.php", { page : 'accounts', action: 'add-account', 'add-email': email, 'add-psswd': password});
    });
});

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