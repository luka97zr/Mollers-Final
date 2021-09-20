var intersect_div = new Array(), 
	intersect_test = new Array();
function intersect_vid(el)
{
	var rect = el.getBoundingClientRect();
	th=window.innerHeight;
	thod=0.2*th;
	thdo=0.8*th;
	return (rect.top>=thod && rect.top<=thdo) || (rect.bottom>=thod && rect.bottom<=thdo) || (rect.top<thod && rect.bottom>thdo);
}
function intersect_start()
{
	intersect_div=document.getElementsByClassName('intersect');
	intersect_scroll();
}
function intersect_scroll()
{
	lim=intersect_div.length;
	for(i=0;i<lim;i++)
	{
		if(!intersect_test[i] && intersect_vid(intersect_div[i]))
		{
			intersect_test[i]=true;
			$("*#"+intersect_div[i].id).addClass('intersect_anim');
		}
	}
}
var lazy_images = new Array(), 
	lazy_test = new Array();
function lazy_load(el,fn)
{
	var img=new Image(), src = el.getAttribute('data-src');
	img.onload = function()
	{
		if(!!el.parent)
		{
			el.parent.replaceChild(img,el);
		}
		else
		{
			el.src=src;
		}
		$(el).addClass('lazy-on');
		fn?fn():null;
	}
	img.src = src;
}
function lazy_vid(el)
{
	var rect = el.getBoundingClientRect();
	th=window.innerHeight;
	ret=false;
	return (rect.top>=0 && rect.top<=th) || (rect.bottom>=0 && rect.bottom<=th);
}
function lazy_start()
{
	lazy_images=document.getElementsByClassName('lazy');
	lazy_scroll();
}
function lazy_scroll()
{
	lim=lazy_images.length;
	for(i=0;i<lim;i++)
	{
		if(lazy_vid(lazy_images[i]) && !lazy_test[i])
		{
			lazy_test[i]=true;
			lazy_load(lazy_images[i], function () {});
		}
	}
}

$(window).scroll(function(){
intersect_scroll();
lazy_scroll();
});

intersect_start();
lazy_start();
