<div class="jqmConfirm" id="flashmsg">

    <div id="ex3b" class="jqmConfirmWindow">
    <div class="fecharModal jqmClose"><a href="#">close</a> or Esc Key</div>
        <p class="jqmConfirmMsg"></p>
        <div class="conteudoModal">
            <p style="text-align: center; font: bold 14px arial;"><?php echo $message; ?></p>
            <br class="all" />
            <img src="/img/bt-fechar.gif" alt="Fechar modal" class="pointer" onclick="$('#flashmsg').jqmAddClose('#flashmsg');" />
        </div>
    </div>
</div>
<script type="text/javascript">

$(document).ready(function() {
    $('#flashmsg').jqm({modal: true});
    $('#flashmsg').jqmShow();
});
</script>