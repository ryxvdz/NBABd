window.addEventListener("DOMContentLoaded", function() {
    this.document.getElementById("tableSelect").addEventListener('change', function() {
        var table = this.value;
        window.location.href = '?tabela=' + encodeURIComponent(table);
        //window.location.reload();
    });
    this.document.getElementById("item").addEventListener('click', function() {

    });
});