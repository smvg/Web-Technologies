let old_email;
var content_ids = ['dashboard', 'accounts', 'rooms', 'location'];
var collapsed = false;

function collapse_menu(arg) {

    var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

    if (arg) {
        var sidebar = document.getElementById("sidebar-admin");
        sidebar.style.transform = "translate(0%, 0%)";

        var toggle = document.getElementById("collapse");
        toggle.style.left = (width < 1100) ? "6%" : "12%";

        var content = document.getElementsByClassName("content");
        content[0].style.left = "15%";
        content[0].style.width = "85%";
    }
    else {
        var sidebar = document.getElementById("sidebar-admin");
        sidebar.style.transform = "translate(-100%, 0%)";

        var toggle = document.getElementById("collapse");
        toggle.style.left = "-0.5%";

        var content = document.getElementsByClassName("content");
        content[0].style.left = "0%";
        content[0].style.width = "100%";
    }
}

document.addEventListener("DOMContentLoaded", function(){

    var dashboard = document.getElementsByClassName('content')[0];
    var mc = new Hammer(dashboard);
    mc.on("swipeleft swiperight", function(ev) {
        if (ev.type === "swiperight") {
            collapse_menu(true)
            collapsed = true;
        }
        else {
            collapse_menu(false)
            collapsed = false;
        }
    });
});


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

$(document).on('click', '#collapse', function() {

    if (collapsed) collapse_menu(false)
    else collapse_menu(true)

    collapsed = !collapsed;
})

$(document).on('click', '.photo-entry', function() {

    var attr = $(this).find('input').attr('checked')

    if (typeof attr !== typeof undefined && attr !== false) {
        $(this).find('.icon-background, .delete').css("visibility", "hidden");
        $(this).find('input').removeAttr('checked');
    }
    else {
        $(this).find('.icon-background, .delete').css("visibility", "visible");
        $(this).find('input').attr('checked', '');
    }

});

$(document).on('click', '#update-account-modal', function() {

    var email = $('#edit-email-modal')[0].value;
    var password = $('#edit-psswd-modal')[0].value;

    if (email === '' || password === '') {
        return;
    }

    old_email = old_email.trim();

    $.redirect("admin.php", { 
        page : 'accounts', 
        action: 'update-account', 
        'old-email': old_email,
        'update-email': email,
        'update-psswd': password
    });

});


$(document).on('click', '.edit-account', function() {
    var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

    old_email = $(this).parent().siblings('.row-data-email').text();

    if (width < 1000) {
        document.getElementById('edit-email-modal').value = old_email;
        $('#modal-edit').modal('show')
    }
    else {
        var save_btn = "<a href='#' style='margin:auto; display:inline-block; color: inherit' class='update-account'><i class='fa fa-floppy-o'></i></a>"
        var cancel_btn = "<a href='#' style='margin-left:10px; display:inline-block; color: inherit' class='cancel-edit'><i class='fa fa-undo'></i></a>"

        $(this).parent().siblings('.row-data-email').html("<input autocomplete='off' style='width: match-parent' class='input-email' type='email' value='" + old_email + "'>")
        $(this).parent().siblings('.row-data-password').html("<input autocomplete='off' style='width: match-parent' class='input-password' type='password'>")

        $(this).parent().html(save_btn + cancel_btn)
    }
    
});

$(document).on('click', '.delete-account', function() {

    var email = $(this).parent().siblings('.row-data-email').text().trim();
    console.log(email);
    if (confirm("Are you sure you want to delete this account?")) {
        $.redirect("admin.php", { 
            page : 'accounts', 
            action: 'delete-account', 
            demail: email
        });
    }

});

$(document).on('click', '.update-account', function() {
    var email = $(this).parent().siblings('.row-data-email').find('.input-email')[0].value;
    var password = $(this).parent().siblings('.row-data-password').find('.input-password')[0].value;

    var old_email = $(this).parent().siblings('.row-data-email').find('.input-email')[0].attributes.value.nodeValue.trim();

    if (email === '' || password === '') {
        return;
    }

    $.redirect("admin.php", { 
        page : 'accounts', 
        action: 'update-account', 
        'old-email': old_email,
        'update-email': email,
        'update-psswd': password
    });

});

$(document).on('click', '.cancel-edit', function() {

    var email = $(this).parent().siblings('.row-data-email').find('.input-email')[0].attributes.value.nodeValue
    $(this).parent().siblings('.row-data-email').html(email)
    $(this).parent().siblings('.row-data-password').html("*****")

    $(this).parent().html("<a href='#' style='margin:auto; display:inline-block; color: inherit' class='edit-account'><i class='fa fa-pencil'></i></a>")

});

$(document).on('click', '.go-back-rooms', function() {
    $.redirect("admin.php", { page : 'rooms'});
});

$(document).ready(function() {

    $('#add-account').click(function() {
        var email = document.getElementById('add-email').value;
        var password = document.getElementById('add-psswd').value;

        $.redirect("admin.php", { page : 'accounts', action: 'add-account', 'add-email': email, 'add-psswd': password});
    });
});

var inactivityTime = function () {
    var time;
    window.onload = resetTimer;
    // DOM Events
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;

    function logout() {
        location.href = 'admin.php?logout=true';
    }

    function resetTimer() {
        clearTimeout(time);
        time = setTimeout(logout, 5*60000)
        // 1000 milliseconds = 1 second
    }
};

window.onload = function() {
    inactivityTime();
}