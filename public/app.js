$(document).ready(function(){

    const ROOT = "http://localhost/Task_manager/";

    $("#tasks-button").click(function(){
        location.href = ROOT+"task/index";
    });

    $("#createtask-button").click(function(){
        location.href = ROOT+"task/create";
    });

    $("#register-button").click(function(){
        location.href = ROOT+"register/";
    });

    $("#login-button").click(function(){
        location.href = ROOT+"login/";
    });

    $("#cancel-button").click(function(){
        location.href = ROOT+"task/index";
    });

    $("#create-button").click(function(){
        let name = $("#task-name").val();
        let description = $("#task-description").val();
        let taskdataCreate = { name, description };

        $.ajax({
            url: ROOT+'ajax.php',
            method: 'POST',
            data: {taskdataCreate},
            success: function(response){
                location.href = ROOT+"task/index";
           }
        });
    });

    $("#exit-button").click(function(){

        $.ajax({
            url: ROOT+'ajax.php',
            method: 'POST',
            data: {logout: "logout"},
            success: function(response){
                if (response)
                    location.href = ROOT+"login/";
            }
        });
    });

    $(".edit-button").click(function(){
        let element = $(this)[0].parentElement.parentElement;
        let title = $(element).children().children()[0];
        let idEdit = $(title).attr("taskId");
        $.post(ROOT+'ajax.php', {idEdit}, function(response){
            if (response)
                location.href = ROOT+"task/edit";
        });
    });

    $("#update-button").click(function(){
        let name = $("#task-name").val();
        let description = $("#task-description").val();
        let taskdataEdit = { name, description };

        $.ajax({
            url: ROOT+'ajax.php',
            method: 'POST',
            data: {taskdataEdit},
            success: function(response){
                location.href = ROOT+"task/index";
           }
        });
    });

    $(".delete-button").click(function(){
        let element = $(this)[0].parentElement.parentElement;
        let title = $(element).children().children()[0];
        let idDelete = $(title).attr("taskId");
        $.post(ROOT+'ajax.php', {idDelete}, function(response){
            if (response){
                location.href = ROOT+"task/index";
            }
        });
    });

});