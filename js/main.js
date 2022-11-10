let root = document.getElementById("root");

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min) + min);
}

let dragItem = null;

function dragStart() {
    console.log('drag started');
    dragItem = this;
    // setTimeout(() => this.className = 'invisible', 0)
}

function dragEnd() {
    console.log('drag ended');
  	dragItem = null;
}

function dragOver(e) {
    e.preventDefault();
    console.log('drag over');
}

function dragEnter() {
    console.log('drag entered');
}

function dragLeave() {
    console.log('drag left');
}

function dragDrop() {
    console.log('drag dropped');
    console.log(this);
    this.append(dragItem);
}

class todoList{
    constructor(place, title = "To-Do"){

        this.place = place;
        this.title = title;
        this.cardArray = [];

        this.render();
    }

    addToDo(){
        let text = this.input.value;
        this.cardArray.push(new Card(text, this.div, this));
    }

    render(){
        this.createToDoListElement();
        this.place.append(this.todoListElement);

    }

    removeToDoList(){
        this.todoListElement.remove();
        listLimit -= 1;
    }

    createToDoListElement(){
        this.div = document.createElement('div');

        this.div.setAttribute('style', 'min-height: 50px;');
        this.div.id = 'column-' + getRandomInt(1,10);
        this.div.classList.add("tasks-column");

        this.div.addEventListener('dragover', dragOver);
        this.div.addEventListener('dragenter', dragEnter);
        this.div.addEventListener('dragleave', dragLeave);
        this.div.addEventListener('drop', dragDrop);


        this.h2 = document.createElement('h2');
        this.h2.innerText = this.title;
        this.deleteButton = document.createElement('button');
        this.deleteButton.innerText = "X";
        this.deleteButton.addEventListener('click', ()=>{
            this.removeToDoList.call(this);
        });
        this.deleteButton.classList.add("btn-del");
        this.input = document.createElement('input');
        this.input.classList.add("comment");
        this.button = document.createElement('button');
        this.button.innerText = 'Add';
        this.button.classList.add("btn-save");
        this.button.id = "to-do-list-button";
        
        this.todoListElement = document.createElement('div');

        this.button.addEventListener('click', ()=>{
            if(this.input.value != ""){
                this.addToDo.call(this);
                this.input.value = "";
            }
        });

        this.todoListElement.append(this.h2);
        this.todoListElement.append(this.input);
        this.todoListElement.append(this.button);
        this.todoListElement.append(this.deleteButton);
        this.todoListElement.append(this.div);
        this.todoListElement.classList.add("todoList");
    }
}


class Card{
    constructor(text, place, todoList){

        this.place = place;
        this.todoList = todoList;
        this.state = {
            text: text,
            description: "Click to write a description...",
            comments: []
        }
        this.render();
    }

    render(){
        this.card = document.createElement('div');
        this.card.id = 'card-' + getRandomInt(1,5000);
        this.card.classList.add("card");
        this.card.addEventListener('click', (e)=>{
            if(e.target != this.deleteButton){
                this.showMenu.call(this);
            }
        });

        this.card.draggable="true";
        this.card.addEventListener('dragstart', dragStart)
        this.card.addEventListener('dragend', dragEnd)

        this.p = document.createElement('p');
        this.p.innerText = this.state.text;

        this.deleteButton = document.createElement('button');
        this.deleteButton.innerText = "X";
        this.deleteButton.addEventListener('click', ()=>{
            this.deleteCard.call(this);
        });

        this.card.append(this.p);
        this.card.append(this.deleteButton);
        
        this.place.append(this.card);
    }

    deleteCard(){
        this.card.remove();
        let i = this.todoList.cardArray.indexOf(this);
        this.todoList.cardArray.splice(i,1);
    }

