const $input = document.querySelector('#inputAdd');
const $botton = document.querySelector('#add');
let $content = document.querySelector('#content');
let ul = document.querySelector('#ul');
const $main = document.querySelector('#main');
let completeTodo = [];
let todo=[];
let form=null;
let  value = 0;


//complete
let active = null;
let all = null;

let complete = () =>{
    const view = 
    `
    <div class="contaiener" id="contentComplete">
        <button class="btnDeleted all" id="delete" onclick="empty()">delete all</button>
    </div>
    `;
    return view;
}
let template = ()=>{
    const view =
    ` <div class="contaiener" id="content">
      </div>
    `;
    return view;
}



/*$botton.addEventListener('click', () => {
    const node = document.createElement('label');
    const check = document.createElement('input');
    const span = document.createElement('span');
    check.className ='checkbox';
    span.innerHTML = $input.value;
    span.className = 'text';
    node.setAttribute('value', value );
    value = value + 1;
    node.appendChild(check);
    node.append(span);
    check.type="checkbox";
    $content.appendChild(node);

    todo.push(node);


    for (let i = 0; i < $content.children.length; i++) {
        $content.children[i].addEventListener('click', click);
    }  
   

}) */
function add() {
    debugger;
    const node = document.createElement('label');
    const check = document.createElement('input');
    const span = document.createElement('span');
    check.className ='checkbox';
    span.innerHTML = $input.value;
    span.className = 'text';
    node.setAttribute('value', value );
    value = value + 1;
    node.appendChild(check);
    node.append(span);
    check.type="checkbox";
    $content.appendChild(node);

    todo.push(node);
    console.log($content);
    $main.appendChild($content);


    for (let i = 0; i < $content.children.length; i++) {
        $content.children[i].addEventListener('click', click);
    }  
}

function click() { 
    this.classList.toggle('checkActive');
    const valor = this.getAttribute('value');
   let aux =  completeTodo.some(element => element.getAttribute('value') === valor ); 
   let indice;
   debugger;
    if(aux){
        indice = completeTodo.indexOf(this);
        todo.push(this);
        completeTodo[indice] = 0;
    }else{
        indice = todo.indexOf(this);
        completeTodo.push(this);
        todo[indice] = 0;
    }
}

for(let i = 0; i < 3; i++){
    console.log(ul.children[i]);
    ul.children[i].addEventListener('click', router);
}




function router (){
    const valor = this.value;

    if(valor == '1'){
        remove(valor);
        debugger;
        if(form !== null){
            reset(1); 
        }
        
        for (const element in completeTodo) {
            if (completeTodo.length > 0) {
                $content.appendChild(completeTodo[element]);
            }
        }
        for (const key in todo) {
            if (todo.length > 0) {
                $content.appendChild(todo[key]);
            }
        }
        all=$content;
    }
    if(valor == '2'){
        remove(valor);
        debugger;
        if(form !== null){
            reset(2);
        }
        for (const key in completeTodo) {
            if(todo.length>-1){
                $content.removeChild(completeTodo[key]);
            } 
        }
        for (const key in todo) {
            if (todo.length > 0) {
                $content.appendChild(todo[key]);
            }
        }
        active=$content;
    }
    if(valor == '3'){
        remove(valor);
        form = document.querySelector('#formInput');
        $main.innerHTML = complete();
       
        let $complete = document.querySelector('#contentComplete')
        for (const key in completeTodo) {
            $complete.appendChild(completeTodo[key]);  
        }
    }
    debugger;

}
function reset(value) {
    $main.firstChild.remove();
    debugger;
    $main.innerHTML = template();
    $main.insertBefore(form, $main.firstChild);
    if(value == 2){
       for (const key in todo.length) {
            $content.appendChild(todo[key]);
       }
    }else{
    
    }
    $main.insertBefore(form, $main.firstChild);
}

function remove(value) {
    for(let i = 0; i < 3; i++){
        
        if(ul.children[i].value == value){
           ul.children[i].classList.add("liActive");
        }else{
           ul.children[i].classList.remove("liActive"); 
        }
    }
}
function empty() {
    //empty your array
    completeTodo = [];
    $main.innerHTML = complete();
    //$main.innerHTML = complete();
};