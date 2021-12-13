var snack = $('#snack')
var btn = $('#addUser')
var newInputs;
var page = 0;
var filter;

function showToast(message) {
    snack.text(message)
    var x = document.getElementById('snackbar')
    x.className = "show"
    setTimeout(function() {
        x.className = x.className.replace("show", "")
    }, 3000)
}

function showLoader() {
    $('#content').html("<img src='assets/images/lazy-loader.gif' class='image-center' alt='Content Loading Gif'>")
}

function loadContent(path) {
    $.post(path, function(data, status) {
        if (status == "success")
            $('#content').html(data)
        else
            $('#content').html('Algo correu mal')
    })
}

function seeUsers() {
    showLoader()
    loadContent("assets/view/user_index.php")
}

function addUser() {
    showLoader()
    loadContent("assets/view/add_user.php")
}

function editUser(param) {
    showLoader()
    $.post('assets/view/add_user.php', {
        id: param
    }, function(data, status) {
        if (status == "success") {
            $('#content').html(data)
        } else
            $('#content').html('Algo correu mal')
    })
}

function deleteUser(param) {
    showLoader()
    $.post('assets/view/delete_user.php', {
        id: param
    }, function(data, status) {
        if (status == "success") {
            seeUsers()
        } else
            $('#content').html('Algo correu mal')
        showToast(data)
    })
}

$('#search').click(function() {
    var input = $('#textarea').val();
    if (input.trim().length > 0) {
        showLoader()
        $.post('assets/view/user_index.php', {
            q: input
        }, function(data, status) {
            if (status == "success")
                $('#content').html(data)
            else
                $('#content').html('Algo correu mal')
        })
    } else {
        showToast('Campo vazio')
    }
    $('#textarea').val("")
})

function filterUser(path, param) {
    showLoader()
    $.post(path, {
        f: param
    }, function(data, status) {
        if (status == "success")
            $('#content').html(data)
        else
            $('#content').html('Algo correu mal')
    })
}

function isValidated() {
    let valid = true
    let inputs = Array($('#firstName'),
        $('#lastName'),
        $('#genre'),
        $('#age'),
        $('#phone'),
        $('#city'))
    let formControls = Array($('#fnError'),
        $('#lnError'),
        $('#gError'),
        $('#iError'),
        $('#aError'),
        $('#cError'))
    let allControls = Array(Array(formControls[0], inputs[0]),
        Array(formControls[1], inputs[1]),
        Array(formControls[2], inputs[2]),
        Array(formControls[3], inputs[3]),
        Array(formControls[4], inputs[4]),
        Array(formControls[5], inputs[5]))
    for (let index = 0; index < allControls.length; index++) {
        if (allControls[index][1].length <= 0 || allControls[index][1].val() <= 0) {
            valid = false
            allControls[index][0].removeClass('invisible')
        } else {
            allControls[index][0].addClass('invisible')
            newInputs = inputs;
        }
    }
    return valid
}

function newUser(param) {
    if (isValidated()) {
        let path
        showLoader()
        if (param != 0)
            path = "assets/view/update_user.php"
        else
            path = "assets/view/new_user.php"
        $.post(path, {
            id: param,
            frstName: newInputs[0].val(),
            lstName: newInputs[1].val(),
            genre: newInputs[2].val(),
            age: newInputs[3].val(),
            phone: newInputs[4].val(),
            city: newInputs[5].val()
        }, function(data, status) {
            if (status == "success") {
                seeUsers()
                showToast(data)
            } else
                $('#content').html('Algo correu mal')
        })
    }
}
function getMoreContentFromAjax(page) {
    $.post("assets/view/get_content.php",
        {page:page}, 
        function (data, status) {
            if(status == "success"){
                $("#content").append(data);
            }
        }
    )
}
$("#content").scroll(function(){
    if($(window).scrollTop() + $("#content").height() >= $("#content").height()){
        page += 1;
        getMoreContentFromAjax(page)
        console.log("Scrolled")
    }
})
function filterInfo(param) {
    filterUser('assets/view/user_index.php', param)
    setting = { "filter": param }
    myJSON = JSON.stringify(setting)
    localStorage.setItem("settings", myJSON)
}

$(document).ready(function() {
    setting = localStorage.getItem("settings")
    param = JSON.parse(setting)
    if (param > 0 || param != null) {
        filter = param.filter
        filterUser('assets/view/user_index.php', param.filter)
    } else
        seeUsers()
})