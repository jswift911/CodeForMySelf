$('.delete').click(function(){
    let res = confirm('Подтвердите действие');
    if(!res) return false;
});

$('.sidebar-menu a').each(function(){
    let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
    let link = this.href;
    if(link == location){
        $(this).parent().addClass('active');
        $(this).closest('.treeview').addClass('active');
    }
});
