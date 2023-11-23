$( document ).ready(function() {
    let formProduct = $('#formProduct')
    
    $("#saveitem").on("click", function(){
        $( this ).attr("disabled", true);        
        let dataFormFields = $(formProduct).serialize();
        $.ajax({
            type: "POST",
            url: "ajax/table.php",
            data:dataFormFields+'&action=add',
            success: function(response) {
                // Обработка успешного ответа сервера
                console.log(response);
                $( this ).attr("disabled", false);
                 let resultItem = $.parseHTML(response);
                 console.log(resultItem)
                $("tr").prepend(resultItem);
            },
            error: function(error) {
                // Обработка ошибки
                console.log(error);
            }
        });
    });

    $(".delete").on("click", function(){
        let id = $( this ).attr("data-id");        
        let dataFormFields = $(formProduct).serialize();
        let parentItem = $( this ).parents("tr");
        $.ajax({
            type: "POST",
            url: "ajax/table.php",
            data:'&ID='+id+'&action=delete',
            success: function(response) {
                // Обработка успешного ответа сервера
                console.log(response);
                $(parentItem).remove();
            },
            error: function(error) {
                // Обработка ошибки
                console.log(error);
            }
        });
    });

});