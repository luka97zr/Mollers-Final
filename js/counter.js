let addBtn= document.querySelector('.addBtn');
let subBtn= document.querySelector('.subBtn');
let counter= document.querySelector('.counter');

if(addBtn)
{
	addBtn.addEventListener('click',()=>{
		counter.value = parseInt(counter.value) + 1;
		racun();
	});
}

if(subBtn)
{
	subBtn.addEventListener('click',()=>{
		if(counter.value <= 1){counter.value=1;}
		else {counter.value = parseInt(counter.value) - 1;}
		racun();
	});
}