    showMenu(){

        this.menu = document.createElement("div");
        this.menuContainer = document.createElement("div");
        this.menuTitle = document.createElement("div");
        this.menuDescription = document.createElement("div");
        this.commentsInput = document.createElement("input");
        this.commentsButton = document.createElement('button');
        this.menuComments = document.createElement("div");

        this.menu.className = "menu";
        this.menuContainer.className = "menuContainer";
        this.menuTitle.className = "menuTitle";
        this.menuDescription.className = "menuDescription";
        this.menuComments.className = "menuComments";
        this.commentsInput.className = "commentsInput comment";
        this.commentsButton.className = "commentsButton btn-save";

        this.commentsButton.innerText = "Add";
        this.commentsInput.placeholder = "Write a comment...";

        this.menuContainer.addEventListener('click', (e)=>{
            console.log(e.target);
            if(e.target.classList.contains("menuContainer")){
                this.menuContainer.remove();
            }
        });
        
        this.commentsButton.addEventListener('click', ()=>{
            if(this.commentsInput.value != ""){
            this.state.comments.push(this.commentsInput.value);
            this.renderComments();
            this.commentsInput.value = "";
            }
        })

        this.menu.append(this.menuTitle);
        this.menu.append(this.menuDescription);
        this.menu.append(this.commentsInput);
        this.menu.append(this.commentsButton);
        this.menu.append(this.menuComments);
        this.menuContainer.append(this.menu);
        root.append(this.menuContainer);

        this.editableDescription = new EditableText(this.state.description, this.menuDescription, this, "description", "textarea");
        this.editableTitle = new EditableText(this.state.text, this.menuTitle, this, "text", "input");
        
        this.renderComments();
    }

    renderComments(){

        let currentCommentsDOM = Array.from(this.menuComments.childNodes);

        currentCommentsDOM.forEach(commentDOM =>{
            commentDOM.remove();
        });

        this.state.comments.forEach(comment =>{
            new Comment(comment, this.menuComments, this);
        });
    }
}


class EditableText{
    constructor(text, place, card, property, typeOfInput){
        this.text = text;
        this.place = place;
        this.card = card;
        this.property = property;
        this.typeOfInput = typeOfInput;
        this.render();
    }

    render(){
        this.div = document.createElement("div");
        this.p = document.createElement("p");

        this.p.innerText = this.text;

        this.p.addEventListener('click', ()=>{
            this.showEditableTextArea.call(this);
        });

        this.div.append(this.p);
        this.place.append(this.div);
    }

    showEditableTextArea(){
        let oldText = this.text;

        this.input = document.createElement(this.typeOfInput);
        this.saveButton = document.createElement("button");

        this.p.remove();
        this.input.value = oldText;
        this.saveButton.innerText = "Save";
        this.saveButton.className = "btn-save";
        this.input.classList.add("comment");

        this.saveButton.addEventListener('click', ()=>{
            this.text = this.input.value;
            this.card.state[this.property] = this.input.value;
            if(this.property == "text"){
                this.card.p.innerText = this.input.value;
            }
            this.div.remove();
            this.render();
        });

        function clickSaveButton(event, object){
            if (event.keyCode === 13) {
                event.preventDefault();
                object.saveButton.click();
              }
        }

        this.input.addEventListener("keyup", (e)=>{
            if(this.typeOfInput == "input"){
                clickSaveButton(e, this);
            }
        });

        this.div.append(this.input);

        if(this.typeOfInput == "textarea"){
            this.div.append(this.saveButton);
        }

        this.input.select();
    }

}

class Comment{
    constructor(text, place, card){
        this.text = text;
        this.place = place;
        this.card = card;
        this.render();
    }

    render(){
        this.div = document.createElement('div');
        this.div.className = "comment";
        this.div.innerText = this.text;
        
        this.place.append(this.div);
    }
}

//-------------main------------

let addTodoListInput = document.getElementById("addTodoListInput");
let addTodoListButton = document.getElementById("addTodoListButton");
let listLimit = 3;

addTodoListButton.addEventListener('click',()=>{
   if(listLimit < 4){
   if ( addTodoListInput.value.trim() != ""){
    
    new todoList(root, addTodoListInput.value);
    addTodoListInput.value = "";
    listLimit += 1;
    document.getElementById("addTodoListButton").textContent= "Add";
   }
} else{
    document.getElementById("addTodoListButton").textContent= "List Limit Reached";
}
});

let todoList1 = new todoList(root);
let todoList2 = new todoList(root, 'Doing');
let todoList3 = new todoList(root, 'Done')