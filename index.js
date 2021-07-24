  /* Кнопка Очистить */ 
function clearAll() {
    fetch('clear.php')
    .then(function(response){
        if (response.status >= 200 && response.status < 300) {  
            console.log('clear all') 
          }
    })
    let item = document.getElementsByClassName('item__add');
    while(item.length) {
      item[0].remove();
    }
    let item__save = document.getElementsByClassName('item__save');
    while(item__save.length) {
      item__save[0].remove();
    } 
  }
  /* Кнопка Добавить */
function add() {
    let ident = Date.now();
    let item = document.createElement('div');
    item.className = "item__add";
    item.id = ident;
    let name = document.createElement('input');
    name.className = "item__name";
    name.placeholder = "Наименование";
    name.id = "item__name" + ident;
    item.append(name);
    let count = document.createElement('input');
    count.className = "item__count";
    count.placeholder = "Количество";
    count.id = "item__count" + ident;
    item.append(count);
    let comment = document.createElement('input');
    comment.className = "item__comment";
    comment.placeholder = "Комментарий";
    comment.id = "item__comment" + ident;
    item.append(comment);
    let save = document.createElement('button');
    save.className = "btn__save";
    save.innerHTML = "Сохранить";
    let btn_ident = "button_save(" + ident + ")";
    save.setAttribute('onclick',btn_ident);
    item.append(save);
    document.body.append(item);
  }
  /* Кнопка Сохранить */
function button_save(ident) {
  let save__item = document.createElement('div');
  save__item.className = "item__save";
  save__item.id = "item__save" + ident;
  let save__name = document.getElementById('item__name' + ident);
  let save__count = document.getElementById('item__count' + ident);
  let save__comment = document.getElementById('item__comment' + ident);
  /* проверка что количество число */
  if (!isNaN(save__count.value)) {
    save__item.innerHTML = save__name.value + " " + save__count.value + " шт. (" + save__comment.value + ")";
    let buy = document.createElement('button');
    buy.className = "btn__buy";
    buy.innerHTML = "Куплено";
    let buy_ident = "button_buy(" + ident + ")";
    buy.setAttribute('onclick', buy_ident);
    save__item.append(buy);
    let del = document.createElement('button');
    del.className = "btn__del";
    del.innerHTML = "Удалить";
    let del_ident = "button_del(" + ident + ")";
    del.setAttribute('onclick', del_ident);
    save__item.append(del);
    document.body.append(save__item);
    let item = document.getElementById(ident);
    item.remove();
    /* Отправка данных для добавления в таблицу */
    let data = {
      name: save__name.value,
      count: save__count.value,
      comment: save__comment.value,
      item: ident
    };      
    fetch('add_item.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json;charset=utf-8'
      },
      body: JSON.stringify(data)
    }).then(response => response.json()).then((data) =>  console.log(data))
  }
  else {
    alert('Количество не число');
  }         
}
/* Кнопка Удалить */
function button_del(ident) {
  let item__del = document.getElementById('item__save' + ident);
  item__del.remove();
  let data = {
    item: ident
  };      
  fetch('del_item.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=utf-8'
    },
    body: JSON.stringify(data)
  }).then(response => response.json()).then((data) =>  console.log(data))
}
        
/*- Кнопка Куплено */
function button_buy(ident) {
  let item__buy = document.getElementById('item__save' + ident);
  item__buy.style.textDecoration = "line-through";
  let data = {
    item: ident
  };      
  fetch('buy_item.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json;charset=utf-8'
    },
    body: JSON.stringify(data)
  }).then(response => response.json()).then((data) =>  console.log(data))
}
        
