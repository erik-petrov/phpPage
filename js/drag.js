function allowDrop(ev) {
    //запрещает типичное действие при переносе(открытие файла в новой вкладке) и в нашем случае позволяет выполнить перенос данных
    ev.preventDefault();
}
  
function drag(ev) {
    //сохраняет данные объекта, который переносится на данный момент
    ev.dataTransfer.setData("text", ev.target.id);
}
  
function drop(ev) {
    ev.preventDefault();
    if (ev.target.tagName == "IMG"){ return false; }
    //берет данные, которые мы сохранили когда взяли объект и записывает их в переменную
    var node = ev.dataTransfer.getData("text");
    //вставляет объект, который мы забрали внутрь того, куда передвинули файл
    ev.target.appendChild(document.getElementById(node));
    if(checkWin()){
        if (confirm("You've won.")){
            //тут мануально перезагружается страница. я так хочу.
            document.location.reload(true);
        } 
    }
}

function checkWin(){
    //берем все места для картинок
    var elements = document.getElementsByClassName("pic-placeholder");
    for (let i=0; i<12; i++){
        //если место нужное, то идем дальше, иначе либо ловим ошибку, либо неправильный слот.
        try{
            if (elements[i].firstChild.id == "img"+(i+1)){
                continue;
            } else { return false; }
        } catch (TypeError){
            return false;
        }
    }
    return true;
}