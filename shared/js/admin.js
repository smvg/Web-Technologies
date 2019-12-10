let old_email;
var content_ids = ['dashboard', 'accounts', 'rooms', 'location'];

function change_view(view) {
    $.redirect("admin.php", { page : view});
}

$(document).on('click', '.room-entry', function() {

    var room_id = $(this).attr('id').split('room-')[1];

    $.redirect("admin.php", { 
        page : 'room-edit', 
        id_room: room_id
    });
});

$(document).on('click', '.photo-entry', function() {

    var image = $(this)[0].attributes.src.nodeValue.replace("../shared/images/", "");
    
    $.redirect("admin.php", { 
        page : 'room-edit',
        id_room: window.current_room,
        action: 'delete-photo',
        photo: image
    });

});

$(document).on('click', '.edit-account', function() {
    old_email = $(this).parent().siblings('.email-table').text();
    $(this).parent().siblings('.email-table').html("<input class='input-email' type='email'>")
    $(this).parent().siblings('.psswd-table').html("<input class='input-password' type='password'>")
    $(this).removeClass('btn-secondary edit-account');
    $(this).addClass('btn-success update-account');
    $(this).html("Save")
    
});

$(document).on('click', '.delete', function() {

    var email = $(this).parent().siblings('.email-table').text();

    if (confirm("Are you sure you want to delete this account?")) {
        $.redirect("admin.php", { 
            page : 'accounts', 
            action: 'delete-account', 
            demail: email
        });
    }

});

$(document).on('click', '.update-account', function() {
    var email = $(this).parent().siblings('.email-table').find('.input-email')[0].value;
    var password = $(this).parent().siblings('.psswd-table').find('.input-password')[0].value;

    $.redirect("admin.php", { 
        page : 'accounts', 
        action: 'update-account', 
        'old-email': old_email,
        'update-email': email,
        'update-psswd': password
    });

});

$(document).ready(function() {

    $('#add-account').click(function() {
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
    button.innerHTML = "<a href='#' class='btn btn-secondary''>Edit</a>"

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