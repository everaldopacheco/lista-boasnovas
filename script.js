document.addEventListener('DOMContentLoaded', () => {
  const itemForm = document.getElementById('item-form');
  const itemNameInput = document.getElementById('item-name');
  const itemQuantityInput = document.getElementById('item-quantity');
  const itemPriceInput = document.getElementById('item-price');
  const shoppingList = document.getElementById('shopping-list');
  const totalPriceElement = document.getElementById('total-price');
  const filterInput = document.getElementById('filter');

  let items = JSON.parse(localStorage.getItem('shoppingList')) || [];
  let total = items.reduce((sum, item) => sum + item.price * item.quantity, 0);

  function saveItems() {
    localStorage.setItem('shoppingList', JSON.stringify(items));
  }

  function renderItems() {
    shoppingList.innerHTML = '';
    items.forEach(item => addItemToDOM(item));
    updateTotal();
  }

  itemForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const itemName = itemNameInput.value.trim();
    const itemQuantity = parseInt(itemQuantityInput.value);
    const itemPrice = parseFloat(itemPriceInput.value);

    if (!itemName || itemPrice <= 0 || itemQuantity <= 0 || items.some(item => item.name === itemName)) {
      alert('Nome inválido, quantidade inválida, preço inválido ou item duplicado.');
      return;
    }

    const item = { name: itemName, quantity: itemQuantity, price: itemPrice };
    items.push(item);
    addItemToDOM(item);
    updateTotal();
    saveItems();

    itemNameInput.value = '';
    itemQuantityInput.value = '';
    itemPriceInput.value = '';
  });

  function addItemToDOM(item) {
    const li = document.createElement('li');
    const span = document.createElement('span');
    span.textContent = `${item.name} (x${item.quantity}) - R$ ${(item.price * item.quantity).toFixed(2)}`;

    const editButton = document.createElement('button');
    editButton.textContent = 'Editar';
    editButton.classList.add('edit');
    editButton.addEventListener('click', () => editItem(item));

    const removeButton = document.createElement('button');
    removeButton.textContent = 'Remover';
    removeButton.addEventListener('click', () => removeItem(item, li));

    li.appendChild(span);
    li.appendChild(editButton);
    li.appendChild(removeButton);
    shoppingList.appendChild(li);
  }

  function updateTotal() {
    total = items.reduce((sum, item) => sum + item.price * item.quantity, 0);
    totalPriceElement.textContent = total.toFixed(2);
  }

  function removeItem(item, li) {
    items = items.filter(i => i !== item);
    li.remove();
    updateTotal();
    saveItems();
  }

  function editItem(item) {
    itemNameInput.value = item.name;
    itemQuantityInput.value = item.quantity;
    itemPriceInput.value = item.price;
    removeItem(item, shoppingList.querySelector(`li:contains('${item.name}')`));
  }

  filterInput.addEventListener('input', () => {
    const filterText = filterInput.value.toLowerCase();
    shoppingList.innerHTML = '';
    items
      .filter(item => item.name.toLowerCase().includes(filterText))
      .forEach(item => addItemToDOM(item));
  });

  renderItems();
});
