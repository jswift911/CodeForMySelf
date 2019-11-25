let a = document.querySelectorAll('a');

let parent1 = a[0].parentNode.parentNode.parentNode.parentNode;
let parent2 = a[0].parentNode.parentNode.parentNode;
let parent3 = a[0].parentNode.parentNode;
let parent4 = a[0].parentNode;
let parents = [parent1, parent2, parent3, parent4];
console.log(parents);
