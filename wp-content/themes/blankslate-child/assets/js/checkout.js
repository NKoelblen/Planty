// Select all INPUTS with type NUMBER
const inputNumber = document.querySelectorAll("input[type='number']");
inputNumber.forEach(function(item){
  let wrapper = document.createElement('div');
  wrapper.classList.add("quantity");
  item.parentNode.insertBefore(wrapper, item);
  wrapper.appendChild(item);

  // Plus and minus buttons
  item.insertAdjacentHTML('afterend', '<div class="plus-minus-buttons"><button type="button" class="plus-button">+</button><button type="button" class="minus-button">-</button></div>');
});

// Plus Button
const plusButton = document.querySelectorAll(".plus-button");
plusButton.forEach(function(btn) {
  btn.addEventListener('click', function(element){
    let inputNumber = this.parentElement.previousElementSibling;
		inputNumber.stepUp();
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
    let change = new Event("change");
    inputNumber.dispatchEvent(change);
  })
})