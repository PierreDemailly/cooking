


var i = 2;
function get_ingredient(button) {

    button.setAttribute('class', 'mx-2 btn btn-danger')
    button.setAttribute('onclick', 'this.parentElement.style.display = "none";');
    
    var newDiv = document.createElement('div');
    var parentDiv = document.getElementById('input_ingredients');
    newDiv.setAttribute('class', 'form-group row mx-auto  col-md-12');
    newDiv.setAttribute('id', 'parent-' + i);
    parentDiv.appendChild(newDiv);

    var inputQuantité = document.createElement('input');
    inputQuantité.setAttribute('class', 'col-md-3 form-control');
    inputQuantité.setAttribute('id', 'quantité-'+i);
    inputQuantité.setAttribute('name', 'recipe-ingredient-quantity');
    newDiv.appendChild(inputQuantité);

    var span = document.createElement('span');
    span.setAttribute('class', 'mt-2 mx-2');
    span.setAttribute('id', 'span-' + i);
    span.innerHTML="de";
    newDiv.appendChild(span);

    var inputIngredient = document.createElement('input');
    inputIngredient.setAttribute('class', 'col-md-6 form-control');
    inputIngredient.setAttribute('id', 'ingredient-' + i);
    inputIngredient.setAttribute('name', 'recipe-ingredient');
    newDiv.appendChild(inputIngredient);

    var btnAdd = document.createElement('button');
    btnAdd.setAttribute('class', 'mx-2 btn btn-info');
    btnAdd.setAttribute('type', 'button');
    btnAdd.setAttribute('onclick', 'get_ingredient(this)');
    btnAdd.setAttribute('id', 'btn-' + i);
    btnAdd.innerHTML="+";
    newDiv.appendChild(btnAdd);




    
    
    i++;
}


var j = 2;
function get_step(buton) {
    buton.setAttribute('class', 'mx-2 col-md-1 btn btn-danger');
    buton.setAttribute('onclick', 'this.parentElement.style.display = "none";');

    grandParent = document.getElementById('stepDiv');
    parent = document.createElement('div');
    parent.setAttribute('class', 'row my-1');
    parent.setAttribute('id', 'parent-' + j);

    grandParent.appendChild(parent);

    strong = document.createElement('strong');
    strong.setAttribute('class', 'mt-2 mx-2');7
    strong.innerHTML = "Étape " + j + ':';
    parent.appendChild(strong);

    textArea = document.createElement('textarea');
    textArea.setAttribute('class', 'col-md-9 form-control');
    textArea.setAttribute('type', 'text');
    textArea.setAttribute('name', 'recipe-step');
    textArea.setAttribute('rows' ,'1');
    textArea.setAttribute('placeholder', 'Exemple: Mélanger le lait avec la farine');
    parent.appendChild(textArea);

    var btnAdd = document.createElement('button');
    btnAdd.setAttribute('class', 'mx-2 col-md-1 btn btn-info');
    btnAdd.setAttribute('type', 'button');
    btnAdd.setAttribute('onclick', 'get_step(this)');
    btnAdd.setAttribute('id', 'btn-' + i);
    btnAdd.innerHTML = "+";

    parent.appendChild(btnAdd);
    
    j++;
}

