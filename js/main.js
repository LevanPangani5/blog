const navItems = document.querySelector('.nav__items');
const opneNavBtn = document.querySelector('#open__nav-btn');
const closeNavBtn = document.querySelector('#close__nav-btn');

//opens nav's dropdown
const openNav=()=>{
    navItems.style.display='flex';
    opneNavBtn.style.display='none';
    closeNavBtn.style.display='inline';
}

//closes nav's dropdown
const closeNav=()=>{
    navItems.style.display='none';
    opneNavBtn.style.display='inline-block';
    closeNavBtn.style.display='none';
}
opneNavBtn.addEventListener('click',openNav);
closeNavBtn.addEventListener('click', closeNav)





const sideBar= document.querySelector('aside');
const showSidebarBtn = document.querySelector('#show__sidebar-btn');
const hideSidebarBtn = document.querySelector('#hide__sidebar-btn');

const showSidebar=()=>{
   sideBar.style.left='0';
   showSidebarBtn.style.display='none';
   hideSidebarBtn.style.display='inline-block';
   console.log('clicked');
}

const hideidebar=()=>{
    sideBar.style.left='-100%';
    showSidebarBtn.style.display='inline-block';
    hideSidebarBtn.style.display='none';
 }
showSidebarBtn.addEventListener('click',showSidebar);
hideSidebarBtn.addEventListener('click',hideidebar);

