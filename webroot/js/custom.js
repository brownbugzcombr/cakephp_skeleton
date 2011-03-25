function alert(msg) {
    $('#alert')
    .jqmShow()
    .find('p.jqmConfirmMsg')
    .html(msg)
    .end()
    .find(':submit:visible')
    .click(function(){
        if(this.value == 'yes')
            (typeof callback == 'string') ?
            window.location.href = callback :
            callback();
        $('#alert').jqmHide();
    });
}

$().ready(function() {
    $('#alert').jqm({
        overlay: 88,
        modal: true,
        trigger: false
    });
});

function gostei(post, gostar, sumir){
    $.ajax({
        type: "POST",
        url: '/posts/favoritar/'+post+'/'+gostar+'/',

        success: function(data) {
            if(data == 1){
                if(gostar == 1)
                    alert('Post adicionado aos favoritos');
                else
                    alert('Post removido dos favoritos');
                if(sumir == 1){
                    $('#post_'+post).hide();
                }
            }else{
                alert('Erro ao salvar, tente novamente');
            }
        }

    });
}

function votar(){
    $.getJSON(
        '/enquetes/votar/' + $('#valenquete').val(),
        function(data) {
            ii = 1;
            $.each(data.item, function(titulo, porcentagem){

                nameobj = '#p'+ii;
                nametitle = '#r'+ii;
                $(nameobj).progressBar(porcentagem, {
                    barImage: '/img/pbar/progressbg_green.gif'
                });
                $(nametitle).html( decodeURI(titulo));
                $('#resultadoenquete').hide();
                ii++;
            });
            $('#radiorespostas').hide();
            $('#btnenquete1').hide();
            $('#btnenquete2').hide();
            $('#resultadoenquete').show();
        }
        );
}

function resultado(){
    $.getJSON(
        '/enquetes/votar/' + $('#valenquete').val()+'/-1/',
        function(data) {
            ii = 1;
            $.each(data.item, function(titulo, porcentagem){

                nameobj = '#p'+ii;
                nametitle = '#r'+ii;
                $(nameobj).progressBar(porcentagem, {
                    barImage: '/img/pbar/progressbg_green.gif'
                });
                $(nametitle).html( decodeURI(titulo));
                ii++;
            });
            $('#radiorespostas').hide();
            $('#btnenquete1').css('display', 'none');
            $('#btnenquete2').css('display', 'none');
            $('#btnenquete3').css('display', '');
            $('#resultadoenquete').show();
        }
        );
}

function enquetevoltar(){
    $('#radiorespostas').show();
    $('#btnenquete1').css('display', '');
    $('#btnenquete2').css('display', '');
    $('#btnenquete3').css('display', 'none');
    $('#resultadoenquete').hide();
}