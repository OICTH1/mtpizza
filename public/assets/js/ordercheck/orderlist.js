function useIt() {

}

function getList(){
    var tbody = document.querySelector('tbody');
    tbody.innerHTML = "";
    $.get(url,function(data){
        Object.keys(data).forEach(function(idx){
            console.log(data[idx]);
            var content = document.querySelector('#order-template').content;
            var td_idx = content.querySelector('#idx');
            var td_date = content.querySelector('#date');
            var link = content.querySelector('#link');
            td_idx.textContent = data[idx].id;
            td_date.textContent = data[idx].order_date;
            var print_url = 'order/print/' + data[idx].id;
            link.href = print_url;
            document.querySelector('tbody').appendChild(
            document.importNode(content, true));

        });
    });
}
getList();
setInterval('getList()',5000);
