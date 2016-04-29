$(".dynamicform_wrapper2").on("beforeInsert", function(e, item) {
    console.log("beforeInsert");
});

$(".dynamicform_wrapper2").on("afterInsert", function(e, item) {
    console.log("afterInsert");
});

$(".dynamicform_wrapper2").on("beforeDelete", function(e, item) {
    if (! confirm("Você deseja mesmo excluir este item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper2").on("afterDelete", function(e) {
    console.log("Item excluído!");
});

$(".dynamicform_wrapper2").on("limitReached", function(e, item) {
    alert("Limite de itens atingido.");
});