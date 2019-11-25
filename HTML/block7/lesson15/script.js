let a = document.querySelectorAll('li');
console.log(a);
console.log(a[0]);
console.log(a[1]);

let b = document.getElementsByTagName('li');
console.log(b);
console.log(b[0]);
console.log(b[1]);

let c = document.getElementsByClassName('nav__item');
console.log(c);
console.log(c[0]);
console.log(c[1]);

let d = document.getElementsByClassName('d-flex');
console.log(d);
console.log(d[0].firstElementChild);
console.log(d[0].lastElementChild);

let e = document.getElementsByClassName('d-flex');
console.log(e);
console.log(e[0].childNodes[1]);
console.log(e[0].childNodes[3]);

let f = document.getElementsByClassName('d-flex');
console.log(f[0].children);
console.log(f[0].children[0]);
console.log(f[0].children[1]);