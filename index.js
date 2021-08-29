const $input = document.querySelector('#inputAdd');
const $botton = document.querySelector('#add');
let $content = document.querySelector('#content');
let ul = document.querySelector('#ul');
const $main = document.querySelector('#main');
let completeTodo=[];
let todo=[];
let form=null;
let  value = 0;



$botton.addEventListener('click', () => {
    const node = document.createElement('label');
    const check = document.createElement('input');
    const span = document.createElement('span');
    check.className ='checkbox';
    span.innerHTML = $input.value;
    span.className = 'text';
    span.setAttribute('value', value );
    value= value+1;
    node.appendChild(check);
    node.append(span);
    check.type="checkbox";
    $content.appendChild(node);


    for (let i = 0; i < $content.children.length; i++) {
        $content.children[i].addEventListener('click', click);
    }  
   

}) 

function click() { 
    debugger;
    this.children[1].classList.toggle('checkActive');
    const valor = this.children[1].getAttribute('value');
    const aux = ()=>{
        for (let i = 0; i < completeTodo.length; i++) {
            debugger;
            if(completeTodo[i].getAttribute('value') === valor){
                return false;
                i=completeTodo.length;
            }
            
        }
        return true;
    }
    if(aux){
        completeTodo.push(this.children[1]);
    }else{
        completeTodo.pop(this.children[1]);
    }
    
}
for(let i = 0; i < 3; i++){
    console.log(ul.children[i]);
    ul.children[i].addEventListener('click', router);
}




function router (){
    debugger;
    const valor = this.value;

    for (let i = 0; i < $content.children.length; i++) {
        if($content.children[i].children.item(1).classList.contains("checkActive")){
            completeTodo.push($content.children[i]);
        }else{
            todo.push($content.children[i]);
        }
    }  
    if(valor == '1'){
        remove(valor);
        if(form != null){
            form.style.display = 'block';
        }
        for (let i = 0; i < completeTodo.length; i++) {
            $content.appendChild(completeTodo[i]);
            $content.appendChild(todo[i]);
        }


    }
    if(valor == '2'){
        remove(valor);
        for (let i = 0; i < completeTodo.length; i++) {
            $content.removeChild(completeTodo[i]);
            $content.appendChild(todo[i]);
        }
    }
    if(valor == '3'){
        remove(valor);
        const deleted = document.createElement('button');
        deleted.className ='btnDeleted';
        deleted.setAttribute('id', 'delete');
        deleted.innerText='delete all';
        let first =$main.children[0];
        for (let i = 0; i < $content.children.length; i++) {
            $content.removeChild($content.children[i]);
        }
        for (let i = 0; i < completeTodo.length; i++) {
            $content.appendChild(completeTodo[i]);
            
        }
    } 
}
function remove(value) {
    for(let i = 0; i < 3; i++){
        debugger
        if(ul.children[i].value == value){
            
           ul.children[i].classList.add("liActive");
        }else{
            ul.children[i].classList.remove("liActive"); 
        }
    }
}










/*
for(let i = 0; i < $content.children.length; i++){
    if($content.children[i].className === 'checkbox'){
        debugger

        $content.children[i].addEventListener('click', ()=>{
            for (let i = 0; i < $content.children.length; i++) {
                if($content.children[i].className === 'span'){
                    $content.children[i].className = 'checkActive';               
                }
            }
        });

    }
    
}
*/
