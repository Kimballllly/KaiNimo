var modals = [
    document.getElementById('modal1'),
    document.getElementById('modal2'),
    document.getElementById('modal3')
];

var buttons = [
    document.querySelector('.button1'),
    document.querySelector('.button2'),
    document.querySelector('.button3')
];

var closeButtons = [
    modals[0].querySelector('.close'),
    modals[1].querySelector('.close'),
    modals[2].querySelector('.close')
];

var menuTabs = [
    document.getElementById('menu'),
    document.getElementById('menu2'),
    document.getElementById('menu3')
];

var contactsTabs = [
    document.getElementById('contacts'),
    document.getElementById('contacts2'),
    document.getElementById('contacts3')
];

function hideAllTabs() {
    var tabcontents = document.getElementsByClassName('tabcontent');
    for (var i = 0; i < tabcontents.length; i++) {
        tabcontents[i].style.display = 'none';
    }
}

function openTab(evt, tabName) {
    hideAllTabs();
    var tablinks = document.getElementsByClassName('tablinks');
    for (var i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove('active');
    }
    document.getElementById(tabName).style.display = 'block';
    evt.currentTarget.classList.add('active');
}

function openMenuTab(modal, menuTab, contactsTab) {
    hideAllTabs();
    modals.forEach(function (modal) {
        modal.style.display = 'none';
    });

    var allMenuTabButtons = menuTab.querySelectorAll('.menuTabButton'); // Assuming a different class for menu tab buttons
    allMenuTabButtons.forEach(function (tabButton) {
        tabButton.classList.remove('active');
        tabButton.classList.remove('yellow-underline'); // Remove yellow underline class
    });

    var allContactsTabButtons = contactsTab.querySelectorAll('.contactsTabButton'); // Assuming a different class for contacts tab buttons
    allContactsTabButtons.forEach(function (tabButton) {
        tabButton.classList.remove('active');
    });

    modal.style.display = 'block';
    menuTab.style.display = 'block';

    var menuTabButton = menuTab.querySelector('.menuTabButton'); // Assuming a different class for the menu tab button
    menuTabButton.classList.add('active');

    var contactsTabButton = contactsTab.querySelector('.contactsTabButton'); // Assuming a different class for the contacts tab button
    contactsTabButton.classList.add('active');
    contactsTabButton.classList.remove('yellow-underline'); // Remove yellow underline class
    contactsTabButton.click();
}

for (var i = 0; i < buttons.length; i++) {
    buttons[i].onclick = function (index) {
        return function () {
            openMenuTab(modals[index], menuTabs[index], contactsTabs[index]);
        };
    }(i);

    closeButtons[i].onclick = function (modal) {
        return function () {
            modal.style.display = 'none';
        };
    }(modals[i]);
}

document.addEventListener('click', function (event) {
    for (var i = 0; i < modals.length; i++) {
        clickOutsideModal(event, modals[i]);
    }
});

for (var i = 0; i < modals.length; i++) {
    modals[i].addEventListener('click', function (event) {
        event.stopPropagation();
    });
}

function clickOutsideModal(event, modal) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
}

for (var i = 0; i < contactsTabs.length; i++) {
    (function (index) {
        contactsTabs[index].addEventListener('click', function (event) {
            openTab(event, contactsTabs[index].id);
        });
    })(i);
}
