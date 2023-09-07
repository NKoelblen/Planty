// Select all INPUTS with type NUMBER
const inputNumber = document.querySelectorAll("input[type='number']");
inputNumber.forEach(function(item){
  // create wrapper container
  let wrapper = document.createElement('div');
  // add class to wrapper div
  wrapper.classList.add("quantity-buttons");
  // insert wrapper before item in the DOM tree
  item.parentNode.insertBefore(wrapper, item);
  // move item into wrapper
  wrapper.appendChild(item);

  // Insert plus and minus buttons
  item.insertAdjacentHTML('afterend', '<div class="plus-minus-buttons"><button type="button" class="plus-button">+</button><button type="button" class="minus-button">-</button></div>');
});

// Plus Button
const plusButton = document.querySelectorAll(".plus-button");
plusButton.forEach(function(btn) {
  btn.addEventListener('click', function(element){
    let inputNumber = this.parentElement.previousElementSibling;
		inputNumber.stepUp();
		// trigger change event
    let change = new Event("change");
    inputNumber.dispatchEvent(change);
  })
})

// Minus Button
const minusButton = document.querySelectorAll(".minus-button");
minusButton.forEach(function(btn) {
  btn.addEventListener('click', function(element){
    let inputNumber = this.parentElement.previousElementSibling;
		inputNumber.stepDown();
		// trigger change event
    let change = new Event("change");
    inputNumber.dispatchEvent(change);
  })
})